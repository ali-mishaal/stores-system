
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    
    <title>@yield('title') </title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/backend-css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/backend-css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/backend-css/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('css/backend-css/iCheck/green.css') }}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('css/backend-css/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('css/backend-css/jqvmap/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('css/backend-css/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/backend-css/custom.min.css') }}" rel="stylesheet">

    @yield('css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/mftrading" class="site_title"><span>MF Trading!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                  </li>

                  <li>
                    <a href="{{ route('index.report') }}"><i class="fa fa-home"></i> rports</a>
                  </li>

           
                  <li><a><i class="fa fa-edit"></i>clients <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('create.client') }}">Add client</a></li>
                      <li><a href="{{ route('index.client') }}">View clients</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> stores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('create.sotre') }}">Add store</a></li>
                      <li><a href="{{ route('index.sotre') }}">View stores</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> items <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('create.item') }}">Add item</a></li>
                      <li><a href="{{ route('index.item') }}"> View items</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Bill Head <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('upload.report') }}">Add Bill (upload)</a></li>
                      <li><a href="{{ route('create.head') }}">Add Bill</a></li>
                      <li><a href="{{ route('index.head') }}"> View Bill</a></li>
                    </ul>
                  </li>


                </ul>

              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    
                    <span class=" fa fa-angle-down"></span>
                  </a>
                
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



@yield('content')

<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/backend-js/jquery.min.js') }}"></script>

     @yield('script')
    <!-- Bootstrap -->
    <script src="{{ asset('js/backend-js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/backend-js/fastclick/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/backend-js/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('js/backend-js/chart/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('js/backend-js/gauge/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('js/backend-js/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('js/backend-js/icheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('js/backend-js/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('js/backend-js/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/backend-js/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/backend-js/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('js/backend-js/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('js/backend-js/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('js/backend-js/flot.orderbars/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('js/backend-js/flot-spline/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('js/backend-js/dateJs/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('js/backend-js/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('js/backend-js/jqvmap/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('js/backend-js/jqvmap/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('js/backend-js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    
    <!-- validator -->
    <script src="{{ asset('js/backend-js/validator/validator.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/backend-js/custom.min.js') }}"></script>

   
    
  </body>
</html>
