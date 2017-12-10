<?php
require 'database.php';
$inserted = false;
if (!empty($_POST)) {
	// keep track validation errors
	$nameError = null;
	$correoError = null;
	$mobileError = null;
	
  // keep track post values
  $correo = $_POST['correo'];
  $pass = $_POST['pass'];
	$orientador = $_POST['orientador'];
  
  $valid = true;

  // validate input
	$valid = true;
	
	if (empty($correo)) {
    //$correoError = 'Please enter Email Address';
    echo "<script>alert('Por favor completa el campo de correo');</script>";
		$valid = false;
	} 
	else if (!filter_var($correo, FILTER_VALIDATE_EMAIL) ) {
	//	$correoError = 'Please enter a valid Email Address';
    echo "<script>alert('Por favor ingresa una dirección de correo válida');</script>";
    $valid = false;
	}
	


  $data = $orientador;    
  $whatIWant = substr($data, strpos($data, ",") + 1);    
 

  $arr = explode(",", $orientador, 2);
  $first = $arr[0];
  
  $nombre=$whatIWant;
  $apell = $first;
  $sql="SELECT * FROM docente WHERE Nombre_Docente=? AND Apellido_Docente=?";
  $values=array($nombre, $apell);
  $datos=Database::getRow($sql, $values);
  $orientador = $datos['Id_Docente'];

/*
    $email = test_input($$_POST['email']);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    } */

	// insert data
	if ($valid) {
    
    $sql = "INSERT INTO `usuarios` (`Correo`, `Pass`, `Id_Docente`, `Status`) VALUES (?, ?, ?, ?)";
    $values=array($correo, $pass, $orientador, 1);
    Database::executeRow($sql, $values); 

    $sql = "UPDATE docente SET cuenta='1' WHERE Id_Docente=?";
    $values=array($orientador);
    Database::executeRow($sql, $values); 

    $inserted = true;

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

  <title>Agregar Usuarios</title>

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
            <a href="index.html" class="site_title">
              <span>
                <small>Colegio Nuevo Milenio</small>
              </span>
            </a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
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
                      <a href="alumnos.php">Alumnos</a>
                    </li>
                    <li>
                      <a href="docente.php">Docentes</a>
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
                      <a href="tareas.php">Tareas</a>
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
                  <a href="grados.php">
                    <i class="fa fa-book"></i> Grados </a>
                </li>

                <li>
                  <a href="materias.php">
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
                          <a href="mantenimiento2.php">Departamento</a>
                        </li>
                        <li>
                          <a href="mantenimiento2.php">Municipio</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="mantenimiento.php">Estado Civìl</a>
                    </li>
                    <li>
                      <a href="mantenimiento.php">Género</a>
                    </li>
                    <li>
                      <a href="mantenimiento.php">Medios de Transporte</a>
                    </li>
                    <li>
                      <a href="mantenimiento.php">Periodos</a>
                    </li>
                    <li>
                      <a href="mantenimiento.php">Religión</a>
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
                  <a href="pagos.php">
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
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Agregar Usuarios</h3>
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
                  <h2>Nuevo Usuario
                    <small>Rellene la información por favor</small>
                  </h2>
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
                  <br />
                  <form class="form-horizontal form-label-left input_mask" method="post">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Correo del usuario *</label>
                      <input type="text" class="form-control has-feedback-left" name="correo" placeholder="Correo del usuario" required="required">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="form-group">
                    <label class="col-md-6 col-sm-6 col-xs-12">Docente *</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control has-feedback-left" name="orientador">
                      <?php
                      $sql="SELECT * FROM docente WHERE cuenta=? AND Status=?";
                      $values=array(0, 1);
                      $datos=Database::getRows($sql, $values);
                      $menu="";
                        
                      foreach ($datos as $fila) 
                      {
                        $menu.="
                                    <option>$fila[Apellido_Docente],$fila[Nombre_Docente]</option>
                                ";
                      }
                      print($menu);
                    ?>
                        

                      </select>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Contraseña *</label>
                      <input type="text" class="form-control has-feedback-left" name="pass" placeholder="Contraseña" required="required">
                      <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    </div>
                          
                     
                     <br></br>
                     <br></br>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="docente.php">
                        <button type="button" class="btn btn-primary">Cancelar</button>
                        </a>
                        <button class="btn btn-primary" type="reset">Limpiar Todo</button>
                        <button type="submit" class="btn btn-success">Aceptar</button> 
                        </div>
                      </div>

                  </form>
                </div>
              </div>




            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Usuarios </h2>
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
                        <th>Correo</th>
                        <th>Id</th>
                        <th>Nombre del Docente</th>
                        <th>Apellido del Docente</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php
                    $sql="SELECT u.Id_Usuario, u.Correo, d.Nombre_Docente, d.Apellido_Docente, d.Id_Docente FROM usuarios u, docente d WHERE u.Id_Docente = d.Id_Docente AND u.Status=?";
                    $values=array(1);
                    $datos=Database::getRows($sql, $values);
                    $menu="";
                      
                    foreach ($datos as $fila) 
                    {
                      $menu.="<tr>
                                  <td>$fila[Id_Usuario]</td>
                                  <td>$fila[Correo]</td>
                                  <td>$fila[Id_Docente]</td>
                                  <td>$fila[Nombre_Docente]</td>
                                  <td>$fila[Apellido_Docente]</td>
                                  <td>
                                  <div style='text-align: center;'>
                                  
                                  <a href='eliminar_usuario.php?id=$fila[Id_Usuario]&id2=$fila[Id_Docente]' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Eliminar </a>
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


  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>

  <?php
if ($inserted) {
  print("
  <script>
  swal({
    title: 'Docentes',
    text: 'El docente fue registrado exitosamente',
    type: 'success',
    
    confirmButtonColor: '#3085d6',
    
    confirmButtonText: 'Ok'
  }).then(function () {
    window.location='docente.php'
  });
  
  
   </script>");
} else {
  
}

?>


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