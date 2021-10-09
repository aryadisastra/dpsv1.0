<html lang="en" class=" perfect-scrollbar-on"><head>
  @include('main.header');
  <!-- Anti-flicker snippet (recommended)  -->
  

<body class="dark-edition off-canvas-sidebar"><div data-v-7e2550d6="" class="odm_extension image_downloader_wrapper"><!----></div>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter ps" filter-color="black" style="background-image: url('../../assets/img/login.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row" style="margin-top : 111px">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form action="/dashboard-login" method="post" id="loginForm">
            @csrf
              <div class="card card-login">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Dsstr Panel System</h4>
                </div>
                <div class="card-body ">
                  <p class="card-description text-center" style ="color : #B7AFAD">Silahkan Login</p>
                  <span class="md-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">person</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                  </span>
                  <span class="md-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                  </span>
                </div>
                  <input type="submit" style="margin-left : 50px;margin-right : 50px" class="btn btn-primary">Login
              </div>
            </form>
          </div>
        </div>
        <div class="error-msg">
            @if ($errors->has('username'))
            <script>
                $('.row form .card-body input[type=text]').addClass('error');
            </script>
            <span class="show">
                Maaf, Username & Password tidak terdaftar.
                <div class="close">close</div>
            </span>
            <br>
            @elseif ($errors->has('password'))
            <script>
                $('.row form .card-body input[type=text],.row form .card-body input[type=password]').addClass('error');
            </script>
            <span class="show">
                Maaf, Username / Password salah.
                <div class="close">close</div>
            </span>
            @endif
        </div>
      </div>
      <script>
            $(document).ready(function(){
                $('.error-msg span .close').click(function(){
                    $(this).parent().removeClass('show');
                });
            })
            function onSubmit(token) {
                document.getElementById("loginForm").submit();
            }
      </script>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Dsstr</a> for more optimized work.
          </div>
        </div>
      </footer>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
  </div>




</html>