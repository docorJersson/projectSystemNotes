<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SYSTEM NOTES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">

  <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/build/css/custom.min.css" rel="stylesheet">
  <!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"-->
  <!--DATATABLES CSS-->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!--select-2-->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">



</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-navy">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-equals"></i></a>
        </li>
      </ul>

      {{--  <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search text-white"></i>
          </button>
        </div>
      </div>
    </form>  --}}

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif --}}
          @else
          <li class="nav-item dropdown">
            <div class="square" id="navbarDropdown">
              <a href="#" class="letter text-white" id="letter" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>{{auth()->user()->name}} <span class="caret"
                  id="navbarDropdown"></span></a>

              <div class="dropdown-menu dropdown-menu-right text-navy" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  <b>{{ __('Logout') }}</b>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </li>
          @endguest
        </ul>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-navy elevation-4">
      <!-- Brand Logo -->
      <a href="{{URL::to('home')}}" class="brand-link bg-blue">
        <img src="{{asset('assets/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">System Notes</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block text-white"><i><b>Klac Designs</b></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-blue">
              <i class="fa fa-th fa-lg" aria-hidden="true"></i>
              <p class="text-white">
                Dashboard
                {{--  <i class="right fas fa-angle-left"></i>  --}}
              </p>
            </a>
            </li>

               <li class="nav-item">
                <a href="{{URL::to('/courses')}}" class="text-white nav-link">Cursos</a>
              </li>
               <li class="nav-item">
               <a href="/subjects" class="text-white nav-link">Asignaturas/Capacidades</a>
              </li>
              <li class="nav-item">
              <a href="/personnel" class="text-white nav-link">Personal</a>
              </li>
              <li class="nav-item">
             <a href="/register_notes" class="text-white">Registro de Notas</a>
              </li>
              <li class="nav-item">
                <a href="/catedra" class="text-white">Cátedra</a>
                 </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper content">
      <!-- Main content -->
      <section class="">

        @yield('content')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer bg-navy footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="#">Klac Designs</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>
  <script src="{{asset('js/scripts.js')}}"></script>
  <!--DATATABLES-->
  <script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  <!--SELECT 2 LIBRERIAS-->
  <script src="{{asset('assets/adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('datatable.js')}}"></script>
</body>

</html>