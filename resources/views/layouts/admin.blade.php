<!DOCTYPE html>
<html lang="en" ng-app="RDTI-blog">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @yield('title') --}}
    <title>Grand City - Admin</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('head')

</head>
<body ng-cloak>
  <div class="wrapper">

    <header class="main-header row">
        <div class="site-logo col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <h2>
            <a href="{{ url('admin') }}" class="logo">
              <span class="logo-lg"><b>Grand City</b> Hotel</span>
            </a>
          </h2>  
        </div>

        <nav class="navbar navbar-static-top col-xs-9 col-sm-9 col-md-9 col-lg-9">
          @if (auth()->user())
              <ul class="list-inline pull-right">
                  <li>Welcome, {{ auth()->user()->name }}</li>
                  <li><a href="{{ url('logout') }}">Logout</a></li>
              </ul>
          @endif
        </nav>
    </header>
  
    <main class="row">
      <aside class="main-sidebar col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <section class="sidebar">
          
          <ul class="sidebar-menu">
            <li>
              <a href="{{ url('location') }}">
                <i class="fa fa-map-marker"></i> <span>Location</span>
              </a>
            </li>
            <li>
              <a href="{{ url('food') }}">
                <i class="fa fa-cutlery"></i> <span>Food</span>
              </a>
            </li>
            <li>
              <a href="{{ url('tour') }}">
                <i class="fa fa-plane"></i> <span>Tour</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>

      @yield('main')

      <div class="content-wrapper col-xs-10 col-sm-10 col-md-10 col-lg-10">
          @yield('content')
      </div>
    </main>
</div>
    
    <script src="{{ asset('js/vendor/angular.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/directives/FileModel.js') }}"></script>
    <script src="{{ asset('js/services/CrudService.js') }}"></script>
    <script src="{{ asset('js/services/AppearanceService.js') }}"></script>
    <script src="{{ asset('js/services/FileUploadService.js') }}"></script>
    @yield('footer')
</body>
</html>