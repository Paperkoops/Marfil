<?php
require 'database.php';

if (!empty($_POST)) {
	// keep track validation errors
	$nameError = null;
	$emailError = null;
	$mobileError = null;
	
	// keep track post values
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	
	// validate input
	$valid = true;
	if (empty($name)) {
		$nameError = 'Please enter Name';
		$valid = false;
	}
	
	if (empty($email)) {
		$emailError = 'Please enter Email Address';
		$valid = false;
	} 
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$emailError = 'Please enter a valid Email Address';
		$valid = false;
	}
	
	if (empty($mobile)) {
		$mobileError = 'Please enter Mobile Number';
		$valid = false;
	}
	
	// insert data
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO customers (name, email, mobile) values(?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name, $email, $mobile));
		Database::disconnect();
		header("Location: index.php");
	}
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

    <title>Matricular Alumnos</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><small>Colegio Nuevo Milenio</small></span></a>
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

                <li><a href="index.php"><i class="fa fa-home"></i> Inicio </a></li>

                <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="alumnos.php">Alumnos</a></li>
                    <li><a href="index2.php">Docentes</a></li>

                  </ul>
                </li>
                
                <li><a><i class="fa fa-graduation-cap"></i> Notas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="calificaciones.php">Calificaciones</a></li>
                    <li><a href="tareas.php">Tareas</a></li>
                  </ul>
                </li>

                <li><a><i class="fa fa-gavel"></i> Conducta <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="faltas.php">Faltas</a></li>
                    <li><a href="tipos_faltas.php">Tipos de Faltas</a></li>
                    <li><a href="faltas_aplicadas.php">Faltas Aplicadas</a></li>
                    <li><a href="observaciones.php">Observaciones</a></li>
                  </ul>
                </li>

                <li><a href="grados.php"><i class="fa fa-book"></i> Grados </a></li>

                <li><a href="materias.php"><i class="fa fa-pencil"></i> Materias </a></li>

                <li><a><i class="fa fa-clock-o"></i> Horarios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="horas_clase.php">Horas Clase</a></li>
                    <li><a href="itinerario.php">Itinerario</a></li>
                  </ul>
                </li>

                <li><a href="pagos.php"><i class="fa fa-money"></i> Pagos </a></li>
                
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
                    <li><a href="e_commerce.php">E-commerce</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="project_detail.php">Project Detail</a></li>
                    <li><a href="contacts.php">Contacts</a></li>
                    <li><a href="profile.php">Profile</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="page_403.php">403 Error</a></li>
                    <li><a href="page_404.php">404 Error</a></li>
                    <li><a href="page_500.php">500 Error</a></li>
                    <li><a href="plain_page.php">Plain Page</a></li>
                    <li><a href="login.php">Login Page</a></li>
                    <li><a href="pricing_tables.php">Pricing Tables</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="#level1_1">Level One</a>
                      <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li class="sub_menu"><a href="level2.php">Level Two</a>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
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
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                <h3>Matricular Alumno</h3>
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
                    <h2>Nuevo Alumno <small>Rellene la información porfavor</small></h2>
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
                    <br />
                    <form class="form-horizontal form-label-left input_mask" novalidate>
                        
                      <div class="col-md-6 col-sm-6 col-xs-12 item form-group has-feedback">
                        <label>Nombre del Alumno*</label>
                        <input type="text" class="form-control has-feedback-left" id="nombre" placeholder="Nombre del Alumno" required="required" name="nombre">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Apellido del Alumno *</label>
                        <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Apellido del Alumno">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                        
                        <div class="form-group">
                          <label>Fecha de Nacimiento *</label>
                            <div class='input-group date' id='myDatepicker'>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                              <input type='text' class="form-control" id="FechaNacimientoAlumno" readonly="readonly"/>
                                
                            </div>
                        </div>
                    </div>
                          
                    
                   
                    <div class="col-md-6 col-sm-6 col-xs-12 item form-group">
                        <label>Genero *</label>
                        <div>
                          <select class="form-control" id="genero" required="required">
                            <option>Masculino</option>
                            <option>Femenino</option>
                            
                          </select>
                          
                        </div>
                      </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Nacionalidad del Alumno *</label>
                          <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Nacionalidad del Alumno">
                          <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-6 col-sm-6 col-xs-12">Estado Civil *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control has-feedback-left" id="EstadoCivilAlumno">
                                <option>Soltero</option>
                                <option>Casado</option>
                                
                              </select>
                              <span class="fa fa-smile-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>

                          
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label>Codigo de Partida de Nacimiento del Alumno*</label>
                              <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Codigo de Partida de Nacimiento del Alumno">
                              <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Medio de Transporte*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control has-feedback-left" id="EstadoCivilAlumno">
                                    <option>Transporte Publico</option>
                                    <option>Automovil</option>
                                    
                                  </select>
                                  <span class="fa fa-car form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label>Email del Alumno*</label>
                              <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Email del Alumno">
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Municipio*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control has-feedback-left" id="EstadoCivilAlumno">
                                    <option>San Salvador</option>
                                    <option>Soyapango</option>
                                    
                                  </select>
                                  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Dirección del Alumno*</label>
                                  <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Direccion del Alumno">
                                  <span class="fa fa-mail-forward form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            <div class="item form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Distancia desde el lugar de Residencia hasta la Institución (Km) 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="DistanciaAlumno" name="distancia" required="required" data-validate-minmax="10,100" class="form-control has-feedback-left col-md-7 col-xs-12">
                                  <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>
                              
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Numero de Familiares del Alumno*</label>
                                  <input type="number" id="numerofamiliares" name="number" required="required" data-validate-minmax="10,100" class="form-control has-feedback-left col-md-7 col-xs-12">
                                  <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                
                              <div class="form-group">
                                  <label class="col-md-6 col-sm-6 col-xs-12">Religión*</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control has-feedback-left" id="EstadoCivilAlumno">
                                      <option>Catolico</option>
                                      <option>Evangelico</option>
                                      
                                    </select>
                                    <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                </div>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Teléfono*</label>
                                  <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Teléfono">
                                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Celular*</label>
                                    <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Celular">
                                    <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  
                            <div class="item form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12">Miembros de la Familia<span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="NacAlumno" placeholder="Miembros de la Familia">
                                    <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>
                              
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                 <label>Trabaja*</label> 
                                  <div>
                                    <select class="form-control" id="EstadoCivilAlumno">
                                      <option>Si</option>
                                      <option>No</option>
                                      
                                    </select>
                                    
                                  </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Tienen Hijos*</label> 
                                    <div>
                                      <select class="form-control" id="EstadoCivilAlumno">
                                        <option>Si</option>
                                        <option>No</option>
                                        
                                      </select>
                                      
                                    </div>
                                  </div>

                                  <div class="clearfix"></div>
                                  <h2>Información del Padre <small>Rellene la información porfavor</small></h2>
                                  <div class="clearfix"></div>

                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label>Nombre Completo del Padre *</label>
                                      <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Nombre del Padre">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
              
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label>DUI del Padre *</label>
                                      <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Apellido del Padre">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label>Telefono del Padre *</label>
                                        <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Telefono del Padre">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label>Trabajo del Padre *</label>
                                        <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Trabajo del Padre ">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label>Profesion del Padre *</label>
                                          <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Profesion del Padre">
                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="clearfix"></div>
                                        <h2>Información de la Madre <small>Rellene la información porfavor</small></h2>
                                        <div class="clearfix"></div>
      
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label>Nombre Completo de la Madre *</label>
                                            <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Nombre de la Madre">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                    
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label>DUI de la Madre *</label>
                                            <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="DUI de la Madre">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                          </div>
      
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label>Telefono de la Madre *</label>
                                              <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Telefono de la Madre">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                      
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label>Trabajo de la Madre *</label>
                                              <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Trabajo de la Madre">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
      
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label>Profesion de la Madre *</label>
                                                <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Profesion de la Madre">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                              </div>
                  
                                              <div class="clearfix"></div>
                                              <h2>Información del Responsable <small>Rellene la información porfavor</small></h2>
                                              <div class="clearfix"></div>
            
                                              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                  <label>Nombre Completo del Responsable *</label>
                                                  <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Nombre del Responsable">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                          
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label>DUI del Responsable *</label>
                                                  <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="DUI del Responsable">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                </div>
            
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Telefono del Responsable *</label>
                                                    <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Telefono del Responsable">
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                            
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Trabajo del Responsable *</label>
                                                    <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Trabajo del Responsable">
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
            
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label>Profesion del Responsable *</label>
                                                      <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Profesion del Responsable">
                                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <h2>Información Extra del Alumno <small>Rellene la información porfavor</small></h2>
                                                    <div class="clearfix"></div>


                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label>Enfermedades o Alergias *</label>
                                                        <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Enfermedades o Alergias">
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                      </div>
                                
                                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label>Medicamentos *</label>
                                                        <input type="text" class="form-control has-feedback-left" id="ApellidoAlumno" placeholder="Medicamentos">
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                      </div>
                
                                                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                                                          <label>Observaciones *</label>
                                                          <input type="text" class="form-control has-feedback-left" id="NombreAlumno" placeholder="Observaciones">
                                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                            <label>Grado*</label> 
                                                            <div>
                                                              <select class="form-control" id="EstadoCivilAlumno">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                
                                                              </select>
                                                              
                                                            </div>
                                                          </div>

                                                        <div class='col-md-6 col-sm-6 col-xs-12'>
                                                            
                                                            <div class="form-group">
                                                              <label>Fecha de Admision *</label>
                                                                <div class='input-group date' id='myDatepicker2'>
                                                                  <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                 </span>
                                                                  <input type='text' class="form-control" id="FechaNacimientoAlumno" readonly="readonly"/>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='col-md-6 col-sm-6 col-xs-12'>
                                                            
                                                            <div class="form-group">
                                                              <label>Foto del Alumno *</label>
                                                              <div class="input-group">
                                                                  <input type="text" class="form-control">
                                                                  <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-primary">Seleccionar</button>
                                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
  

                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <button type="button" class="btn btn-primary">Cancelar</button>
						   <button class="btn btn-primary" type="reset">Limpiar Todo</button>
                          <button type="submit" class="btn btn-success">Aceptar</button>
                        </div>
                      </div>

                    </form>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
   
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script>
      $('#myDatepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
    });
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
    });
    </script>
  </body>
</html>
