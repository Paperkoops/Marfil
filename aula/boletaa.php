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
if (isset($_GET['Nie'])) {
  $id=$_GET['Nie'];
}
else
{
  header("location: calificaciones.php");
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

    <title>Notas </title>

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


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Alumnos</h3>
                
              </div>



             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Notas <small></small></h2>
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
                          <th>Fecha de Nacimiento</th>
                          <th>Genero</th>
                          <th>Grado</th>
                          <th>Administrar</th>
                        </tr>
                      </thead>


                      <tbody>
                      <tr>
              <td>$fila[NIE]</td>
              <td>$fila[Nombre_Alumno]</td>
              <td>$fila[Apellido_Alumno]</td>
              <td>$fila[Fecha_Nacimiento]</td>
              
              <td colspan="2">$fila[Nombre_Grado]</td>
              <td>
              <div style='text-align: center;'>
              
              </div>
            </td>
              

          </tr>




                        

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
