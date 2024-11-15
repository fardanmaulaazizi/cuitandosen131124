
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cuitandosen</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
  <!-- Dropify -->
  <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
  
  <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  {{-- <script src="https://cdn.tiny.cloud/1/v4bt6bsshsgaherq3qdapzo0ud8wlserywpf3h4u7r78qz1d/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> --}}
  <script src="{{asset('tinymce/tinymce/tinymce.min.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">

  <!-- Video.js -->
  <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
  
  <script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-STC0kPwemJUP83Kl"></script>
</head>

<body class="" data-bs-theme="{{auth()->user()->theme}}">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <H3>CUITANDOSEN</H3>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{request()->path() == 'admin' ? 'active' : ''}}" href="{{url('admin')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          @if (auth()->user()->role == 'admin')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Fungsi Admin</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), ['admin-atur', 'admin-tryout', 'admin-video', 'admin-materi']) ? 'active' : '' }}" href="{{ url('admin-atur') }}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Atur Paket</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), ['admin-diskon']) ? 'active' : '' }}" href="{{ url('admin-diskon') }}" aria-expanded="false">
              <span>
                <i class="ti ti-tag"></i>
              </span>
              <span class="hide-menu">Atur Diskon</span>
            </a>
          </li>
          @endif
          
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Menu</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), 'admin-paket') ? 'active' : '' }}" href="{{url('admin-paket')}}" aria-expanded="false">
              <span>
                <i class="ti ti-article"></i>
              </span>
              <span class="hide-menu">Beli Paket</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), 'admin-beli') ? 'active' : '' }}" href="{{url('admin-beli')}}" aria-expanded="false">
              <span>
                <i class="ti ti-alert-circle"></i>
              </span>
              <span class="hide-menu">Pembelian</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), ['admin-mypaket', 'admin-basic']) ? 'active' : '' }}" href="{{url('admin-mypaket')}}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Paket Saya</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), 'admin-free-tryout') ? 'active' : '' }}" href="{{url('admin-free-tryout')}}" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Tryout Gratis</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link " href="#" aria-expanded="false">
              <span>
                <i class="ti ti-file-description"></i>
              </span>
              <span class="hide-menu">Kelas Privat</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Str::startsWith(request()->path(), 'admin-akun') ? 'active' : '' }}" href="{{url('admin-akun')}}" aria-expanded="false">
              <span>
                <i class="ti ti-typography"></i>
              </span>
              <span class="hide-menu">Akun Saya</span>
            </a>
          </li>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item ms-4">
                <div class="tdnn {{auth()->user()->theme == 'light' ? 'day' : ''}}">
                  <div class="moon {{auth()->user()->theme == 'light' ? 'sun' : ''}}">
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="account-circle" style="background-color: {{ generateAccountCircle(auth()->user()->name)['color'] }}">{{ generateAccountCircle(auth()->user()->name)['initials'] }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a class="btn btn-outline-primary mx-3 mt-2 d-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      @yield('content')
    </div>
  </div>
  <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('dropify/dist/js/dropify.js')}}"></script>
  <script src="{{asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
  <script>
    $('.tdnn').click(function () {
      var csrfToken = '{{csrf_token()}}';
      if ($("body").attr("data-bs-theme") === "light") {
            $("body").attr("data-bs-theme", "dark");
            $.ajax({
              url: '/change-theme/dark',
              method:'get',
              headers:{
                'X-CSRF-TOKEN' : csrfToken
              },
              success: function(response){
                console.log(response)
              },
              error: function(error){
                console.log(error)
              }
            })
        } else {
            $("body").attr("data-bs-theme", "light");
            $.ajax({
              url: '/change-theme/light',
              method:'get',
              headers:{
                'X-CSRF-TOKEN' : csrfToken
              },
              success: function(response){
                console.log(response)
              },
              error: function(error){
                console.log(error)
              }
            })
        }
      $(".moon").toggleClass('sun');
      $(".tdnn").toggleClass('day');
    });
  </script>
  @yield('script')
</body>

</html>