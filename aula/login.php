<?php 
require 'database.php';
session_start();
if(!empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    echo "<script>alert('No has cerrado sesión aún');</script>";
    exit;
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

  <title>Inicio de sesión</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  /*if (isset($_POST['login'])) { //user logging in
    
            require 'login.php';
            
        } */
  if (isset($_POST['logins']))
  {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    require 'loginsito.php';
  }
}
?>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form data-toggle="validator" role="form" action="loginsito.php" method="post">
            <h1>
              <i class="fa fa-user"></i> Inicio de sesión</h1>
            <div>
              <input class="form-control" placeholder="Correo Electrónico" type="email" id="email" name="email" required="required" />
            </div>
            <div>
              <input placeholder="Clave" id="password" type="password" name="password" class="form-control" required="required" />
            </div>
            <input type="hidden" name="loginsito">
            <div>
              <input type="hidden" name="logins">
              <button  type="submit" class="btn btn-default btn-md">Entrar</button>
              
              <a class="reset_pass" href="#signup">Recuperar clave</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">

              <div class="clearfix"></div>
              <br />

              <div>
                <h1>
                  Colegio Nuevo Milenio</h1>
                <p>© 2017 Todos los derechos reservados.</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form action = "recuperar.php" method = "post">
            <h1>
              <i class="fa fa-wrench"></i> Recuperar clave</h1>
            <div>
              <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required="required" />
            </div>
            <div>
              <button type="submit" class="btn btn-default btn-md">Siguiente</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">
                <a href="#signin" class="to_register">Recorde mi clave</a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1>
                  Colegio Nuevo Milenio</h1>
                <p>© 2017 Todos los derechos reservados.</p>
              </div>
            </div>
          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>