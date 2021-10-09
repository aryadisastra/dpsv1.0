
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
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">Sells</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Sales Create</h4>
                  <p class="card-category">Tambah Data Penjualan</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/inventories/store" method="post" id="inventories-create">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Outlet</label>
                          {{-- <input type="text" class="form-control" name="kode_barang"> --}}
                          <select class="form-control" id="outlet" name="outlet">
                          <option>Lazada</option>
                          <option>Shopee</option>
                          <option>Nyabar</option>
                          <option>Nicola</option>
                          <option>Movida</option>
                          <option>Store</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Customer</label>
                          {{-- <input type="text" class="form-control" name="kode_barang"> --}}
                          <select class="form-control" id="customer" name="customer">
                          <option>Riska</option>
                          <option>Arya</option>
                          <option>Reza</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Payment Method</label>
                          {{-- <input type="text" class="form-control" name="kode_barang"> --}}
                          <select class="form-control" id="pm" name="payment">
                          <option>Cash</option>
                          <option>Transfer</option>
                          <option>Cicilan</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Ekspedisi</label>
                          {{-- <input type="text" class="form-control" name="kode_barang"> --}}
                          <select class="form-control" id="ekspedisi" name="ekspedisi">
                          <option>JNE</option>
                          <option>JNT</option>
                          <option>Sicepat</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">No Hp Customer</label>
                          <input type="text" class="form-control" name="nama_barang">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Pengiriman Tujuan</label>
                          <input type="text" class="form-control" name="harga_barang">
                        </div>
                      </div>
                    </div>
                    <br>
                    {{-- <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Kategori Barang</label>
                    </div>
                    <div class="row" style="width : 300px">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating" >Tas</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="kategori" value ="1" checked>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Dompet</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="kategori" value ="2">
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Jam</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="kategori" value ="3">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Material</label>
                          <input type="text" class="form-control" name="material">
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
                          <input type="text" class="form-control" name="panjang">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Width</label>
                          <input type="text" class="form-control" name="lebar">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Height</label>
                          <input type="text" class="form-control" name="tinggi">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Stok</label>
                          <input type="text" class="form-control" style="width : 30px" name="stok">
                        </div>
                      </div>
                    </div> --}}
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
        $(document).ready(function() {
            $("#outlet").select2();
            $("#customer").select2();
            $("#pm").select2();
            $("#ekspedisi").select2();
        });

        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
</body>

</html>