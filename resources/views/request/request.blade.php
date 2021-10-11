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
            <button class="btn btn-primary pull-right" id="edit" name="but"><a href="/export">Export</a>
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
                    <th>Kode Penyewaan</th>
                    <th>Tanggal Sewa</th>
                    <th>Jangka Waktu</th>
                    <th>Nama Penyewa</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                  @foreach($data_req as $data => $list)
                      <tr>
                        @php
                            $data+=1;
                            if($list->status == 1) $status="Submitted";
                            if($list->status == 2) $status="Approved";
                            if($list->status == 3) $status="Used";
                            if($list->status == 4) $status="Finished";
                            if($list->status == 5) $status="Rejected";
                            if($list->status == 6) $status="Canceled";
                        @endphp
                          <td class="text-left no-wrap" width="1">{{$data}}</td>
                          <td class="text-left no-wrap" width="1" ><a href="/request/{{$list->id_penyewaan}}">{{$list->kode_penyewaan}}</a></td>
                          <td class="text-left no-wrap" width="1" >{{$list->tanggal_penyewaan}}</td>
                          <td class="text-left no-wrap" width="1" >{{$list->jangka_waktu}} Hari</td>
                          <td class="text-left no-wrap" width="1" >{{$list->nama_customer}}</td>
                          <td class="text-left no-wrap" width="1" >{{$status}}</td>
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