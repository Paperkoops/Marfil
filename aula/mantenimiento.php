<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mantenimiento </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <span>Colegio Nuevo Milenio</span>
            </a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

                <li>
                  <a href="index.html">
                    <i class="fa fa-home"></i> Inicio </a>
                </li>

                <li>
                  <a>
                    <i class="fa fa-users"></i> Usuarios
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="alumnos.html">Alumnos</a>
                    </li>
                    <li>
                      <a href="index2.html">Docentes</a>
                    </li>

                  </ul>
                </li>

                <li>
                  <a>
                    <i class="fa fa-graduation-cap"></i> Notas
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="calificaciones.html">Calificaciones</a>
                    </li>
                    <li>
                      <a href="tareas.html">Tareas</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a>
                    <i class="fa fa-gavel"></i> Conducta
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="faltas.html">Faltas</a>
                    </li>
                    <li>
                      <a href="tipos_faltas.html">Tipos de Faltas</a>
                    </li>
                    <li>
                      <a href="faltas_aplicadas.html">Faltas Aplicadas</a>
                    </li>
                    <li>
                      <a href="observaciones.html">Observaciones</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="grados.html">
                    <i class="fa fa-book"></i> Grados </a>
                </li>

                <li>
                  <a href="materias.html">
                    <i class="fa fa-pencil"></i> Materias </a>
                </li>

                <li>
                  <a>
                    <i class="fa fa-gear"></i> Mantenimiento
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a>Departamento
                        <span class="fa fa-chevron-down"></span>
                      </a>
                      <ul class="nav child_menu">
                        <li class="sub_menu">
                          <a href="mantenimiento2.html">Departamento</a>
                        </li>
                        <li>
                          <a href="mantenimiento2.html">Municipio</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="mantenimiento.html">Estado Civìl</a>
                    </li>
                    <li>
                      <a href="mantenimiento.html">Género</a>
                    </li>
                    <li>
                      <a href="mantenimiento.html">Medios de Transporte</a>
                    </li>
                    <li>
                      <a href="mantenimiento.html">Periodos</a>
                    </li>
                    <li>
                      <a href="mantenimiento.html">Religión</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a>
                    <i class="fa fa-clock-o"></i> Horarios
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="horas_clase.html">Horas Clase</a>
                    </li>
                    <li>
                      <a href="itinerario.html">Itinerario</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="pagos.html">
                    <i class="fa fa-money"></i> Pagos </a>
                </li>

                <li>
                  <a>
                    <i class="fa fa-line-chart"></i> Reportes
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">

                  </ul>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Extra</h3>
              <ul class="nav side-menu">
                <li>
                  <a>
                    <i class="fa fa-bug"></i> Additional Pages
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="e_commerce.html">E-commerce</a>
                    </li>
                    <li>
                      <a href="projects.html">Projects</a>
                    </li>
                    <li>
                      <a href="project_detail.html">Project Detail</a>
                    </li>
                    <li>
                      <a href="contacts.html">Contacts</a>
                    </li>
                    <li>
                      <a href="profile.html">Profile</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-windows"></i> Extras
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="page_403.html">403 Error</a>
                    </li>
                    <li>
                      <a href="page_404.html">404 Error</a>
                    </li>
                    <li>
                      <a href="page_500.html">500 Error</a>
                    </li>
                    <li>
                      <a href="plain_page.html">Plain Page</a>
                    </li>
                    <li>
                      <a href="login.html">Login Page</a>
                    </li>
                    <li>
                      <a href="pricing_tables.html">Pricing Tables</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-sitemap"></i> Multilevel Menu
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="#level1_1">Level One</a>
                      <li>
                        <a>Level One
                          <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                          <li class="sub_menu">
                            <a href="level2.html">Level Two</a>
                          </li>
                          <li>
                            <a href="#level2_1">Level Two</a>
                          </li>
                          <li>
                            <a href="#level2_2">Level Two</a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="#level1_2">Level One</a>
                      </li>
                  </ul>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="fa fa-laptop"></i> Landing Page
                      <span class="label label-success pull-right">Coming Soon</span>
                    </a>
                  </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle">
                <i class="fa fa-bars"></i>
              </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="javascript:;"> Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li>
                    <a href="login.html">
                      <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                        <img src="images/img.jpg" alt="Profile Image" />
                      </span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <!-- Estado civíl -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Mantenimiento</h3>
              <a href="estado_civil.php">
                <button type="button" class="btn btn-round btn-success">Agregar registros 
                  <i class="fa fa-plus-circle"></i>
                </button>
              </a>
              <button type="button" class="btn btn-round btn-info">Ayuda
                <i class="fa fa-question-circle"></i>
              </button>
            </div>


            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Estado Civíl </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Settings 1</a>
                        </li>
                        <li>
                          <a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="close-link">
                        <i class="fa fa-close"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Estado civíl</th>
                      </tr>
                    </thead>

                    <tbody>
                            <?php
                            $sql="SELECT Id_Estado, Nombre_Estado FROM estado_civil WHERE Status=?";
                            $values=array(1);
                            $datos=Database::getRows($sql, $values);
                            $menu="";
                              
                            foreach ($datos as $fila) 
                            {
                              $menu.="<tr>
                                          <td>$fila[Id_Estado]</td>
                                          <td>$fila[Nombre_Estado]</td>
                                          <td>
                                          <div style='text-align: center;'>
                                          <a href='estado_civil_editar.php?id=$fila[Id_Estado]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a>
                                          <a href='eliminar_estado_civil.php?id=$fila[Id_Estado]' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Eliminar </a>
                                          </div>
                                        </td>
                                      </tr>";
                                     
                            }
                            print($menu);
                            ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>

          <!-- Género -->
          <br>
          <br>
          
          <div class="page-title">
              <div class="title_left">
                <a href="genero.php">
                  <button type="button" class="btn btn-round btn-success">Agregar registros 
                    <i class="fa fa-plus-circle"></i>
                  </button>
                </a>
                <button type="button" class="btn btn-round btn-info">Ayuda
                  <i class="fa fa-question-circle"></i>
                </button>
              </div>
  
  
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Género </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Settings 1</a>
                        </li>
                        <li>
                          <a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="close-link">
                        <i class="fa fa-close"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Género</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php
                    $sql="SELECT Id_Genero, Nombre_Genero FROM genero WHERE Status=?";
                    $values=array(1);
                    $datos=Database::getRows($sql, $values);
                    $menu="";
                      
                    foreach ($datos as $fila) 
                    {
                      $menu.="<tr>
                                  <td>$fila[Id_Genero]</td>
                                  <td>$fila[Nombre_Genero]</td>
                                  <td>
                                  <div style='text-align: center;'>
                                  <a href='genero_editar.php?id=$fila[Id_Genero]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a>
                                  <a href='eliminar_genero.php?id=$fila[Id_Genero]' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Eliminar </a>
                                  </div>
                                </td>
                              </tr>";
                             
                    }
                    print($menu);
                    ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>

          <!-- Medios de Transporte -->
          <br>
          <br>
          
          <div class="page-title">
              <div class="title_left">
                <a href="transporte.php">
                  <button type="button" class="btn btn-round btn-success">Agregar registros 
                    <i class="fa fa-plus-circle"></i>
                  </button>
                </a>
                <button type="button" class="btn btn-round btn-info">Ayuda
                  <i class="fa fa-question-circle"></i>
                </button>
              </div>
  
  
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Medios de Transporte </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Settings 1</a>
                        </li>
                        <li>
                          <a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="close-link">
                        <i class="fa fa-close"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Medio</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php
                            $sql="SELECT Id_Medio, Nombre_Medio FROM medio_transporte WHERE Status=?";
                            $values=array(1);
                            $datos=Database::getRows($sql, $values);
                            $menu="";
                              
                            foreach ($datos as $fila) 
                            {
                              $menu.="<tr>
                                          <td>$fila[Id_Medio]</td>
                                          <td>$fila[Nombre_Medio]</td>
                                          <td>
                                          <div style='text-align: center;'>
                                          <a href='transporte_editar.php?id=$fila[Id_Medio]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a>
                                          <a href='eliminar_medio.php?id=$fila[Id_Medio]' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Eliminar </a>
                                          </div>
                                        </td>
                                      </tr>";
                                     
                            }
                            print($menu);
                      ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>

          <!-- Periodos -->
          <br>
          <br>
          
          <div class="page-title">
              <div class="title_left">
                <a href="periodo.php">
                  <button type="button" class="btn btn-round btn-success">Agregar registros 
                    <i class="fa fa-plus-circle"></i>
                  </button>
                </a>
                <button type="button" class="btn btn-round btn-info">Ayuda
                  <i class="fa fa-question-circle"></i>
                </button>
              </div>
  
  
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Periodos </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Settings 1</a>
                        </li>
                        <li>
                          <a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="close-link">
                        <i class="fa fa-close"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                      </tr>
                    </thead>


                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>01/17/2018</td>
                        <td>02/28/2018</td>
                        <td>
                          <div style="text-align: center;">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Ver">
                              <i class="fa fa-eye"> </i>
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Editar">
                              <i class="fa fa-pencil"> </i>
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Eliminar">
                              <i class="fa fa-trash"> </i>
                            </button>
                        </td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>03/01/2018</td>
                          <td>04/30/2018</td>
                          <td>
                          <div style="text-align: center;">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Ver">
                              <i class="fa fa-eye"> </i>
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Editar">
                              <i class="fa fa-pencil"> </i>
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Eliminar">
                              <i class="fa fa-trash"> </i>
                            </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>


          <!-- Religión -->
          <br>
          <br>
          
          <div class="page-title">
              <div class="title_left">
                <a href="religion.php">
                  <button type="button" class="btn btn-round btn-success">Agregar registros 
                    <i class="fa fa-plus-circle"></i>
                  </button>
                </a>
                <button type="button" class="btn btn-round btn-info">Ayuda
                  <i class="fa fa-question-circle"></i>
                </button>
              </div>
  
  
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Religiones </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Settings 1</a>
                        </li>
                        <li>
                          <a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a class="close-link">
                        <i class="fa fa-close"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Religión</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php
                    $sql="SELECT Id_Religion, Nombre_Religion FROM religion WHERE Status=?";
                    $values=array(1);
                    $datos=Database::getRows($sql, $values);
                    $menu="";
                      
                    foreach ($datos as $fila) 
                    {
                      $menu.="<tr>
                                  <td>$fila[Id_Religion]</td>
                                  <td>$fila[Nombre_Religion]</td>
                                  <td>
                                  <div style='text-align: center;'>
                                  <a href='religion_editar.php?id=$fila[Id_Religion]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a>
                                  <a href='eliminar_religion.php?id=$fila[Id_Religion]' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Eliminar </a>
                                  </div>
                                </td>
                              </tr>";
                             
                    }
                    print($menu);
                    ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>


          <!-- Imprimir    -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Imprimir</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li>
                      <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
          
          
                <div class="x_content">
                  <h4>Estado civíl </h4>
                  <div id="datata_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
                    <div class="dt-buttons btn-group">
                      <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="datata" href="#">
                        <span>Copy</span>
                      </a>
                      <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="datata" href="#">
                        <span>CSV</span>
                      </a>
          
                      <div style="position: absolute; left: 0px; top: 0px; width: 52px; height: 34px; z-index: 99;">
                        <embed id="ZeroClipboard_TableToolsMovie_2" src="//cdn.datatables.net/buttons/1.2.0/swf/flashExport.swf" loop="false" menu="false"
                          quality="best" bgcolor="#ffffff" width="52" height="34" name="ZeroClipboard_TableToolsMovie_2" align="middle"
                          allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"
                          flashvars="id=2&amp;width=52&amp;height=34" wmode="transparent">
                      </div>
                      </a>
                      <a class="btn btn-default buttons-print" tabindex="0" aria-controls="datata" href="#">
                        <span>Print</span>
                      </a>
                    </div>
                    <div id="datata_filter" class="dataTables_filter">
                      <label>Search:
                        <input type="search" class="form-control input-sm" placeholder="" aria-controls="datata">
                      </label>
                    </div>
          
                    <table id="datata" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datata_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"
                            style="width: 50px;">Id</th>
                          <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Estado civíl: activate to sort column ascending"
                            style="width: 64px;">Estado civíl</th>
          
                        </tr>
                      </thead>
          
                      <tbody>
          
                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>Soltero</td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">2</td>
                          <td>Casado</td>
                        </tr>
          
                      </tbody>
                    </table>
                    <div class="dataTables_info" id="datata_info" role="status" aria-live="polite">Mostrando 2 de 2 filas</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="datata_paginate">
                      <ul class="pagination">
                        <li class="paginate_button previous disabled" id="datata_previous">
                          <a href="#" aria-controls="datata" data-dt-idx="0" tabindex="0">Anterior</a>
                        </li>
                        <li class="paginate_button active">
                          <a href="#" aria-controls="datata" data-dt-idx="1" tabindex="0">1</a>
                        </li>
                        <li class="paginate_button next disabled" id="datata_next">
                          <a href="#" aria-controls="datata" data-dt-idx="2" tabindex="0">Siguiente</a>
                        </li>
                      </ul>
                    </div>
          
                  </div>
                </div>
          
                <br>
                <br>
                <div class="x_content">
                  <h4>Género</h4>
                  <div id="datata_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
                    <div class="dt-buttons btn-group">
                      <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="datata" href="#">
                        <span>Copy</span>
                      </a>
                      <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="datata" href="#">
                        <span>CSV</span>
                      </a>
          
                      <a class="btn btn-default buttons-print" tabindex="0" aria-controls="datata" href="#">
                        <span>Print</span>
                      </a>
                    </div>
                    <div id="datata_filter" class="dataTables_filter">
                      <label>Search:
                        <input type="search" class="form-control input-sm" placeholder="" aria-controls="datata">
                      </label>
                    </div>
          
                    <table id="datata" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datata_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"
                            style="width: 50px;">Id</th>
                          <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Género: activate to sort column ascending"
                            style="width: 64px;">Género</th>
                        </tr>
                      </thead>
          
                      <tbody>
          
                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>Femenino</td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">2</td>
                          <td>Masculino</td>
                        </tr>
          
                      </tbody>
                    </table>
                    <div class="dataTables_info" id="datata_info" role="status" aria-live="polite">Mostrando 2 de 2 filas</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="datata_paginate">
                      <ul class="pagination">
                        <li class="paginate_button previous disabled" id="datata_previous">
                          <a href="#" aria-controls="datata" data-dt-idx="0" tabindex="0">Anterior</a>
                        </li>
                        <li class="paginate_button active">
                          <a href="#" aria-controls="datata" data-dt-idx="1" tabindex="0">1</a>
                        </li>
                        <li class="paginate_button next disabled" id="datata_next">
                          <a href="#" aria-controls="datata" data-dt-idx="2" tabindex="0">Siguiente</a>
                        </li>
                      </ul>
                    </div>
          
                    <br>
                    <br>
                    <div class="x_content">
                      <h4>Medios de Transporte</h4>
                      <div id="datata_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
                        <div class="dt-buttons btn-group">
                          <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="datata" href="#">
                            <span>Copy</span>
                          </a>
                          <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="datata" href="#">
                            <span>CSV</span>
                          </a>
          
                          <a class="btn btn-default buttons-print" tabindex="0" aria-controls="datata" href="#">
                            <span>Print</span>
                          </a>
                        </div>
                        <div id="datata_filter" class="dataTables_filter">
                          <label>Search:
                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="datata">
                          </label>
                        </div>
          
                        <table id="datata" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datata_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"
                                style="width: 50px;">Id</th>
                              <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Medio: activate to sort column ascending"
                                style="width: 64px;">Medio</th>
                            </tr>
                          </thead>
          
                          <tbody>
          
                            <tr role="row" class="odd">
                              <td class="sorting_1">1</td>
                              <td>Automóvil</td>
                            </tr>
                            <tr role="row" class="even">
                              <td class="sorting_1">2</td>
                              <td>Transporte público</td>
                            </tr>
                            <tr role="row" class="odd">
                              <td class="sorting_1">3</td>
                              <td>Caminando</td>
                            </tr>
                            <tr role="row" class="even">
                              <td class="sorting_1">4</td>
                              <td>Bicicleta</td>
                            </tr>
          
                          </tbody>
                        </table>
                        <div class="dataTables_info" id="datata_info" role="status" aria-live="polite">Mostrando 4 de 4 filas</div>
                        <div class="dataTables_paginate paging_simple_numbers" id="datata_paginate">
                          <ul class="pagination">
                            <li class="paginate_button previous disabled" id="datata_previous">
                              <a href="#" aria-controls="datata" data-dt-idx="0" tabindex="0">Anterior</a>
                            </li>
                            <li class="paginate_button active">
                              <a href="#" aria-controls="datata" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button next disabled" id="datata_next">
                              <a href="#" aria-controls="datata" data-dt-idx="2" tabindex="0">Siguiente</a>
                            </li>
                          </ul>
                        </div>
                        <br>
                        <br>
                        <div class="x_content">
                          <h4>Periodos</h4>
                          <div id="datata_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
                            <div class="dt-buttons btn-group">
                              <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="datata" href="#">
                                <span>Copy</span>
                              </a>
                              <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="datata" href="#">
                                <span>CSV</span>
                              </a>
          
                              <a class="btn btn-default buttons-print" tabindex="0" aria-controls="datata" href="#">
                                <span>Print</span>
                              </a>
                            </div>
                            <div id="datata_filter" class="dataTables_filter">
                              <label>Search:
                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="datata">
                              </label>
                            </div>
          
                            <table id="datata" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datata_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"
                                    style="width: 50px;">Id</th>
                                  <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Desde: activate to sort column ascending"
                                    style="width: 64px;">Desde</th>
                                  <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Hasta: activate to sort column ascending"
                                    style="width: 64px;">Hasta</th>
                                </tr>
                              </thead>
          
                              <tbody>
          
                                <tr role="row" class="odd">
                                  <td class="sorting_1">1</td>
                                  <td>01/17/2018</td>
                                  <td>02/28/2018</td>
                                </tr>
                                <tr role="row" class="even">
                                  <td class="sorting_1">2</td>
                                  <td>03/01/2018</td>
                                  <td>04/30/2018</td>
                                </tr>
          
                              </tbody>
                            </table>
                            <div class="dataTables_info" id="datata_info" role="status" aria-live="polite">Mostrando 2 de 2 filas</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="datata_paginate">
                              <ul class="pagination">
                                <li class="paginate_button previous disabled" id="datata_previous">
                                  <a href="#" aria-controls="datata" data-dt-idx="0" tabindex="0">Anterior</a>
                                </li>
                                <li class="paginate_button active">
                                  <a href="#" aria-controls="datata" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button next disabled" id="datata_next">
                                  <a href="#" aria-controls="datata" data-dt-idx="2" tabindex="0">Siguiente</a>
                                </li>
                              </ul>
                            </div>
          
                            <br>
                            <br>
                            <div class="x_content">
                              <h4>Religiones</h4>
                              <div id="datata_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
                                <div class="dt-buttons btn-group">
                                  <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="datata" href="#">
                                    <span>Copy</span>
                                  </a>
                                  <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="datata" href="#">
                                    <span>CSV</span>
                                  </a>
          
                                  <a class="btn btn-default buttons-print" tabindex="0" aria-controls="datata" href="#">
                                    <span>Print</span>
                                  </a>
                                </div>
                                <div id="datata_filter" class="dataTables_filter">
                                  <label>Search:
                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="datata">
                                  </label>
                                </div>
          
                                <table id="datata" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datata_info">
                                  <thead>
                                    <tr role="row">
                                      <th class="sorting_asc" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending"
                                        style="width: 50px;">Id</th>
                                      <th class="sorting" tabindex="0" aria-controls="datata" rowspan="1" colspan="1" aria-label="Religión: activate to sort column ascending"
                                        style="width: 64px;">Religión</th>
                                    </tr>
                                  </thead>
          
                                  <tbody>
          
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">1</td>
                                      <td>Católica</td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">2</td>
                                      <td>Cristiana</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                      <td class="sorting_1">3</td>
                                      <td>Budísta</td>
                                    </tr>
                                    <tr role="row" class="even">
                                      <td class="sorting_1">4</td>
                                      <td>Ninguna</td>
                                    </tr>
          
                                  </tbody>
                                </table>
                                <div class="dataTables_info" id="datata_info" role="status" aria-live="polite">Mostrando 2 de 2 filas</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="datata_paginate">
                                  <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="datata_previous">
                                      <a href="#" aria-controls="datata" data-dt-idx="0" tabindex="0">Anterior</a>
                                    </li>
                                    <li class="paginate_button active">
                                      <a href="#" aria-controls="datata" data-dt-idx="1" tabindex="0">1</a>
                                    </li>
                                    <li class="paginate_button next disabled" id="datata_next">
                                      <a href="#" aria-controls="datata" data-dt-idx="2" tabindex="0">Siguiente</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
          
                    </div>
                  </div>
                            
                    <!-- /page content -->
                    
                    <!-- footer content -->
                    <footer>
                      <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by
                        <a href="https://colorlib.com">Colorlib</a>
                      </div>
                      <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                    </div>
                    </div>

                      <!-- jQuery -->
                      <script src="../vendors/jquery/dist/jquery.min.js"></script>
                      <!-- Bootstrap -->
                      <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                      <!-- FastClick -->
                      <script src="../vendors/fastclick/lib/fastclick.js"></script>
                      <!-- NProgress -->
                      <script src="../vendors/nprogress/nprogress.js"></script>

                      <!-- Datatables -->
                      <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                      <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                      <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                      <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                      <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                      <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                      <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                      <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                      <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                      <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                      <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                      <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                      <script src="../vendors/jszip/dist/jszip.min.js"></script>
                      <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
                      <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

                      <!-- Custom Theme Scripts -->
                      <script src="../build/js/custom.min.js"></script>
                      <script src="js/custo.js"></script>
</body>

</html>