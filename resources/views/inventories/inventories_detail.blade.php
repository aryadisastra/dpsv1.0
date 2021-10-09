
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
          <div class="collapse navbar-collapse justify-content-end">
              <a class="btn btn-primary pull-right" style="margin-right:20px;" id="back" href="/inventories" ">Back</a>
              <a class="btn btn-primary pull-right" id="edit" href="/inventories/edit/{{$data->id_barang}}" >Edit</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Inventories Detail</h4>
                  <p class="card-category">Detail Barang</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/inventories/store" method="post" id="inventories-create">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Kode Barang</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="kode_barang" value = "{{$data->kode_barang}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Barang</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="nama_barang" value = "{{$data->nama_barang}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Harga Barang</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "Rp.{{$data->harga_barang}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Kategori Barang</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$data->kategori_barang == 1 ? 'Tas' : ($data->kategori_barang == 2 ? 'Dompet' : 'Jam')}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Material</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data->material_barang}}" readonly>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Ukuran Barang</label>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Length</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="panjang" value = "{{isset($data->panjang_barang) ? $data->panjang_barang : '-'}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Width</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="lebar" value = "{{isset($data->lebar_barang) ? $data->lebar_barang : '-'}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Height</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="tinggi" value = "{{isset($data->tinggi_barang) ? $data->tinggi_barang : '-'}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Stok</label>
                          <input style="background-color:transparent;" type="text" class="form-control" style="width : 30px" name="stok" value = "{{$data->stock_barang}}" readonly>
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