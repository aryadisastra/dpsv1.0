
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
            <a class="navbar-brand" href="javascript:void(0)" style="margin-right : 50px">Request</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
                <a class="btn btn-primary pull-right" style="margin-right:20px;" id="back" href="/request">Back</a>
                @if(session('user')['role']==1)
                  @if(in_array($data_request->status,[1,2,3]))
                  <form method="post" action="/request/up_status">
                  @csrf
                      <input type="hidden" name="id_sewa" value="{{$data_request->id_penyewaan}}">
                      <input type="submit" class="btn btn-primary pull-right" id="edit" name="but" value="{{$button}}">
                      @if($data_request->status == 1)
                      <input type="submit" class="btn btn-primary pull-right" id="edit" name="but" value="{{$button_reject}}">
                      <input type="submit" class="btn btn-primary pull-right" id="edit" name="but"value="{{$button_cancel}}">
                      @elseif($data_request->status == 2)
                      <input type="submit" class="btn btn-primary pull-right" id="edit" name="but"value="{{$button_cancel}}">
                      @endif
                  </form>
                  @endif
                @endif
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Request Detail</h4>
                  <p class="card-category">Detail Request</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/inventories/store" method="post" id="inventories-create">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Kode penyewaan</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="kode_barang" value = "{{$data_request->kode_penyewaan}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Tanggal Penyewaan</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="nama_barang" value = "{{$data_request->tanggal_penyewaan}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Jangka Waktu</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$data_request->jangka_waktu}} Hari" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Customer</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga_barang" value = "{{$data_request->nama_customer}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email Customer</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data_request->email_customer}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Alamat Customer</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data_request->alamat_customer}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Rek</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data_request->nama_rek}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">No Rek</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data_request->no_rek}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$data_request->nama_mobil->nama_mobil}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Total</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "Rp.{{$data_request->total}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="material" value = "{{$status}}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <div class="card-header card-header-icon card-header-primary">
                                <h4 class="card-title ">Bukti Pembayaran</h4>
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
                                        $load = config('app.web_site').'/img/request/'.$name;
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