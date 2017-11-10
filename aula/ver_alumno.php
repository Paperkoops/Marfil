<?php
include("database.php");
if (isset($_GET['Nie'])) {
  $id=$_GET['Nie'];
  $sql="SELECT a.NIE, a.Nombre_Alumno, a.Apellido_Alumno, a.Fecha_Nacimiento, a.Id_Genero, a.Nacionalidad, a.Id_Estado, a.Partida_Nacimiento, a.Distancia, a.Id_Medio, a.Dirección, a.Id_Municipio, a.Telefono, a.Celular, a.Email, a.Id_Religion, a.Miembros_Familia, a.Trabaja, a.Tiene_Hijos, a.Convivencia, a.Nombre_Padre, a.Dui_Padre, a.Telefono_Padre, a.Trabajo_Padre, a.Profesion_Padre, a.Nombre_Madre, a.Dui_Madre, a.Telefono_Madre, a.Trabajo_Madre, a.Profesion_Madre, a.Nombre_Responsable, a.Dui_Responsable, a.Telefono_Responsable, a.Trabajo_Responsable, a.Profesion_Responsable, a.Enfermedades_Alergias, a.Medicamentos, a.Fecha_Admision, a.Id_Grado, a.observacion, a.Foto, a.Status, g.Nombre_Grado, ec.Nombre_Estado, gene.Nombre_Genero, mt.Nombre_Medio, mt.Nombre_Medio, m.Nombre_Municipio, r.Nombre_Religion, case a.Trabaja when 1 then 'Si' else 'No' end as Trabaj, case a.Tiene_Hijos when 1 then 'Si' else 'No' end as Hijos FROM alumno a, grado g, estado_civil ec, genero gene, medio_transporte mt, municipio m, religion r WHERE a.Id_Genero=gene.Id_Genero AND a.Id_Estado=ec.Id_Estado AND a.Id_Medio=mt.Id_Medio AND a.Id_Municipio=m.Id_Municipio AND a.Id_Religion=r.Id_Religion AND a.Id_Grado=g.Id_Grado AND a.NIE=?";
  $values=array($id);
  $datos=Database::getRow($sql, $values);
}
else
{
  header("location: alumnos.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfil de Alumno</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span><small>Colegio Nuevo Milenio</small></span>
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
                <h3>Perfil de Alumno</h3>
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
                    <h2>Resumen<small>Alumno</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Imagen de Perfil">
                        </div>
                      </div>
                      <h3><?php print($datos['Nombre_Alumno']); print('</br>'); print($datos['Apellido_Alumno']); ?></h3>

                      <ul class="list-unstyled user_data">
                      <li><i class="fa fa-credit-card user-profile-icon"></i> <?php print($datos['NIE']); ?>
                          </li>
                      <li><i class="fa fa-institution user-profile-icon"></i> <?php print($datos['Nombre_Grado']); ?>
                          </li>

                          <li>
                              <i class="fa fa-user user-profile-icon"></i> <?php print($datos['Nombre_Genero']); ?>
                            </li>

                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php print($datos['Dirección']); ?>
                        </li>

                        <li>
                          <i class="fa fa-phone user-profile-icon"></i> <?php print($datos['Telefono']); ?>
                        </li>
                        

                        <li>
                            <i class="fa fa-mobile user-profile-icon"></i> <?php print($datos['Celular']); ?>
                          </li>

                        <!--<li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>-->
                      </ul>

                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Editar Perfil</a>
                      <br />

                      <!-- start skills -->
                      <!--
                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>-->
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <!--<div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>-->
                      <!-- start of user-activity-graph 
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Notas</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Conducta</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <h2>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</br></br><strong>Informacion del Alumno</strong></br></br>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</h2>
                              <p>
                                <strong>Fecha de Nacimiento:</strong> <?php print($datos['Fecha_Nacimiento']); ?> </br>
                                <strong>Nacionalidad:</strong> <?php print($datos['Nacionalidad']); ?>  </br>
                                <strong>Estado Civil:</strong> <?php print($datos['Nombre_Estado']); ?>  </br>
                                <strong>Numero de Partida de Nacimiento:</strong> <?php print($datos['Partida_Nacimiento']); ?>  </br>
                                <strong>Distancia desde el lugar de residencia hasta la institucion:</strong> <?php print($datos['Distancia']); ?> Km  </br>
                                <strong>Municipio:</strong> <?php print($datos['Nombre_Municipio']); ?>  </br>
                                <strong>Email:</strong> <?php print($datos['Email']); ?>  </br>
                                <strong>Religion:</strong> <?php print($datos['Nombre_Religion']); ?>  </br>
                                <strong>Numero de Familiares:</strong> <?php print($datos['Miembros_Familia']); ?>  </br>
                                <strong>Miembros de la Familia:</strong>  <?php print($datos['Convivencia']); ?>  </br>
                                <strong>Trabaja:</strong> <?php print($datos['Trabaj']); ?>  </br>
                                <strong>Tiene Hijos:</strong> <?php print($datos['Hijos']); ?>  </br>

                              </p>
                              </br>
                              <h2>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</br></br><strong>Informacion del Padre</strong></br></br>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</h2>
                              <p>
                                <strong>Nombre del Padre:</strong> <?php print($datos['Nombre_Padre']); ?> </br>
                                <strong>DUI Padre:</strong> <?php print($datos['Dui_Padre']); ?>  </br>
                                <strong>Telefono Padre:</strong> <?php print($datos['Telefono_Padre']); ?>  </br>
                                <strong>Trabajo Padre:</strong> <?php print($datos['Trabajo_Padre']); ?>  </br>
                                <strong>Profesion Padre:</strong> <?php print($datos['Profesion_Padre']); ?>   </br>

                              </p>
                              </br>
                              <h2>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</br></br><strong>Informacion de la Madre</strong></br></br>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</h2>
                              <p>
                                <strong>Nombre de la Madre:</strong> <?php print($datos['Nombre_Madre']); ?> </br>
                                <strong>DUI Madre:</strong> <?php print($datos['Dui_Madre']); ?>  </br>
                                <strong>Telefono Madre:</strong> <?php print($datos['Telefono_Madre']); ?>  </br>
                                <strong>Trabajo Madre:</strong> <?php print($datos['Trabajo_Madre']); ?>  </br>
                                <strong>Profesion Madre:</strong> <?php print($datos['Profesion_Madre']); ?>   </br>

                              </p>
                              </br>
                              <h2>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</br></br><strong>Informacion del Responsable</strong></br></br>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</h2>
                              <p>
                                <strong>Nombre del Responsable:</strong> <?php print($datos['Nombre_Responsable']); ?> </br>
                                <strong>DUI Responsable:</strong> <?php print($datos['Dui_Responsable']); ?>  </br>
                                <strong>Telefono Responsable:</strong> <?php print($datos['Telefono_Responsable']); ?>  </br>
                                <strong>Trabajo Responsable:</strong> <?php print($datos['Trabajo_Responsable']); ?>  </br>
                                <strong>Profesion Responsable:</strong> <?php print($datos['Profesion_Responsable']); ?>   </br>

                              </p>
                              </br>
                              <h2>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</br></br><strong>Informacion Adicional</strong></br></br>▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀▄▀</h2>
                              <p>
                                <strong>Enfermedades o Alergias:</strong> <?php print($datos['Enfermedades_Alergias']); ?> </br>
                                <strong>Medicamentos:</strong> <?php print($datos['Medicamentos']); ?>  </br>
                                <strong>Observaciones:</strong> <?php print($datos['observacion']); ?>  </br>
                                

                              </p>                            

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Project Name</th>
                                  <th>Client Company</th>
                                  <th class="hidden-phone">Hours Spent</th>
                                  <th>Contribution</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">18</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>New Partner Contracts Consultanci</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">13</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Partners and Inverstors report</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">30</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">28</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <!-- start recent activity -->
                            <ul class="messages">
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br />
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>
  
                              </ul>
                              <!-- end recent activity -->
                            
                          </div>
                        </div>
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
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>