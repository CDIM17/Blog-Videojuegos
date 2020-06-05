<?php

if (isset($_POST)) {


  require_once('includes/conexion.php');
  //iniciar sesion
  if (!isset($_SESSION)) {
    // code...
    session_start();
  }

  $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
  $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
  $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

  //Array de errores
  $errores = array();
  //Validar los datos

  //Validar Campo Nombres
  if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)) {
    // code...
    $nombre_validado = true;
  }
  elseif(empty($nombre)) {
    // code...
    $errores["nombre"] = "El Campo Nombre esta vacio";
  }
  else {
         $nombre_validado = false;
         $errores["nombre"] = "El nombre no es valido";
       }
  //Validar apellido
  if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)) {
         // code...
         $apellido_validado = true;
  }
  elseif(empty($apellido)) {
    // code...
    $errores["apellido"] = "El Campo Apellido esta vacio";
  }
  else {
          $apellido_validado = false;
          $errores["apellido"] = "El apellido no es valido";

  }
  //Validar email
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
         // code...
         $email_validado = true;
  }
  elseif(empty($email)) {
    // code...
    $errores["email"] = "El Campo email esta vacio";
  }
  else {
          $email_validado = false;
          $errores["email"] = "El email no es valido";

  }
  //Validar Password
    if (!empty($password)) {
         // code...
         $password_validado = true;
  }
  else {
          $password_validado = false;
          $errores["password"] = "El password esta vacio";

  }

$guardar_usuario = false;

if (count($errores) == 0) {
  //Insertar Registro en la Base de Datos
  $guardar_usuario = true;

  //Cifrar Password
  $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost' => 4]);

  //var_dump(password_verify($password, $password_segura));

  $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$email','$password_segura',CURDATE())";

  $guardar = mysqli_query($db,$sql);

  if ($guardar) {
    // code...
    $_SESSION['completado'] = "El Registro se ha completado con exito";
  }
  else{
    $_SESSION['errores']['general'] = "Fallo al guardar el usuario";

  }


}
else{
  $_SESSION['errores'] = $errores;

}

header('Location:index.php');

}




 ?>
