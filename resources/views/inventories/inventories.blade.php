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
            <form class="navbar-form" >
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon" >
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
              <a class="btn btn-primary pull-right" href="/inventories/create">Add</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                  </thead>
                  <tbody>
                  @foreach($prod_data as $data => $list)
                    @php
                    $data+=1;
                    $image = \App\Models\MobilAttachment::select('nama_file')->where('id_mobil',$list->id_mobil)->first();
                    $custom_env = new \App\Http\Controllers\CustomEnvController();
                    $name = isset($image->nama_file) ? $image->nama_file : null;
                    $load = '/img/mobil/'.$name;
                    @endphp
                      <tr>
                          <td class="text-left no-wrap" width="1">{{$data}}</td>
                          <td class="text-left no-wrap" width="1">
                            <div class="img-container" >
                              <img style="width:300px;height:300x;" src="{{$load}}" alt="...">
                            </div>
                          </td>
                          <td class="text-left no-wrap" width="1" ><a href="/inventories/{{$list->id_mobil}}">{{$list->nama_mobil}}</a></td>
                          <td class="text-left no-wrap" width="1" >{{$list->jenis_mobil == 1 ? 'Besar' : ($list->jenis_mobil == 2 ? 'Sedang' : 'Kecil')}}</td>
                          <td class="text-left no-wrap" width="1" >{{$list->merk_mobil}}</td>
                          <td class="text-left no-wrap" width="1" >{{$list->stok}}</td>
                          <td class="text-left no-wrap" width="1" >{{$list->nominal}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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