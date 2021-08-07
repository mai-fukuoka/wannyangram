<header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand navbar-mainLogo" href="/"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-bar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse.navbar-collapse" id="nav-bar">
          <ul class="navbar-nav mr-auto"></ul>
          @if(Auth::check())
          <ul class="navbar-nav">
            {{--投稿ボタンのリンク--}}
            <li class="nav-item">
              <a class="btn btn-primary" href="/posts/new">投稿</a>
            </li>
            {{--プロフィールボタンのリンク--}}
            <li class="nav-item mt-2">
              <a class="nav-link commonNavIcon profile-icon" href="/users/{{Auth::user()->id }}"></a>
            </li>
          </ul>
          @endif
        </div>
      </div>
    </nav>
  </header>