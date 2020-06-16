<?php

  if (isset($_POST)) {
    // code

    //Conexion a la Base de Datos
    require_once('includes/conexion.php');

    $titulo      = isset($_POST['titulo'])      ? mysqli_real_escape_string($db, $_POST['titulo'])      : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria   = isset($_POST['categoria'])   ? (int) mysqli_real_escape_string($db, $_POST['categoria'])   : false;
    $usuario     = $_SESSION['usuario']['id'];


    //Array de Errores
    $errores = array();

    //Validar los Datos antes de Guardarlos en la Base de Datos

    //Validando Campo Nombre
    if (empty($titulo)) {
      // code...
      $errores['titulo'] = 'El titulo no es Valido';
    }

        //Validando Campo Nombre
    if (empty($descripcion)) {
          // code...
        $errores['descripcion'] = 'La Descripcion No es Valida';
      }

      //Validando Campo Nombre
      if (empty($categoria)) {
          // code...
          $errores['categoria'] = 'La Categoria no es Valida';
      }

      $date = date('Y-m-d');

    if (count($errores) == 0) {
      // code...
      $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria,'$titulo', '$descripcion','$date')";
      $guardar = mysqli_query($db, $sql);

    }else {
      // code...
      $_SESSION["errores_entradas"] = $errores;
    }

    header("Location: index.php");
  }

 ?>
