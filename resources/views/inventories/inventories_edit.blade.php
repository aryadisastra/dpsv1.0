
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
              <a class="btn btn-primary pull-right" style="margin-right:20px;" id="back" href="/inventories">Back</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Inventories Edit</h4>
                  <p class="card-category">Edit Data Mobil</p>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="/inventories/update/{{$mobil->id_mobil}}" method="post" id="inventories-update">
                    @csrf  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Nama Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="nama" value = "{{$mobil->nama_mobil}}" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Merk Mobil</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="merk" value = "{{$mobil->merk_mobil}}" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Harga Sewa</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="harga" value = "{{$mobil->nominal}}" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Stok</label>
                          <input style="background-color:transparent;" type="text" class="form-control" name="stok" value = "{{$mobil->stok}}" >
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
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="jenis" value ="1" {{$mobil->jenis_mobil == 1 ? 'checked' :''}}>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Sedang</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="jenis" value ="2" {{$mobil->jenis_mobil == 2 ? 'checked' :''}}>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Kecil</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="jenis" value ="3" {{$mobil->jenis_mobil == 3 ? 'checked' :''}}>
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
                        <input type="radio" class="form-control" style="width : 100px; height : 20px" name="status" value ="1" {{$mobil->status == 1 ? 'checked' :''}}>
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">In-Active</label>
                        </div>
                        <input type="radio" class="form-control" style="width : 150px; height : 20px" name="status" value ="2" {{$mobil->status == 2 ? 'checked' :''}}>
                      </div>
                    </div>
                    <br>
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
                    <input type="submit" class="btn btn-primary pull-right" id="update" href="#" onClick="updateProd()" value ="Update">
                  </form>
                  
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
                                          <th>Gambar</th>
                                          <th>Action</th>
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
                                              <td class="text-left no-wrap" width="1">
                                                  <div class="img-container" >
                                                  <form action="/delete_image" method="post">
                                                  @csrf
                                                    <input type="hidden" name="id_mobil" value="{{$list->id_mobil}}">
                                                    <input type="hidden" name="id_file" value="{{$list->id_file}}">
                                                    <input type="hidden" value ="{{$load}}" name="loct">
                                                    <input type="submit" id="hapus" value ="Hapus" name="hapus">
                                                    </form>
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