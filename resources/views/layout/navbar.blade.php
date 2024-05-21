<nav class="navbar navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">LMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav ms-auto">
      @if(Session::has('operator'))
        <li class="nav-item">
          <a class="nav-link {{Request::path() === '/' ? 'active' : '' }}" href="{{route('index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'author' ? 'active' : '' }}" href="{{route('author')}}">Authors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'book' ? 'active' : '' }}" href="{{route('book')}}">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'member' ? 'active' : '' }}" href="{{route('member')}}">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'borrow' ? 'active' : '' }}" href="{{route('borrow')}}">Borrowed Books</a>
        </li>
        @php $type = Session::get('operator')->type @endphp
        @if($type == 'admin')
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'operator' ? 'active' : '' }}" href="{{route('operator')}}">Operators</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link {{Request::path() === 'login' ? 'active' : '' }}" href="{{route('login')}}">Sign in</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>