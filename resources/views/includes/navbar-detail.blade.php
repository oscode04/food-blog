 <!-- navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid nav-custom">
      <a class="navbar-brand" href="#">
        <img src="../aset/icon/logo-crop.jpg" alt="">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ( request()->is('kategori')) ? 'active' : '' }}" href="{{ route('kategori') }}">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('inovasi-pangan')) ? 'active' : '' }}" href="{{ route('inovasi-pangan') }}"
              >Inovasi Pangan</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('produk')) ? 'active' : '' }}" href="{{ route('produk') }}">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('about-us')) ? 'active' : '' }}" href="{{route('about-us')}}">About Us</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
  <!-- end navbar -->