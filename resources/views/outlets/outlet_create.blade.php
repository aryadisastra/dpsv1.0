<!DOCTYPE html>
<html lang="en">
@include('main.header');

<body class="dark-edition">
  <div class="wrapper ">
     @include('main.sidebar');
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid" >
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">Outlet</a>
          </div>
        </div>
      </nav>
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Outlet Create</h4>
                  <p class="card-category">Tambah Data Outlet</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/outlet/store" method="post" id="inventories-create">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Outlet</label>
                          <input type="text" class="form-control" name="nama_outlet">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Owner</label>
                          <input type="text" class="form-control" name="owner">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Status</label>
                    </div>
                    <div class="row" style="width : 300px">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >Active</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="status" value ="1" checked>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">In-Active</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="status" value ="2">
                      </div>
                    </div>
                    </div>
                    <input type="submit" class="btn btn-primary pull-right" id="save" href="#" onClick="saveProd()"><a>Save</a></input>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Dsstr</a> for more optimized work.
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
</body>

</html>