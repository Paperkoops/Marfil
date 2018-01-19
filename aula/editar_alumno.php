<?php
include("database.php");
session_start();

  if(empty($_SESSION['logged_in']))
  {
    header('Location: login.php');
    exit;
  }

  if (empty($_SESSION['email'])) {
    session_start();
    session_destroy();
    header('location: login.php');
  }

  if (isset($_POST['cerrar_sesion'])) {
    /* session_start();
    session_unset();
    session_destroy();
    header('location: login.php'); */
    require 'logout.php';
  }

  $docentes = $_SESSION['docente'];
  
  $aVar = mysqli_connect("localhost", "root", "", "base_colegio");
  $result = mysqli_query($aVar, "SELECT d.Id_Docente, d.Nombre_Docente, d.Tipo_Usuario FROM docente d, usuarios u WHERE d.Id_Docente = '$docentes' AND u.Id_Docente=d.Id_Docente AND u.Status = 1");

  //$row = mysqli_fetch_assoc($result);
  $user = $result->fetch_assoc();
  //print_r($user); die; 

$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id ) {
	header("Location: alumnos.php");
}

$inserted = false;
if (!empty($_POST)) {
	// keep track validation errors
	$nameError = null;
	$emailError = null;
	$mobileError = null;
	
  // keep track post values
  $nie = $_POST['nie'];
  $name = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $fechanacimiento = $_POST['fechanacimiento'];
	$genero = $_POST['genero'];
  $nacionalidad = $_POST['nacionalidad'];
  $estadocivil = $_POST['estadocivil'];
  $codigopartida = $_POST['codigopartida'];
  $mediotransporte = $_POST['mediotransporte'];
  $email = $_POST['email'];
  $municipio = $_POST['municipio'];
  $direccion = $_POST['direccion'];
  $distancia = $_POST['distancia'];
  $numerofamiliares = $_POST['numerofamiliares'];
  $religion = $_POST['religion'];
  $telefono = $_POST['telefono'];
  $celular = $_POST['celular'];
  $miembrosdelafamilia = $_POST['miembrosdelafamilia'];
  $trabaja = $_POST['trabaja'];
  $tienehijos = $_POST['tienehijos'];
  $nombrepadre = $_POST['nombrepadre'];
  $apellidopadre = $_POST['apellidopadre'];
  $telpadre = $_POST['telpadre'];
  $trabpadre = $_POST['trabpadre'];
  $profpadre = $_POST['profpadre'];
  $nombremadre = $_POST['nombremadre'];
  $apellidomadre = $_POST['apellidomadre'];
  $telmadre = $_POST['telmadre'];
  $trabmadre = $_POST['trabmadre'];
  $profmadre = $_POST['profmadre'];
  $nombreresp = $_POST['nombreresp'];
  $apellidoresp = $_POST['apellidoresp'];
  $telresp = $_POST['telresp'];
  $trabresp = $_POST['trabresp'];
  $profresp = $_POST['profresp'];
  $enfermedades = $_POST['enfermedades'];
  $medicamentos = $_POST['medicamentos'];
  $observaciones = $_POST['observaciones'];
  $fechaadmision = $_POST['fechaadmision'];
  $grado = $_POST['grado'];
  $foto = $_POST['foto'];


  $valid = true;
	/*
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
  */

  $nombre=$genero;
  $sql="SELECT * FROM genero WHERE Nombre_Genero=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $genero = $datos['Id_Genero'];

  $nombre=$estadocivil;
  $sql="SELECT * FROM estado_civil WHERE Nombre_Estado=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $estadocivil = $datos['Id_Estado'];

  $nombre=$mediotransporte;
  $sql="SELECT * FROM medio_transporte WHERE Nombre_Medio=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $mediotransporte = $datos['Id_Medio'];

  $nombre=$municipio;
  $sql="SELECT * FROM municipio WHERE Nombre_Municipio=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $municipio = $datos['Id_Municipio'];
  
  $nombre=$religion;
  $sql="SELECT * FROM religion WHERE Nombre_Religion=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $religion = $datos['Id_Religion'];

  $nombre=$grado;
  $sql="SELECT * FROM grado WHERE Nombre_Grado=?";
  $values=array($nombre);
  $datos=Database::getRow($sql, $values);
  $grado = $datos['Id_Grado'];

  if ($tienehijos=="Si") {
    $tienehijos=1;
  } else {
    $tienehijos=0;
  }

  if ($trabaja=="Si") {
    $trabaja=1;
  } else {
    $trabaja=0;
  }
  
  
	// insert data
	if ($valid) {
    /*
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO `alumno` (`NIE`, `Nombre_Alumno`, `Apellido_Alumno`, `Fecha_Nacimiento`, `Id_Genero`, `Nacionalidad`, `Id_Estado`, `Partida_Nacimiento`, `Distancia`, `Id_Medio`, `Dirección`, `Id_Municipio`, `Telefono`, `Celular`, `Email`, `Id_Religion`, `Miembros_Familia`, `Trabaja`, `Tiene_Hijos`, `Convivencia`, `Nombre_Padre`, `Dui_Padre`, `Telefono_Padre`, `Trabajo_Padre`, `Profesion_Padre`, `Nombre_Madre`, `Dui_Madre`, `Telefono_Madre`, `Trabajo_Madre`, `Profesion_Madre`, `Nombre_Responsable`, `Dui_Responsable`, `Telefono_Responsable`, `Trabajo_Responsable`, `Profesion_Responsable`, `Enfermedades_Alergias`, `Medicamentos`, `Fecha_Admision`, `Id_Grado`, `observacion`, `Foto`, `Status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($nie, $nombre, $apellido, $fechanacimiento, $genero, $nacionalidad, $estadocivil, $codigopartida, $distancia, $mediotransporte, $direccion, $municipio, $telefono, $celular, $email, $religion, $numerofamiliares, $trabaja, $tienehijos, $miembrosdelafamilia, $nombrepadre, $apellidopadre, $telpadre, $trabpadre, $profpadre, $nombremadre, $apellidomadre, $telmadre, $trabmadre, $profmadre, $nombreresp, $apellidoresp, $telresp, $trabresp, $profresp, $enfermedades, $medicamentos, $fechaadmision, $grado, $observaciones, $foto, 1));
		Database::disconnect();
    header("Location: index.php");*/
    
    $sql = "UPDATE `alumno` SET `NIE`=?,`Nombre_Alumno`=?,`Apellido_Alumno`=?,`Fecha_Nacimiento`=?,`Id_Genero`=?,`Nacionalidad`=?,`Id_Estado`=?,`Partida_Nacimiento`=?,`Distancia`=?,`Id_Medio`=?,`Dirección`=?,`Id_Municipio`=?,`Telefono`=?,`Celular`=?,`Email`=?,`Id_Religion`=?,`Miembros_Familia`=?,`Trabaja`=?,`Tiene_Hijos`=?,`Convivencia`=?,`Nombre_Padre`=?,`Dui_Padre`=?,`Telefono_Padre`=?,`Trabajo_Padre`=?,`Profesion_Padre`=?,`Nombre_Madre`=?,`Dui_Madre`=?,`Telefono_Madre`=?,`Trabajo_Madre`=?,`Profesion_Madre`=?,`Nombre_Responsable`=?,`Dui_Responsable`=?,`Telefono_Responsable`=?,`Trabajo_Responsable`=?,`Profesion_Responsable`=?,`Enfermedades_Alergias`=?,`Medicamentos`=?,`Fecha_Admision`=?,`Id_Grado`=?,`observacion`=?,`Foto`=?,`Status`=? WHERE NIE=?";
    $values=array($nie, $name, $apellido, $fechanacimiento, $genero, $nacionalidad, $estadocivil, $codigopartida, $distancia, $mediotransporte, $direccion, $municipio, $telefono, $celular, $email, $religion, $numerofamiliares, $trabaja, $tienehijos, $miembrosdelafamilia, $nombrepadre, $apellidopadre, $telpadre, $trabpadre, $profpadre, $nombremadre, $apellidomadre, $telmadre, $trabmadre, $profmadre, $nombreresp, $apellidoresp, $telresp, $trabresp, $profresp, $enfermedades, $medicamentos, $fechaadmision, $grado, $observaciones, $foto, 1, $id);
    

    Database::executeRow($sql, $values);

    

    

    $inserted = true;

	}
}
else {
	$sql="SELECT a.NIE, a.Nombre_Alumno, a.Apellido_Alumno, a.Fecha_Nacimiento, a.Id_Genero, a.Nacionalidad, a.Id_Estado, a.Partida_Nacimiento, a.Distancia, a.Id_Medio, a.Dirección, a.Id_Municipio, a.Telefono, a.Celular, a.Email, a.Id_Religion, a.Miembros_Familia, a.Trabaja, a.Tiene_Hijos, a.Convivencia, a.Nombre_Padre, a.Dui_Padre, a.Telefono_Padre, a.Trabajo_Padre, a.Profesion_Padre, a.Nombre_Madre, a.Dui_Madre, a.Telefono_Madre, a.Trabajo_Madre, a.Profesion_Madre, a.Nombre_Responsable, a.Dui_Responsable, a.Telefono_Responsable, a.Trabajo_Responsable, a.Profesion_Responsable, a.Enfermedades_Alergias, a.Medicamentos, a.Fecha_Admision, a.Id_Grado, a.observacion, a.Foto, a.Status, g.Nombre_Grado, ec.Nombre_Estado, gene.Nombre_Genero, mt.Nombre_Medio, mt.Nombre_Medio, m.Nombre_Municipio, r.Nombre_Religion, case a.Trabaja when 1 then 'Si' else 'No' end as Trabaj, case a.Tiene_Hijos when 1 then 'Si' else 'No' end as Hijos FROM alumno a, grado g, estado_civil ec, genero gene, medio_transporte mt, municipio m, religion r WHERE a.Id_Genero=gene.Id_Genero AND a.Id_Estado=ec.Id_Estado AND a.Id_Medio=mt.Id_Medio AND a.Id_Municipio=m.Id_Municipio AND a.Id_Religion=r.Id_Religion AND a.Id_Grado=g.Id_Grado AND a.NIE=?";
  $values=array($id);
  $datos=Database::getRow($sql, $values);
   
  $nie = $datos['NIE'];
  $name = $datos['Nombre_Alumno'];
  $apellido = $datos['Apellido_Alumno'];
  $fechanacimiento = $datos['Fecha_Nacimiento'];
	$genero = $datos['Nombre_Genero'];
  $nacionalidad = $datos['Nacionalidad'];
  $estadocivil = $datos['Nombre_Estado'];
  $codigopartida = $datos['Partida_Nacimiento'];
  $mediotransporte = $datos['Nombre_Medio'];
  $email = $datos['Email'];
  $municipio = $datos['Nombre_Municipio'];
  $direccion = $datos['Dirección'];
  $distancia = $datos['Distancia'];
  $numerofamiliares = $datos['Miembros_Familia'];
  $religion = $datos['Nombre_Religion'];
  $telefono = $datos['Telefono'];
  $celular = $datos['Celular'];
  $miembrosdelafamilia = $datos['Convivencia'];
  $trabaja = $datos['Trabaj'];
  $tienehijos = $datos['Hijos'];
  $nombrepadre = $datos['Nombre_Padre'];
  $apellidopadre = $datos['Dui_Padre'];
  $telpadre = $datos['Telefono_Padre'];
  $trabpadre = $datos['Trabajo_Padre'];
  $profpadre = $datos['Profesion_Padre'];
  $nombremadre = $datos['Nombre_Madre'];
  $apellidomadre = $datos['Dui_Madre'];
  $telmadre = $datos['Telefono_Madre'];
  $trabmadre = $datos['Trabajo_Madre'];
  $profmadre = $datos['Profesion_Madre'];
  $nombreresp = $datos['Nombre_Responsable'];
  $apellidoresp = $datos['Dui_Responsable'];
  $telresp = $datos['Telefono_Responsable'];
  $trabresp = $datos['Trabajo_Responsable'];
  $profresp = $datos['Profesion_Responsable'];
  $enfermedades = $datos['Enfermedades_Alergias'];
  $medicamentos = $datos['Medicamentos'];
  $observaciones = $datos['observacion'];
  $fechaadmision = $datos['Fecha_Admision'];
  $grado = $datos['Nombre_Grado'];
  $foto = $datos['Foto'];

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
              <a href="index.php" class="site_title"><span><small>Colegio Nuevo Milenio</small></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
          <div class="profile clearfix">
          <?php
          $doc_nombre = $user['Nombre_Docente'];
          ?>

          <div class="profile_info">
            <h3>Bienvenido/a,</h3>
            <h2><?php echo $doc_nombre ?> </h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <?php
        if ($user['Tipo_Usuario'] == 1 ) {

        //print de admin
        echo  
        '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">

              <li><a href="index.php"><i class="fa fa-home"></i> Inicio </a></li>

              <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="agregar_usuario.php">Usuarios</a></li>                
                  <li><a href="alumnos.php">Alumnos</a></li>
                  <li><a href="docente.php">Docentes</a></li>

                </ul>
              </li>
              
              <li><a><i class="fa fa-graduation-cap"></i> Notas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="calificar.php">Calificaciones</a></li>
                  <li><a href="tareas.php">Tareas</a></li>
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

              <li><a href="grados.php"><i class="fa fa-book"></i> Grados </a></li>

              <li><a href="materias.php"><i class="fa fa-pencil"></i> Materias </a></li>

              <li><a><i class="fa fa-gear"></i> Mantenimiento <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a>Departamento<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="mantenimiento2.php">Departamento</a>
                      </li>
                      <li><a href="mantenimiento2.php">Municipio</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="mantenimiento.php">Estado Civìl</a></li>
                  <li><a href="mantenimiento.php">Género</a></li>
                  <li><a href="mantenimiento.php">Medios de Transporte</a></li>
                  <li><a href="mantenimiento.php">Periodos</a></li>
                  <li><a href="mantenimiento.php">Religión</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-clock-o"></i> Horarios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="horas_clase.html">Horas Clase</a></li>
                  <li><a href="itinerario.html">Itinerario</a></li>
                </ul>
              </li>

              <li><a href="pagos.php"><i class="fa fa-money"></i>Pagos</a> </li>
              
              <li><a><i class="fa fa-line-chart"></i> Reportes</a></li>
            </ul>
          </div>

        </div>';

        } else {
        //print de normal
        echo  
        '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">

              <li><a href="index.php"><i class="fa fa-home"></i> Inicio </a></li>
              
              <li><a><i class="fa fa-graduation-cap"></i> Notas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="calificar.php">Calificaciones</a></li>
                  <li><a href="tareas.php">Tareas</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-gavel"></i> Conducta <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="faltas.html">Faltas</a></li>
                  <li><a href="faltas_aplicadas.html">Faltas Aplicadas</a></li>
                  <li><a href="observaciones.html">Observaciones</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-clock-o"></i> Horarios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="horas_clase.html">Horas Clase</a></li>
                  <li><a href="itinerario.html">Itinerario</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>';
        }
        ?>
        
        <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" method="post">
              <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
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
                    <?php echo $doc_nombre ?>
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
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                    <form class="form-horizontal form-label-left input_mask" method="post">
                        
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre del Alumno *</label>
                        <input type="text" value="<?php print($name); ?>" class="form-control has-feedback-left" name="nombre" placeholder="Nombre del Alumno" required="required">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Apellido del Alumno *</label>
                        <input type="text" value="<?php print($apellido); ?>"  class="form-control has-feedback-left" name="apellido" placeholder="Apellido del Alumno" required="required">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      
                      <div class='col-md-6 col-sm-6 col-xs-12'>
                        
                        <div class="form-group">
                          <label>Fecha de Nacimiento *</label>
                            <div class='input-group date' id='myDatepicker'>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                              <input required="required" value="<?php print($fechanacimiento);?>"  type='text' class="form-control" name="fechanacimiento" />
                                
                            </div>
                        </div>
                    </div>
                          
                   
                    <div class="form-group">
                        <label class="col-md-6 col-sm-6 col-xs-12">Genero *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control has-feedback-left" name="genero" required="required">
                          <?php
                              $sql="SELECT * FROM genero WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Genero'];
                                
                                if ($maestro == $genero) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Genero]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Genero]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                            
                          </select>
                          <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                    
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Nacionalidad del Alumno *</label>
                          <input type="text" value="<?php print($nacionalidad); ?>" class="form-control has-feedback-left" name="nacionalidad" placeholder="Nacionalidad del Alumno" required="required">
                          <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-6 col-sm-6 col-xs-12">Estado Civil *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control has-feedback-left" name="estadocivil" required="required">
                              <?php
                              $sql="SELECT * FROM estado_civil WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Estado'];
                                
                                if ($maestro == $estadocivil) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Estado]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Estado]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                                
                              </select>
                              <span class="fa fa-smile-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>

                          
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label>Codigo de Partida de Nacimiento del Alumno*</label>
                              <input type="text" value="<?php print($codigopartida); ?>"  class="form-control has-feedback-left" name="codigopartida" placeholder="Codigo de Partida de Nacimiento del Alumno" required="required">
                              <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Medio de Transporte*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control has-feedback-left" name="mediotransporte" required="required">
                                  <?php
                              $sql="SELECT * FROM medio_transporte WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Medio'];
                                
                                if ($maestro == $mediotransporte) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Medio]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Medio]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                                    
                                  </select>
                                  <span class="fa fa-car form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label>Email del Alumno*</label>
                              <input type="text" value="<?php print($email); ?>" class="form-control has-feedback-left" name="email" placeholder="Email del Alumno" required="required">
                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Municipio*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control has-feedback-left" name="municipio" required="required">
                                  <?php
                              $sql="SELECT * FROM municipio WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Municipio'];
                                
                                if ($maestro == $municipio) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Municipio]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Municipio]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                                    
                                  </select>
                                  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>

                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Dirección del Alumno*</label>
                                  <input type="text" value="<?php print($direccion); ?>" class="form-control has-feedback-left" name="direccion" placeholder="Direccion del Alumno" required="required">
                                  <span class="fa fa-mail-forward form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            <div class="item form-group">
                                <label class="col-md-6 col-sm-6 col-xs-12">Distancia desde el lugar de Residencia hasta la Institución (Km) <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" value="<?php print($distancia); ?>" name="distancia" name="number" required="required" data-validate-minmax="10,100" class="form-control has-feedback-left col-md-7 col-xs-12">
                                  <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>
                              
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Numero de Familiares del Alumno*</label>
                                  <input type="number" value="<?php print($numerofamiliares); ?>" name="numerofamiliares" name="number" required="required" data-validate-minmax="10,100" class="form-control has-feedback-left col-md-7 col-xs-12">
                                  <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                
                              <div class="form-group">
                                  <label class="col-md-6 col-sm-6 col-xs-12">Religión*</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control has-feedback-left" name="religion" required="required">
                                    <?php
                              $sql="SELECT * FROM religion WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Religion'];
                                
                                if ($maestro == $religion) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Religion]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Religion]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                                      
                                    </select>
                                    <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                </div>
                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <label>Teléfono*</label>
                                  <input type="text" value="<?php print($telefono); ?>" class="form-control has-feedback-left" name="telefono" placeholder="Teléfono" required="required">
                                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Celular*</label>
                                    <input type="text" value="<?php print($celular); ?>" class="form-control has-feedback-left" name="celular" placeholder="Celular" required="required">
                                    <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  
                            <div class="item form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12">Miembros de la Familia<span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" value="<?php print($miembrosdelafamilia); ?>" class="form-control has-feedback-left" name="miembrosdelafamilia" placeholder="Miembros de la Familia" required="required">
                                    <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>
                              
                              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                 <label>Trabaja*</label> 
                                  <div>
                                    <select class="form-control" name="trabaja" required="required">
                                    <?php
                              
                                
                                $maestro = $trabaja;
                                
                                if ($maestro == "Si") {
                                  $menu.="
                                  <option selected>Si</option>
                                  <option>No</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>Si</option>
                                  <option selected>No</option>
                              ";
                                }
                                
                                
                                
                              
                              print($menu);
                            ?>
                                      
                                    </select>
                                    
                                  </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Tienen Hijos*</label> 
                                    <div>
                                      <select class="form-control" name="tienehijos" required="required">
                                      <?php
                                      
                                        
                                        $maestro = $tienehijos;
                                        
                                        if ($maestro == "Si") {
                                          $menu.="
                                          <option selected>Si</option>
                                          <option>No</option>
                                      ";
                                        } else {
                                          $menu.="
                                          <option>Si</option>
                                          <option selected>No</option>
                                      ";
                                        }
                                        
                                        
                                        
                                      
                                      print($menu);
                                    ?>
                                        
                                      </select>
                                      
                                    </div>
                                  </div>

                                  <div class="clearfix"></div>
                                  <h2>Información del Padre <small>Rellene la información porfavor</small></h2>
                                  <div class="clearfix"></div>

                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label>Nombre Completo del Padre *</label>
                                      <input type="text" value="<?php print($nombrepadre); ?>" class="form-control has-feedback-left" name="nombrepadre" placeholder="Nombre del Padre" required="required">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
              
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label>DUI del Padre *</label>
                                      <input type="text" value="<?php print($apellidopadre); ?>" class="form-control has-feedback-left" name="apellidopadre" placeholder="Apellido del Padre" required="required">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label>Telefono del Padre *</label>
                                        <input type="text" value="<?php print($telpadre); ?>" class="form-control has-feedback-left" name="telpadre" placeholder="Telefono del Padre" required="required">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label>Trabajo del Padre *</label>
                                        <input type="text" value="<?php print($trabpadre); ?>" class="form-control has-feedback-left" name="trabpadre" placeholder="Trabajo del Padre " required="required">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>

                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                          <label>Profesion del Padre *</label>
                                          <input type="text" value="<?php print($profpadre); ?>" class="form-control has-feedback-left" name="profpadre" placeholder="Profesion del Padre" required="required">
                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="clearfix"></div>
                                        <h2>Información de la Madre <small>Rellene la información porfavor</small></h2>
                                        <div class="clearfix"></div>
      
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label>Nombre Completo de la Madre *</label>
                                            <input type="text" value="<?php print($nombremadre); ?>" class="form-control has-feedback-left" name="nombremadre" placeholder="Nombre de la Madre" required="required">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                    
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label>DUI de la Madre *</label>
                                            <input type="text" value="<?php print($apellidomadre); ?>" class="form-control has-feedback-left" name="apellidomadre" placeholder="DUI de la Madre" required="required">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                          </div>
      
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label>Telefono de la Madre *</label>
                                              <input type="text" value="<?php print($telmadre); ?>" class="form-control has-feedback-left" name="telmadre" placeholder="Telefono de la Madre" required="required">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                      
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label>Trabajo de la Madre *</label>
                                              <input type="text" value="<?php print($trabmadre); ?>" class="form-control has-feedback-left" name="trabmadre" placeholder="Trabajo de la Madre" required="required">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
      
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label>Profesion de la Madre *</label>
                                                <input type="text" value="<?php print($profmadre); ?>" class="form-control has-feedback-left" name="profmadre" placeholder="Profesion de la Madre" required="required">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                              </div>
                  
                                              <div class="clearfix"></div>
                                              <h2>Información del Responsable <small>Rellene la información porfavor</small></h2>
                                              <div class="clearfix"></div>
            
                                              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                  <label>Nombre Completo del Responsable *</label>
                                                  <input type="text" value="<?php print($nombreresp); ?>" class="form-control has-feedback-left" name="nombreresp" placeholder="Nombre del Responsable" required="required">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                          
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                  <label>DUI del Responsable *</label>
                                                  <input type="text" value="<?php print($apellidoresp); ?>" class="form-control has-feedback-left" name="apellidoresp" placeholder="DUI del Responsable" required="required">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                </div>
            
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Telefono del Responsable *</label>
                                                    <input type="text" value="<?php print($telresp); ?>" class="form-control has-feedback-left" name="telresp" placeholder="Telefono del Responsable" required="required">
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
                            
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Trabajo del Responsable *</label>
                                                    <input type="text" value="<?php print($trabresp); ?>" class="form-control has-feedback-left" name="trabresp" placeholder="Trabajo del Responsable" required="required">
                                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                  </div>
            
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label>Profesion del Responsable *</label>
                                                      <input type="text" value="<?php print($profresp); ?>" class="form-control has-feedback-left" name="profresp" placeholder="Profesion del Responsable" required="required">
                                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <h2>Información Extra del Alumno <small>Rellene la información porfavor</small></h2>
                                                    <div class="clearfix"></div>


                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label>Enfermedades o Alergias *</label>
                                                        <input type="text" value="<?php print($enfermedades); ?>" class="form-control has-feedback-left" name="enfermedades" placeholder="Enfermedades o Alergias" required="required">
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                      </div>
                                
                                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label>Medicamentos *</label>
                                                        <input type="text" value="<?php print($medicamentos); ?>" class="form-control has-feedback-left" name="medicamentos" placeholder="Medicamentos" required="required">
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                      </div>
                
                                                      <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                                                          <label>NIE*</label>
                                                          <input type="text" value="<?php print($nie); ?>" class="form-control has-feedback-left" name="nie" placeholder="NIE" required="required">
                                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                            <label>Grado*</label> 
                                                            <div>
                                                              <select class="form-control" name="grado" required="required">
                                                              <?php
                              $sql="SELECT * FROM grado WHERE Status=?";
                              $values=array(1);
                              $datos=Database::getRows($sql, $values);

                              

                              $menu="";
                                
                              foreach ($datos as $fila) 
                              {
                                
                                $maestro = $fila['Nombre_Grado'];
                                
                                if ($maestro == $grado) {
                                  $menu.="
                                  <option selected>$fila[Nombre_Grado]</option>
                              ";
                                } else {
                                  $menu.="
                                  <option>$fila[Nombre_Grado]</option>
                              ";
                                }
                                
                                
                                
                              }
                              print($menu);
                            ?>
                                                                
                                                              </select>
                                                              
                                                            </div>
                                                          </div>

                                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                          <label>Observaciones *</label>
                                                          <input type="text" value="<?php print($observaciones); ?>" class="form-control has-feedback-left" name="observaciones" placeholder="Observaciones" required="required">
                                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class='col-md-6 col-sm-6 col-xs-12'>
                                                            
                                                            <div class="form-group">
                                                              <label>Fecha de Admision *</label>
                                                                <div class='input-group date' id='myDatepicker2'>
                                                                  <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                 </span>
                                                                  <input type='text' value="<?php print($fechaadmision); ?>" class="form-control" name="fechaadmision" required="required"/>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='col-md-6 col-sm-6 col-xs-12'>
                                                            
                                                            <div class="form-group">
                                                              <label>Foto del Alumno *</label>
                                                              <div class="input-group">
                                                                  <input type="text" value="<?php print($foto); ?>" class="form-control" required="required" name="foto">
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

    <script src="../vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<?php
if ($inserted) {
  print("
  <script>
  swal({
    title: 'Matricula',
    text: 'La informacion del alumno fue modificada exitosamente',
    type: 'success',
    
    confirmButtonColor: '#3085d6',
    
    confirmButtonText: 'Ok'
  }).then(function () {
    window.location='alumnos.php'
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
    }).attr('readonly','readonly');
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
    }).attr('readonly','readonly');
    </script>
  </body>
</html>
