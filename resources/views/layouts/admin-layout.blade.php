<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    <link rel="icon" href="../../aset/icon/logo-crop.jpg" />

    @stack('prepend-style')
    {{-- @include('includes.style-2') --}}
    {{-- <link rel="stylesheet" href="style/dashboard.css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> --}}
    <link href="/../style/dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
   
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/> --}}
    {{-- @include('includes.style') --}}
    <style>
      .article-tittle {
        width: 500px;
        border-radius: 5px;
        padding: 2px 0px 2px 10px;
      }

      .radio-label {
        cursor: pointer;
        font-weight: 500;
        position: relative;
        overflow: hidden;
        margin-bottom: 0.375em;
      }

      .radio {
        position: absolute;
        left: -20px;
        &:checked + .radio-span {
          background-color: mix(#fff, #00005c, 84%);
        &:before {
          box-shadow: inset 0 0 0 0.4375em #00005c;
          }
        }
      }

      .radio-span {
		    display: flex;
        align-items: center;
        padding: 0.375em 0.75em 0.375em 0.375em;
        border-radius: 99em; // or something higher...
        transition: 0.25s ease;
        &:hover {
          background-color: mix(#fff, #00005c, 84%);
        }
        &:before {
          display: flex;
          flex-shrink: 0;
          content: "";
          background-color: #fff;
          width: 1.5em;
          height: 1.5em;
          border-radius: 50%;
          margin-right: 0.375em;
          transition: 0.25s ease;
          box-shadow: inset 0 0 0 0.125em #00005c;
        }
      }

    </style>
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/admin.png" alt="" class="my-4" style="max-width: 150px;" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('admin') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}"
            >
              Dashboard
            </a>
            <a
              href="{{ route('article')}}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/article*')) ? 'active' : '' }}"
            >
              Artikel
            </a>
            <a
              href="{{ route('video')}}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/video*')) ? 'active' : '' }}"
            >
              Video
            </a>
            <a
              href="{{route('category')}}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}"
            >
              Kategori
            </a>
            <a
              href="{{route('sub-category')}}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/sub-category*')) ? 'active' : '' }}"
            >
              Sub Kategori
            </a>
            {{-- <a
              href="#"
              class="list-group-item list-group-item-action"
            >
              Users
            </a> --}}

            <a class="list-group-item list-group-item-action" href="{{route('logout')}}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class"d-none">
              @csrf
            </form>
          </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              </div>
            </div>
          </nav>

          {{-- Content --}}
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    {{-- @include('includes.script-2') --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script> --}}
  
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
