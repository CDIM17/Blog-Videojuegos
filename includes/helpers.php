<?php

function mostrarError($errores, $campo)
{
  $alerta = '';
  if (isset($errores[$campo]) && !empty($campo)) {
    // code...
      $alerta = "<div class = 'alerta alerta-error'> ".$errores[$campo]. "</div>";
  }
  return $alerta;
}

function borrarErrores()
{
  $borrado = false;

  if (isset($_SESSION['errores'])) {
    // code...
    $_SESSION['errores'] = null;
    session_unset($_SESSION['errores']);
  }
  if (isset($_SESSION['completado'])) {
    // code...
    $_SESSION['completado'] = null;
     session_unset($_SESSION['completado']);

  }

  return $borrado;

}

function conseguirCategorias($conexion)
{
  $sql = "SELECT * FROM categorias ORDER BY id ASC";
  $categorias = mysqli_query($conexion,$sql);

  $resultado = array();
  if ($categorias && mysqli_num_rows($categorias) >= 1) {
    // code...
    $resultado = $categorias;
  }

  return $resultado;
}

function conseguirUltimasEntradas($conexion)
{
  $sql = 'Select e.*, c.* from entradas e  inner join categorias c  on e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4';
  $entradas = mysqli_query($conexion, $sql);

  $resultado = array();

  if ($entradas && mysqli_num_rows($entradas) >= 1) {
    // code...
    $resultado = $entradas;
  }
  return $resultado;
}


 ?>
