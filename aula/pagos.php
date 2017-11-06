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

    <title>Pagos</title>

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
              <a href="index.html" class="site_title"><span><small>Colegio Nuevo Milenio</small></span></a>
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
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  <ul class="nav side-menu">
  
                    <li><a href="index.html"><i class="fa fa-home"></i> Inicio </a></li>
  
                    <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="alumnos.html">Alumnos</a></li>
                        <li><a href="docentes.html">Docentes</a></li>
  
                      </ul>
                    </li>
                    
                    <li><a><i class="fa fa-graduation-cap"></i> Notas <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="calificaciones.html">Calificaciones</a></li>
                        <li><a href="tareas.html">Tareas</a></li>
                      </ul>
                    </li>
  
                    <li><a><i class="fa fa-gavel"></i> Conducta <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="faltas.html">Faltas</a></li>
                        <li><a href="tipos_faltas.html">Tipos de Faltas</a></li>
                        <li><a href="faltas_aplicadas.html">Faltas Aplicadas</a></li>
                        <li><a href="observaciones.html">Observaciones</a></li>
                      </ul>
                    </li>
  
                    <li><a href="grados.html"><i class="fa fa-book"></i> Grados </a></li>
  
                    <li><a href="materias.html"><i class="fa fa-pencil"></i> Materias </a></li>
  
                    <li><a><i class="fa fa-clock-o"></i> Horarios <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="horas_clase.html">Horas Clase</a></li>
                        <li><a href="itinerario.html">Itinerario</a></li>
                      </ul>
                    </li>
  
                    <li><a href="pagos.html"><i class="fa fa-money"></i> Pagos </a></li>
                    
                    <li><a><i class="fa fa-line-chart"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="menu_section">
                  <h3>Extra</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="e_commerce.html">E-commerce</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project Detail</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="page_403.html">403 Error</a></li>
                        <li><a href="page_404.html">404 Error</a></li>
                        <li><a href="page_500.html">500 Error</a></li>
                        <li><a href="plain_page.html">Plain Page</a></li>
                        <li><a href="login.html">Login Page</a></li>
                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="#level1_1">Level One</a>
                          <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li class="sub_menu"><a href="level2.html">Level Two</a>
                              </li>
                              <li><a href="#level2_1">Level Two</a>
                              </li>
                              <li><a href="#level2_2">Level Two</a>
                              </li>
                            </ul>
                          </li>
                          <li><a href="#level1_2">Level One</a>
                          </li>
                      </ul>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
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
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
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
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Meses de Pago</h3>
                <button type="button" class="btn btn-round btn-info">Ayuda <i class="fa fa-question-circle"></i></button>
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


                      <?php
                      $meses = [
                        1 => "Enero",
                        2 => "Febrero",
                        3 => "Marzo",
                        4 => "Abril",
                        5 => "Mayo",
                        6 => "Junio",
                        7 => "Julio",
                        8 => "Agosto",
                        9 => "Septiembre",
                        10 => "Octubre",
                        11 => "Noviembre",
                        12 => "Diciembre",
                    ];

                    $i = 0;
                    $menu="";
                    foreach ($meses as $mes){
                      
                      $i = $i +1;

                      $sql="SELECT COUNT(Id_Pago) AS Pagos FROM Pago WHERE Mes=? AND Status!=3";
                      $values=array($meses[$i]);
                      $datos=Database::getRow($sql, $values);
                      
                      
                      $sql="SELECT COUNT(Id_Pago) AS Pagos FROM Pago WHERE Mes=? AND Status=2";
                      $values=array($meses[$i]);
                      $datos2=Database::getRow($sql, $values);
                      
                      
                        if ($datos2['Pagos']==0) {
                          $menu.=
                          "
                          <!-- price element -->
                          <div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class='pricing ui-ribbon-container'>
                                <div class='ui-ribbon-wrapper'>
                                  <div class='ui-ribbon'>
                                    <!--30% Off-->
                                    Vacio
                                  </div>
                                </div>
                                <div style='background-color:tomato;' class='title'>
                                  
                                  <h1>$meses[$i]</h1>
                                  <a href='admin_pagos.php?Mes=$meses[$i]'><button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='right' title='Ver'><i class='fa fa-folder'> </i> Administrar </button></a>
                                </div>
                                <div class='x_content'>
                                  
                                </div>
                              </div>
                            </div>
                            <!-- price element -->

                          ";
                        } else if ($datos2['Pagos']==$datos['Pagos']) {
                          $menu.=
                          "
                          <div class='col-md-3 col-sm-6 col-xs-12'>
                          <div class='pricing ui-ribbon-container'>
                            <div class='ui-ribbon-wrapper'>
                              <div class='ui-ribbon'>
                                <!--30% Off-->
                                Completo
                              </div>
                            </div>
                            <div class='title'>
                              
                              <h1>$meses[$i]</h1>
                              <a href='admin_pagos.php?Mes=$meses[$i]'><button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='right' title='Ver'><i class='fa fa-folder'> </i> Administrar </button></a>
                            </div>
                            <div class='x_content'>
                              
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                          ";
                        }
                        else{
                          $menu.=
                          "
                          <div class='col-md-3 col-sm-6 col-xs-12'>
                          <div class='pricing ui-ribbon-container'>
                            <div class='ui-ribbon-wrapper'>
                              <div class='ui-ribbon'>
                                <!--30% Off-->
                                Incompleto
                              </div>
                            </div>
                            <div style='background-color:darkkhaki' class='title'>
                              
                              <h1>$meses[$i]</h1>
                              <a href='admin_pagos.php?Mes=$meses[$i]'><button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='right' title='Ver'><i class='fa fa-folder'> </i> Administrar </button></a>
                            </div>
                            <div class='x_content'>
                              
                            </div>
                          </div>
                        </div>
                          ";


                        }
                        
                        
                      

                    }
                    print($menu);
                    

                      ?>

                      

                      
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>