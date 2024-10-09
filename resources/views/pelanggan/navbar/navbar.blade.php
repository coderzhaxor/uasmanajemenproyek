<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #FFB22C">
  <div class="container">
    <a class="navbar-brand" href="#">Marketplace Katering</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
      <ul class="navbar-nav gap-4">
        <li class="nav-item">
          <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::path() == 'shop' ? 'active' : '' }}" href="/shop">Shop</a>
        </li>
      </ul>
      <form class="d-flex gap-4 align-items-center" role="search">
        @if (Auth::check())
          <!-- Show username and logout when user is logged in -->
          <span class="navbar-text text-light">{{ Auth::user()->username }}</span>
          <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
          <form id="logout-form" action="{{ route('logout.pelanggan') }}" method="POST" style="display: none;">
              @csrf
          </form>
        @else
          <!-- Show login/register button when not logged in -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Login | Register</button>
        @endif
      </form>
    </div>
  </div>
</nav>
