<?php

  if (isset($_POST)) {
    // code

    //Conexion a la Base de Datos
    require_once('includes/conexion.php');

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    //Array de Errores
    $errores = array();

    //Validar los Datos antes de Guardarlos en la Base de Datos

    //Validando Campo Nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)) {
      // code...
      $nombre_validado = true;
    }else {
      // code...
      $nombre_validado = false;
      $errores['nombre'] = "El Nombre no es validado";
    }

    if (count($errores) == 0) {
      // code...
      $sql = "INSERT INTO categorias VALUES(NULL, '$nombre')";
      $guardar = mysqli_query($db, $sql);

    }

    header("Location: index.php");
  }

 ?>
