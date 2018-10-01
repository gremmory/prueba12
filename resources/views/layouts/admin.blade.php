<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Registros</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">

    <!-- ++++++++++++++++++ addge aad 
    <link rel="stylesheet" href="{{asset('css/src_dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('css/src_basic.css')}}">
    -->



    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>-</b>--</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <!--
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red"->     </small>
                  <span class="hidden-xs"></span>
                </a>
                -->
                @guest
                @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->Nombres . " " . Auth::user()->Apellidos }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
                @endguest
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>


<!-- +++++++++++++++++++++++++++ Inicio ++++++++++++++++++++++++++++++++++++++++ -->
            
            @if (Auth::user()->admin == 1)

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Sin Modelo</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('AnnosController@index')}}"><i class="fa fa-circle-o"></i> Años</a></li>
                <li><a href="{{URL::action('CargosController@index')}}"><i class="fa fa-circle-o"></i> Cargos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-qrcode"></i>
                <span>Modelo</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('ProfesionesController@index')}}"><i class="fa fa-circle-o"></i> Profesion </a></li>
                <li><a href="{{URL::action('MarcasController@index')}}"><i class="  fa fa-pencil-square"></i> Marcas </a></li>
                <li><a href="{{URL::action('ProveedoresController@index')}}"><i class=" fa fa-phone"></i> Proveedor </a></li>
                <li><a href="{{URL::action('NivelesController@index')}}"><i class="fa fa-institution"></i> Niveles </a></li>
                <li><a href="{{URL::action('JornadasController@index')}}"><i class="fa fa-sun-o"></i> Jornadas </a></li>
                <li><a href="{{URL::action('Errores_de_pegadosController@index')}}"><i class="fa fa-warning"></i> Errores de Pegado </a></li>
                <li><a href="{{URL::action('Switchboard_ItemsController@index')}}"><i class="fa fa-download"></i> Switchboard Items </a></li>
                <li><a href="{{URL::action('CtrlsupervisionesController@index')}}"><i class="fa fa-circle-o"></i> Ctrl-Supervisiones </a></li>
                <li><a href="{{URL::action('DispositivosController@index')}}"><i class="fa fa-laptop"></i> Dispositivos </a></li>
                <li><a href="{{URL::action('FasesController@index')}}"><i class="fa fa-laptop"></i> Fases </a></li>
                <li><a href="{{URL::action('Detalle_EquiposController@index')}}"><i class="fa fa-laptop"></i> Detalle Equipos </a></li>
              </ul>
            </  li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-flag-o"></i>
                <span>Dept-Municiopio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('DepartamentosController@index')}}"><i class="fa fa-circle-o"></i> Departamentos </a></li>
                <li><a href="{{URL::action('MunicipiosController@index')}}"><i class="fa fa-circle-o"></i> Municipios </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('UsuariosController@index')}}"><i class="fa fa-user"></i> Usuarios </a></li>
                <li><a href="{{URL::action('InstructoresController@index')}}"><i class="fa fa-user"></i> Instructores </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Establecimientos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('EstablecimientosController@index')}}"><i class="fa fa-university"></i> Establecimientos </a></li>
                <!--<li><a href=""><i class="fa fa-university"></i> Retiro de Equipos </a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Carga Masivas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('Carga_EstablecimientoController@index')}}"><i class="fa fa-university"></i> Carga Establecimientos </a></li>
                <li><a href="{{URL::action('Carga_EstablecimientoController@index2')}}"><i class="fa fa-university"></i> Carga Dispositivos </a></li>
                <!--<li><a href=""><i class="fa fa-university"></i> Retiro de Equipos </a></li>-->
              </ul>
            </li>
            @else
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Establecimientos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::action('EstablecimientosController@index')}}"><i class="fa fa-university"></i> Establecimientos </a></li>
                <!--<li><a href=""><i class="fa fa-university"></i> Retiro de Equipos </a></li>-->
              </ul>
            </li>
            
            @endif








<!--

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>                    
      -->    
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Registro</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              <!-- <h3>Contenido</h3> -->
                              @yield('contenido')
		                          <!--Fin Contenido-->		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
      </footer>


      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/Municipios.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- Drop Zone 
    <script src="{{asset('js/dropzone.js')}}"></script>
    -->

    
    
  </body>
</html>
