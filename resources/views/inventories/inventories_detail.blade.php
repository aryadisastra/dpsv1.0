
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
              <a class="btn btn-primary pull-right" id="edit" href="/inventories/edit/{{$mobil->id_mobil}}" >Edit</a>
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
                          <label class="bmd-label-floating">Nama Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="kode_barang" value = "{{$mobil->nama_mobil}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Jenis Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="nama_barang" value = "{{$mobil->jenis_mobil == 1 ? 'Besar' : ($mobil->jenis_mobil == 2 ? 'Sedang' : 'Kecil')}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Merk Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$mobil->merk_mobil}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Sewa Per Hari</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "Rp.{{$mobil->nominal}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Stok</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$mobil->stok}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$mobil->status == 1 ? 'Active' : 'In-Active'}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                            <div class="card-header card-header-icon card-header-primary">
                                <h4 class="card-title ">Foto Mobil</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table">
                                      <thead class=" text-primary">
                                          <tr>Gambar</tr>
                                      </thead>
                                      <tbody>
                                      @foreach($img_data as $data => $list)
                                          @php
                                          $name = isset($list->nama_file) ? $list->nama_file : null;
                                          $load = '/img/mobil/'.$name;
                                          @endphp
                                          <tr>
                                              <td class="text-left no-wrap" width="1">
                                                  <div class="img-container" >
                                                  <a href="{{$load}}" target="_blank"><img style="width:300px;height:300x;" src="{{$load}}" alt="..."></a>
                                                  </div>
                                              </td>
                                          </tr>
                                      @endforeach
                                      </tbody>
                                  </table>
                                </div>
                            </div>
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