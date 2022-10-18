<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SIBAPOKTING</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('public/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('public/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('public/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('public/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('public/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('public/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />



    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" /> --}}

    
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-green">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{route('admin')}}" class="logo"><b>Admin</b><font color="#7fd858">SI</font><font color="#28aae1">BAPOK</font><font color="#f9c21e">TING</font></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">      
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{asset('public/logo_/profil.png')}}" class="user-image" alt="User Image" />
                                        <span class="hidden-xs"><font color="#000000">{{Auth::user()->name}}</font></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="{{asset('public/logo_/profil.png')}}" class="img-circle" alt="User Image" />
                                            <p>
                                                    <font color="#000000">{{Auth::user()->name}}</font>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
        
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="{{Route('userdetail')}}" class="btn btn-default btn-flat">User Setting</a>
                                            </div>
                                            <div class="pull-right">
                                                    <form id="yourFormId" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    </form>
                                                <button id="yourLinkId"  class="btn btn-default btn-flat">logout</button>
                                                <script>
                                                    document.getElementById("yourLinkId").onclick = function() {
                                                    document.getElementById("yourFormId").submit();
                                                }
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.menu')
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2018-2019 <font color="#7fd858">SI</font><font color="#28aae1">BAPOK</font><font color="#f9c21e">TING</font></strong> All rights reserved.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ asset('public/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/app.min.js') }}" type="text/javascript"></script> 
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <script src="{{ asset('public/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('public/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('public/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    @yield('js')

</body>
</html>