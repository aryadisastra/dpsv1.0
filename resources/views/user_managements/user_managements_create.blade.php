
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
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">User Managements</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
              
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">User Create</h4>
                  <p class="card-category">Tambah Data User</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/user-managements/store" method="post" id="user-create">  
                  @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" name="nama">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name="username">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">No Hp</label>
                          <input type="text" class="form-control" name="nohp">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Role</label>
                    </div>
                    <div class="row" style="width : 300px">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >CEO</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="role" value="1" checked>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Admin</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="role" value="2">
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
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="status" value="1" checked>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Inactive</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="status" value="2">
                      </div>
                    </div>
                    </div>
                    <input type="submit" class="btn btn-primary pull-right" id="save" value="Save">
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