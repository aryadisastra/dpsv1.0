<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('assets/img/sidebar-2.jpg')}}">
<div class="logo"><a href="#" class="simple-text logo-normal">
          Dsstr Panel System
        </a></div>
      <div class="sidebar-wrapper ps ps--active-y">
        <ul class="nav">
          <div class="user" style="margin-left:20px;margin-right:20px">
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username collapsed" aria-expanded="false">
              <span>
                {{ucWords(session('user')['fullName'])}}
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample" style="">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="/logout">
                    <span class="sidebar-mini"> logout </span>
                  </a>
                </li>
            </div>
          </div>
        </div>
        <br>
        @foreach($data as $menu)
          <li class="nav-item {{$current == $menu->current ? 'active':''}}">
            <a class="nav-link" href="{{$menu->link}}">
              <i class="material-icons">{{$menu->icon}}</i>
              <p>{{$menu->name}}</p>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>