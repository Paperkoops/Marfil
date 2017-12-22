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

    <title>Tareas </title>

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
              <div class="clearfix"></div>
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
                      <li><a href="index2.html">Docentes</a></li>

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
                <h3>Alumnos</h3>
                <a href="matricular_alumno.html"><button type="button" class="btn btn-round btn-success">Matricular Nuevo Alumno <i class="fa fa-plus-circle"></i></button></a>
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
            $sql="SELECT m.Id_Materia, m.Nombre_Materia, m.Id_Docente, m.Id_Grado, m.Eval_Mined, m.Status, g.Nombre_Grado, g.Tipo, d.Nombre_Docente FROM materia m, grado g, docente d WHERE m.Id_Grado=g.Id_Grado AND m.Id_Docente=d.Id_Docente";
            $values=array(1);
            $datos3=Database::getRows($sql, $values);
            $menu3="";
              
            
            foreach ($datos3 as $fila3) 
            {
              
            
              $menu3.="
              <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                  <div class='x_panel'>
                    <div class='x_title'>
                      <h2><i class='fa fa-bars'></i> $fila3[Nombre_Materia] <small>$fila3[Nombre_Grado] | Docente:$fila3[Nombre_Docente] </small></h2>
                      <ul class='nav navbar-right panel_toolbox'>
                        <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                        </li>
                        <li class='dropdown'>
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='#'>Settings 1</a>
                            </li>
                            <li><a href='#'>Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class='close-link'><i class='fa fa-close'></i></a>
                        </li>
                      </ul>
                      <div class='clearfix'></div>
                    </div>
                    <div class='x_content'>
  
                      <div class='col-xs-3'>
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class='nav nav-tabs tabs-left'>
              
              ";
              $menu="";
            if ($fila3['Tipo']==1) {
              $menu.="<li class='active'><a href='#p1m1m$fila3[Eval_Mined]' data-toggle='tab'>Febrero</a>
              </li>
              <li><a href='#p1m2m$fila3[Eval_Mined]' data-toggle='tab'>Marzo</a>
              </li>
              <li><a href='#p2m3m$fila3[Eval_Mined]' data-toggle='tab'>Abril</a>
              </li>
              <li><a href='#p2m4m$fila3[Eval_Mined]' data-toggle='tab'>Mayo</a>
              </li>
              <li><a href='#p3m5m$fila3[Eval_Mined]' data-toggle='tab'>Junio</a>
              </li>
              <li><a href='#p3m6m$fila3[Eval_Mined]' data-toggle='tab'>Julio</a>
              </li>
              <li><a href='#p4m7m$fila3[Eval_Mined]' data-toggle='tab'>Agosto</a>
              </li>
              <li><a href='#p4m8m$fila3[Eval_Mined]' data-toggle='tab'>Septiembre</a>
              </li>
              <li><a href='#p5m9m$fila3[Eval_Mined]' data-toggle='tab'>Octubre</a>
              </li>
              
              ";
            } else {
              $menu.="<li class='active'><a href='#p1m1m$fila3[Eval_Mined]' data-toggle='tab'>Febrero</a>
              </li>
              <li><a href='#p1m2m$fila3[Eval_Mined]' data-toggle='tab'>Marzo</a>
              </li>
              <li><a href='#p2m3m$fila3[Eval_Mined]' data-toggle='tab'>Abril</a>
              </li>
              <li><a href='#p2m4m$fila3[Eval_Mined]' data-toggle='tab'>Mayo</a>
              </li>
              <li><a href='#p3m5m$fila3[Eval_Mined]' data-toggle='tab'>Junio</a>
              </li>
              <li><a href='#p3m6m$fila3[Eval_Mined]' data-toggle='tab'>Julio</a>
              </li>
              <li><a href='#p4m7m$fila3[Eval_Mined]' data-toggle='tab'>Agosto</a>
              </li>
              <li><a href='#p4m8m$fila3[Eval_Mined]' data-toggle='tab'>Septiembre</a>
              </li>
              <li><a href='#p4m9m$fila3[Eval_Mined]' data-toggle='tab'>Octubre</a>
              </li>
              
              ";
            }
            
           

              

              $menu3.= $menu;
              $menu3.= "
              </ul>
              </div>

              <div class='col-xs-9'>
                <!-- Tab panes -->
                <div class='tab-content'>";

                
                $menu="";
                  
                $patata = 1;

                for($i = 1; $i <= 12; $i++){
                  $periodo = 0;
                  if ($fila3['Tipo']==1) {
                    switch ($i) {
                      case 1:
                          $periodo = 1;
                          break;
                      case 2:
                          $periodo = 1;
                          break;
                      case 3:
                          $periodo = 2;
                          break;
                      case 4:
                          $periodo = 2;
                          break;
                      case 5:
                          $periodo = 3;
                          break;
                      case 6:
                          $periodo = 3;
                          break;
                      case 7:
                          $periodo = 4;
                          break;
                      case 8:
                          $periodo = 4;
                          break;
                      case 9:
                          $periodo = 5;
                          break;
                    }
                  } else {
                    switch ($i) {
                      case 1:
                          $periodo = 1;
                          break;
                      case 2:
                          $periodo = 1;
                          break;
                      case 3:
                          $periodo = 2;
                          break;
                      case 4:
                          $periodo = 2;
                          break;
                      case 5:
                          $periodo = 3;
                          break;
                      case 6:
                          $periodo = 3;
                          break;
                      case 7:
                          $periodo = 4;
                          break;
                      case 8:
                          $periodo = 4;
                          break;
                      case 9:
                          $periodo = 4;
                          break;
                    }
                  }
                  
                  
                  
                  if ($patata == 1) {
                    $menu.="<div class='tab-pane active' id='p$periodo";
                    $menu.="m$i" ;
                    $menu.="m$fila3[Eval_Mined]'>
                    <p class='lead'>Tareas</p>
                    ";


                  } else {
                    $menu.="<div class='tab-pane' id='p$periodo" ;
                    $menu.="m$i" ;
                    $menu.="m$fila3[Eval_Mined]'>
                    <p class='lead'>Tareas</p>
                    ";
                  }
                  
                  $menu.="<table class='table table-bordered'>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Actividad</th>
                      <th>Descripcion</th>
                      <th>Ponderacion</th>
                      <th>Fecha de Entrega</th>
                      <th>Administrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  ";
                  $sql="SELECT * FROM tarea WHERE Id_Periodo=? AND Id_Materia=? AND Status=? AND Mes_Tarea=?";
                  $values=array($periodo, $fila3['Id_Materia'], 1, $i);
                  $datos2=Database::getRows($sql, $values);
                  $zoe = 1;
                  $kled= 0;
                  $azir= 0;
                  foreach ($datos2 as $fila2) {
                    $menu.="
                    <tr>
                    <th scope='row'>$zoe</th>
                    <td>$fila2[Nombre_Tarea]</td>
                    <td>$fila2[Descripcion_Tarea]</td>
                    <td>$fila2[ponderacion]%</td>
                    <td>$fila2[Fecha_Entrega]</td>
                    <td><a href='editar_tarea.php?id=$fila2[Id_Tarea]' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Editar </a><a href='calificar.php?t=$fila2[Id_Tarea]&m=$fila3[Id_Materia]' class='btn btn-warning btn-xs'><i class='fa fa-pencil'></i> Calificar </a>
                    </td>
                  </tr>
                    ";
                    $zoe = $zoe + 1;
                    if ($fila2['ponderacion']==35) {
                      $kled = $kled + 1;
                    } else {
                      $azir = $azir + 1;
                    }
                    
                  }
                  if ($zoe!=4) {
                    if ($kled < 2) {
                      for($kled; $kled <= 1; $kled++){
                        $menu.="
                        <tr>
                        <th scope='row'>$zoe</th>
                        <td>Sin Asignar</td>
                        <td>Sin Asignar</td>
                        <td>35%</td>
                        <td>Sin Asignar</td>
                        <td><a href='agregar_tarea.php?Materia=$fila3[Id_Materia]&Periodo=$periodo&Mes=$i&Tipo=1' class='btn btn-success btn-xs'><i class='fa fa-plus-circle'></i> Asignar </a>
                        </td>
                      </tr>
                        ";
                        $zoe++;
                      }
                    } else {
                      
                      
                    }
                    if ($azir<1) {
                      $menu.="
                      <tr>
                      <th scope='row'>$zoe</th>
                      <td>Examen de Periodo</td>
                      <td>Sin Asignar</td>
                      <td>30%</td>
                      <td>Sin Asignar</td>
                      <td><a href='agregar_tarea.php?Materia=$fila3[Id_Materia]&Periodo=$periodo&Mes=$i&Tipo=2' class='btn btn-success btn-xs'><i class='fa fa-plus-circle'></i> Asignar </a>
                      </td>
                    </tr>
                      ";
                    } else {
                      # code...
                    }
                    
                  } else {
                    # code...
                  }
                  



                  $menu.="
                  </tbody>
                  </table>
                </div>
                  ";

                  $patata = $patata +1;

                  
                        

                }


                $menu3.= $menu;
                $menu3.= "
                
              </div>

            </div>

            <div class='clearfix'></div>

          </div>
        </div>
      </div>

    </div>";


            }
            
            
            print($menu3);
            ?>

            

                      

                        
                      



            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Imprimir <small>Todos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datata" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>NIE</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Fecha de Nacimiento</th>
                          <th>Genero</th>
                          <th>Grado</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
$sql="SELECT * FROM alumno WHERE Status=?";
$values=array(1);
$datos=Database::getRows($sql, $values);
$menu="";
  

foreach ($datos as $fila) 
{
  

  $menu.="<tr>
              <td>$fila[NIE]</td>
              <td>$fila[Nombre_Alumno]</td>
              <td>$fila[Apellido_Alumno]</td>
              <td>$fila[Fecha_Nacimiento]</td>
              <td>$fila[Id_Genero]</td>
              <td>$fila[Id_Grado]</td>
              
              

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
