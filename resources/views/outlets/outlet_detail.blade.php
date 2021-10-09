
<!DOCTYPE html>
<html lang="en">

@include('main.header');

<body class="dark-edition">
  <div class="wrapper ">
    @include('main.sidebar');
      
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid" >
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">Outlet</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
              <a class="btn btn-primary pull-right" style="margin-right:20px;" id="back" href="/outlet">Back</a>
              <a class="btn btn-primary pull-right" id="edit" href="/outlet/edit/{{$data->id_outlet}}" >Edit</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Outlet Detail</h4>
                  <p class="card-category">Detail Outlet</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/outlet/update" method="post" id="inventories-create">
                    @csrf 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Outlet</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="nama_barang" value = "{{$data->nama_outlet}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Owner</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$data->owner}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$data->status == 1 ? 'Active' : 'In-Active'}}" readonly>
                        </div>
                      </div>
                    </div>
                    </div>
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