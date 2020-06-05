<?php require_once('conexion.php'); ?>
<?php require_once('helpers.php'); ?>

<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

<!--Cabecera -->

<header id = "cabecera">
<!--Logo -->
  <div id = "logo">
    <a href="index.php">
      Blog de Videojuegos
    </a>
  </div>

  <!--Menu -->
  <nav id = "menu">
    <ul>
      <li>
          <a href="index.php">Inicio</a>
      </li>

    <?php $categorias = conseguirCategorias($db);

     if (!empty($categorias)):

         while ($categoria = mysqli_fetch_assoc($categorias)):
      ?>
          <li>
            <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
          </li>

         <?php endwhile;

      endif; ?>

      <li>
          <a href="index.php">Sobre mi</a>
      </li>
      <li>
          <a href="index.php">Contacto</a>
      </li>
    </ul>
  </nav>

  <div class="clearfix">

  </div>

</header>

<div id="contenedor">
