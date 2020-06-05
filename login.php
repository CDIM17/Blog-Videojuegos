<?php

//Iniciar la sesion y la conexion a la base de Datos


require_once("includes/conexion.php");

//Recoger los datos del formulario

if (isset($_POST)) {

  if (isset($_SESSION['error_login']))
    {
          // code...
        $_SESSION['error_login'] = '';
    }
  // code...

  $email    = trim($_POST['email']);
  $password = $_POST['password'];

  //Consulta para comprobar las credenciales del usuario
  $sql = "Select * from usuarios where email = '$email'";

  $login = mysqli_query($db, $sql);

  if ($login && mysqli_num_rows($login) == 1) {
    // code...
    if (isset($_SESSION['error_login']))
      {
            // code...
          session_unset($_SESSION['error_login']);
      }
    $usuario = mysqli_fetch_assoc($login);

    $verify = password_verify($password,$usuario['password']);

    if ($verify) {
      // Uilizar una sesion para guardar los datos del usuario logueado
      $_SESSION['usuario'] = $usuario;

    }
    else {
      //Si algo falla enviar una sesion con el fallo
      $_SESSION['error_login'] = "Login incorrecto";

    }


  }
  else{
    $_SESSION['error_login'] = "Login incorrecto";
  }

}

header("Location: index.php");

 ?>
