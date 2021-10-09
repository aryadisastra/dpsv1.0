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
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">Inventories</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Inventories Create</h4>
                  <p class="card-category">Tambah Data Mobil</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/inventories/store" method="post" id="inventories-create">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="{{$errors->has('nama_mobil') ? 'form-group has-danger bmd-form-group' : 'form-group bmd-form-group'}}">
                          <label class="bmd-label-floating">Nama Mobil</label>
                          <input type="text" class="form-control" name="nama_mobil">
                          @if($errors->has('nama_mobil'))
                          <span class="form-control-feedback">
                            <i class="material-icons">clear</i>
                          </span>
                          <span class="md-help">
                            {{$errors->first('nama_mobil')}}
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Jenis Mobil</label>
                    </div>
                    <div class="row" style="width : 300px">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >Besar</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="jenis_mobil" value ="1" checked>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Sedang</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="jenis_mobil" value ="2">
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Kecil</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="jenis_mobil" value ="3">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="{{$errors->has('merk_mobil') ? 'form-group has-danger bmd-form-group' : 'form-group bmd-form-group'}}">
                          <label class="bmd-label-floating">Merk</label>
                          <input type="text" class="form-control" name="merk_mobil">
                          @if($errors->has('merk_mobil'))
                          <span class="form-control-feedback">
                            <i class="material-icons">clear</i>
                          </span>
                          <span class="md-help">
                            {{$errors->first('merk_mobil')}}
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" >
                        <div class="{{$errors->has('harga') ? 'form-group has-danger bmd-form-group' : 'form-group bmd-form-group'}}">
                          <label class="bmd-label-floating">Harga</label>
                          <input type="text" class="form-control" name="harga">
                          @if($errors->has('harga'))
                          <span class="form-control-feedback">
                            <i class="material-icons">clear</i>
                          </span>
                          <span class="md-help">
                            {{$errors->first('harga')}}
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" >
                        <div class="{{$errors->has('stok') ? 'form-group has-danger bmd-form-group' : 'form-group bmd-form-group'}}">
                          <label class="bmd-label-floating">Stok</label>
                          <input type="text" class="form-control" style="width : 30px" name="stok">
                          @if($errors->has('stok'))
                          <span class="form-control-feedback">
                            <i class="material-icons">clear</i>
                          </span>
                          <span class="md-help">
                            {{$errors->first('stok')}}
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div>
                          <span class="btn btn-primary btn-round btn-file">
                            <span class="fileinput-new">Foto Mobil</span>
                            <input id ="files" type="file" name="attachments[]" multiple>
                        </div>
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