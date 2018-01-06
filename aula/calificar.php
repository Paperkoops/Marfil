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

  $docente = $_SESSION['docente'];
  
  $aVar = mysqli_connect("localhost", "root", "", "base_colegio");
  $result = mysqli_query($aVar, "SELECT d.Id_Docente, d.Nombre_Docente, d.Tipo_Usuario FROM docente d, usuarios u WHERE d.Id_Docente = '$docente' AND u.Id_Docente=d.Id_Docente AND u.Status = 1");

  //$row = mysqli_fetch_assoc($result);
  $user = $result->fetch_assoc();
  //print_r($user); die; 


$id = null;
if (!empty($_GET['t']) && !empty($_GET['m']) ) {
  $id = $_REQUEST['t'];
  $materia = $_REQUEST['m'];
}

if (null == $id || null == $materia ) {
	header("Location: tareas.php");
}



$sql="SELECT Id_Grado From materia Where Id_Materia=?";
$values=array($materia);
$datos=Database::getRow($sql, $values);
$grado = $datos['Id_Grado'];


$inserted = false;

if (!empty($_POST)) {
	// keep track validation errors

 
	
	// keep track post values
  $calificacion = $_POST['calificacion'];
 
  $nie = $_POST['nie'];
  
  $tipo = $_POST['tipo'];


  
  $valid = true;
	
  // validate input
  /*
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


	// insert data
	if ($valid) {

    if ($tipo=="add") {
      $sql = "INSERT INTO `nota`(`Id_Tarea`, `Id_Alumno`, `Nota_Obtenida`, `Status`) VALUES (?,?,?,?)";
      $values=array($id, $nie, $calificacion, 1);
      
    } else {
      $sql = "UPDATE `nota` SET `Nota_Obtenida`=? WHERE Id_Alumno=? AND Id_Tarea=?";
      $values=array($calificacion, $nie, $id);
      
    }
    
    

    Database::executeRow($sql, $values);
    $inserted = true;
    header("Refresh:0");
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

    <title>Calificar </title>

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
                <h3>Calificar</h3>
                
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
                    <h2>Calificar <small>Todos</small></h2>
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

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>NIE</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Calificacion</th>
                          <th>Administrar</th>
                        </tr>
                      </thead>


                      <tbody>



                      <?php
$sql="SELECT * FROM alumno WHERE Status=? AND Id_Grado=?";
$values=array(1, $grado);
$datos=Database::getRows($sql, $values);
$menu="";
  

foreach ($datos as $fila) 
{
  
  $id2=$fila['NIE'];
  $sql="SELECT * From nota Where Id_Alumno=? AND Id_Tarea=?";
  $values=array($id2, $id);
  $datos2=Database::getRow($sql, $values);

  if (!empty($datos2)) {
    $menu.="<tr>
    <td>$fila[NIE]</td>
    <td>$fila[Nombre_Alumno]</td>
    <td>$fila[Apellido_Alumno]</td>
    <td>$datos2[Nota_Obtenida]</td>
    <td>
    <div style='text-align: center;'>
    <!-- Large modal -->
    <button type='button' class='btn btn-info btn-xs' data-toggle='modal' data-target='.bs-example-modal-lg-$fila[NIE]'><i class='fa fa-pencil'></i> Editar</button>

    <div class='modal fade bs-example-modal-lg-$fila[NIE]' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>

          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span>
            </button>
            <h4 class='modal-title' id='myModalLabel'>Calificar $fila[NIE]</h4>
          </div>
          <div class='modal-body'>
            <h4>Calificacion</h4>
            <form class='form-horizontal form-label-left input_mask' method='post'>

            <input type='text' name='nie' value=$fila[NIE] style='display:none;'>
            <input type='text' name='tipo' value=edit style='display:none;'>
            <div class='col-md-6 col-sm-6 col-xs-12 form-group'>
            
            
            <input type='number' name='calificacion' value=$datos2[Nota_Obtenida]  required='required' min='0' max='10' step='0.1' class='form-control has-feedback-left col-md-7 col-xs-12'>
            
          </div>

          
          <div class='form-group'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
              
              <button type='submit' class='btn btn-success'>Aceptar</button>
            </div>
          </div>

        </form>

            </div>
          <div class='modal-footer'>
            
          </div>

        </div>
      </div>
    </div>
 </div>
  </td>
    

</tr>";
  } else {
    $menu.="<tr>
    <td>$fila[NIE]</td>
    <td>$fila[Nombre_Alumno]</td>
    <td>$fila[Apellido_Alumno]</td>
    <td>NPI</td>
    <td>
    <div style='text-align: center;'>
    <!-- Large modal -->
    <button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='.bs-example-modal-lg-$fila[NIE]'><i class='fa fa-pencil'></i> Agregar</button>

    <div class='modal fade bs-example-modal-lg-$fila[NIE]' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>

          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span>
            </button>
            <h4 class='modal-title' id='myModalLabel'>Calificar $fila[NIE]</h4>
          </div>
          <div class='modal-body'>
            <h4>Calificacion</h4>
            <form class='form-horizontal form-label-left input_mask' method='post'>

            <input type='text' name='nie' value=$fila[NIE] style='display:none;'>
            <input type='text' name='tipo' value=add style='display:none;'>
            <div class='col-md-6 col-sm-6 col-xs-12 form-group'>
            
            
            <input type='number' name='calificacion'  required='required'  min='0' max='10' step='0.1' class='form-control has-feedback-left col-md-7 col-xs-12'>
            
          </div>

          
          <div class='form-group'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
              
              <button type='submit' class='btn btn-success'>Aceptar</button>
            </div>
          </div>

        </form>

            </div>
          <div class='modal-footer'>
            
          </div>

        </div>
      </div>
    </div>
 </div>
  </td>
    

</tr>";
  }
  

 
         

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
