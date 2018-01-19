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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alumnos </title>

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
                    <img src="images/img.jpg" alt=""><?php echo $doc_nombre ?>
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
                          <th>Nombre de la materia</th>
                          <th>Eval</th>
                          <th>Nie</th>
                          <th>Nombre del alumno</th>
                          <th>Nota 1</th>
                          <th>Nota 2</th>
                          <th>Nota 3</th>
                          <th>Nota 4</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
 $sql="SELECT m.*, a.*  FROM materia m, alumno a WHERE a.Status=? AND m.Status=?";
 $values=array(1, 1);
 $datos=Database::getRows($sql, $values);
 $menu="";

 $totaldeltotal=0;
 $totalPuntos3=0;
 foreach ($datos as $fila) 
 {
     $menu.="<tr>
    <td>$fila[Nombre_Materia]</td>
    <td>$fila[Eval_Mined]</td>
    <td>$fila[NIE]</td>
    <td>$fila[Apellido_Alumno], $fila[Nombre_Alumno]</td>";
 }

$sql="SELECT * FROM alumno WHERE Status=? ORDER BY Apellido_Alumno";
$values=array(1);
$datos=Database::getRows($sql, $values);

$numeroAlumno = 1;
  

foreach ($datos as $filaalumno) 
{
////////////Se verifica si es educacion basica o bachillerato 1=basica 2=bachillerato
   /* if ($datosgradoo['Tipo']==1) {
        $table=new easyTable($pdf, 21, 'width:700; border-color:#000; font-size:10; border:1; paddingY:2;');
        
        $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("Colegio Nuevo Milenio, Col. Las Brisas Soyapango.", 'colspan:16; font-size:8');
         $table->easyCell("", 'img:Pics/logo1.png, w20;colspan:5; rowspan:4; font-size:9'); 
        
         $table->printRow();
        
         $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("FORMANDO LOS VALORES PARA EL NUEVO SIGLO", 'colspan:16; font-size:7');
         $table->printRow();
        
         $table->rowStyle('align:C; valign:M');
        
         $table->easyCell("No.", 'font-size:7; font-style:B');
         $table->easyCell($numeroAlumno, 'font-size:7; colspan:4;');
         $table->easyCell("Nombre:", 'font-size:7; colspan:2; font-style:B');
    
         $table->easyCell("$filaalumno[Apellido_Alumno], $filaalumno[Nombre_Alumno]" , 'font-size:7; colspan:9');
         */
        // echo $filaalumno['Apellido_Alumno'], $filaalumno['Nombre_Alumno'];
        
         
         $sql="SELECT * FROM materia WHERE Status=? ";
         $values=array(1);
         $datos=Database::getRows($sql, $values);
        
         $nummat = count($datos);
         /*$patata = 'font-size:8; align:C; valign:M; rowspan:';
         $patata.= $nummat;
         $patata.= '; font-style:B'; */
        
         $totaldeltotal=0;
         $totalPuntos3=0;
         foreach ($datos as $fila) 
         {
           
           // $table->easyCell($fila['Nombre_Materia'], 'font-size:6; align:C; valign:M; colspan:4; font-style:B');
      //  echo $fila['Nombre_Materia'];
           $nota1 = 0;
        $nota2 = 0;
        $choco = 1;
        $totalPuntos=0;
        
        
            for ($i = 1; $i <= 13; $i++)
            {
                if ($i == 3 || $i == 6 || $i == 9 || $i == 12 ) {
                    $prom = ($nota1 + $nota2)/2;
                    //$estilo = 'font-size:6; align:C; valign:M; colspan:1; font-style:B';
                    $totalPuntos = $totalPuntos+$prom;
                    $promediosinredondear = $prom;
                    $prom = round($prom);
                } else {
                   // $estilo = 'font-size:6; align:C; valign:M; colspan:1;';
                    $sql="SELECT * FROM tarea WHERE Status=? AND Mes_Tarea=? AND Id_Materia=?";
                    $values=array(1, $choco, $fila['Id_Materia']);
                    $datosene=Database::getRows($sql, $values);
                    $prom = 0;
                    foreach ($datosene as $filaene) 
                    {
                        $sql="SELECT * FROM Nota WHERE Status=? AND Id_Tarea=? AND Id_Alumno=?";
                        $values=array(1, $filaene['Id_Tarea'], $filaalumno['NIE']);
                        $datosindiv=Database::getRow($sql, $values);
        
        
                        $zoe = ($datosindiv['Nota_Obtenida'] * $filaene['ponderacion'])/100;
                        
                            $prom =  $zoe + $prom;
                        
                        
                
                    }
                    $prom = $prom;
                    $prom = round($prom, 1);
                    
            
                    if ($i == 1 || $i == 4 || $i == 7 || $i == 10) {
                        $nota1 = $prom;
                    } else if ($i == 2 || $i == 5 || $i == 6 || $i == 11) {
                        $nota2 = $prom;
                    } else if ($i == 13){
                        $totalPuntos = $totalPuntos+$prom;
                    }
                    $choco = $choco + 1;
                    
                }
                
                
                //$table->easyCell($prom, $estilo);
                
                $menu.="<td>$prom</td>";
                
            }
         //   $table->easyCell(round($totalPuntos, 1), 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
            $totaldeltotal = $totalPuntos + $totaldeltotal; 
            $totalPuntos2 = $totalPuntos/5;
        
            $totalPuntos3 = $totalPuntos2 + round($totalPuntos3);
        
          //  $table->easyCell(round($totalPuntos2), 'font-size:6; align:C; valign:M; colspan:2; font-style:B');
          $menu.="
          <td>$totaldeltotal</td>
          <td>$totalPuntos3</td>
          </tr>";
            
          //  $table->printRow();
            
         }
        
         
            
      /*   $table->easyCell(round($totaldeltotal, 1), 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell($totalPuntos3, 'font-size:6; align:C; valign:M; colspan:2; font-style:B'); */
         //$table->printRow();
    
        // $table->printRow();
         print($menu);
     
    $numeroAlumno ++;

    }


        /*              
         $sql="SELECT m.*, a.*  FROM materia m, alumno a WHERE a.Status=? AND m.Status=?";
         $values=array(1, 1);
         $datos=Database::getRows($sql, $values);
         $menu="";

         $nummat = count($datos);
         $patata= $nummat;
         echo $patata;  
         $totaldeltotal=0;
         $totalPuntos3=0;
         foreach ($datos as $fila) 
         {
             $menu.="<tr>
            <td>$fila[Nombre_Materia]</td>
            <td>$fila[Eval_Mined]</td>
            <td>$fila[NIE]</td>
            <td>$fila[Apellido_Alumno], $fila[Nombre_Alumno]</td>";
           
        $nota1 = 0;
        $nota2 = 0;
        $nota3 = 0;
        $nota4 = 0;
        $choco = 1;
        $totalPuntos=0;
        
        
            for ($i = 1; $i <= 13; $i++)
            {
                if ($i == 3 || $i == 6 || $i == 9 || $i == 12 ) {
                    $prom = ($nota1 + $nota2)/2;
                    $totalPuntos = $totalPuntos+$prom;
                    $promediosinredondear = $prom;
                    $prom = round($prom);
                } else {
                    $sql="SELECT * FROM tarea WHERE Status=? AND Mes_Tarea=? AND Id_Materia=?";
                    $values=array(1, $choco, $fila['Id_Materia']);
                    $datosene=Database::getRows($sql, $values);
                    $prom = 0;
                    foreach ($datosene as $filaene) 
                    {
                        $sql="SELECT * FROM Nota WHERE Status=? AND Id_Tarea=? AND Id_Alumno=?";
                        $values=array(1, $filaene['Id_Tarea'], $fila['NIE']);
                        $datosindiv=Database::getRow($sql, $values);
        
        
                        $zoe = ($datosindiv['Nota_Obtenida'] * $filaene['ponderacion'])/100;
                        
                            $prom =  $zoe + $prom;
                        
                    }
                    $prom = $prom;
                    $prom = round($prom, 1);
                    
            
                    if ($i == 1 || $i == 4 || $i == 7 || $i == 10) {
                        $nota1 = $prom;
                    } else if ($i == 2 || $i == 5 || $i == 6 || $i == 11) {
                        $nota2 = $prom;
                    } else if ($i == 13){
                        $totalPuntos = $totalPuntos+$prom;
                    }
                    $choco = $choco + 1;
                    
                }
                
                
                $menu.="
            <td>$nota1</td>
            <td>$nota2</td>
            <td>$nota3</td>
            <td>$nota4</td>
            </tr>";
                
                
            }
            print($menu);
          /*  $table->easyCell(round($totalPuntos, 1), 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
            $totaldeltotal = $totalPuntos + $totaldeltotal; 
            $totalPuntos2 = $totalPuntos/5;
        
            $totalPuntos3 = $totalPuntos2 + round($totalPuntos3);
        
            $table->easyCell(round($totalPuntos2), 'font-size:6; align:C; valign:M; colspan:2; font-style:B');
        
            
            $table->printRow(); 
            
         } 
                     /* $sql="SELECT m.*, a.*, n.*, t.* FROM tarea t, materia m, alumno a, nota n WHERE t.Id_Materia = m.Id_Materia AND n.Id_Alumno = a.NIE AND n.Id_Tarea = t.Id_Tarea AND m.Status=? AND a.Status=? AND n.Status=? AND t.Status = ? ORDER BY m.Nombre_Materia";
                      $values=array(1, 1, 1, 1);
                      $datos=Database::getRows($sql, $values);
                      $menu="";
                        foreach ($datos as $fila) 
                        {
  

                            $menu.="<tr>
                                <td>$fila[Nombre_Materia]</td>
                                <td>$fila[Eval_Mined]</td>
                                <td>$fila[NIE]</td>
                                <td>$fila[Apellido_Alumno], $fila[Nombre_Alumno]</td>
                                <td>$fila[Nota_Obtenida]</td>
                            </tr>";
         
                        } 


                      print($menu); */
                      
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
