

<?php require_once('includes/redireccion.php');?>
<?php  require_once('includes/header.php');?>
<?php  require_once('includes/barra_lateral.php');?>



<!-- Caja Principal -->

<div id="principal">

  <h1>Crear Entradas</h1>

  <br>
  <p>Añade Nuevas Entradas para que los usuarios puedan leerlas y Disfrutar de Nuestro Contenido</p>
  <br>
  <form action="guardar_entradas.php" method="POST">

    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo">
    <?php echo isset($_SESSION['errores_entradas']) ?  mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>


    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion"></textarea>
    <?php echo isset($_SESSION['errores_entradas']) ?  mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>



    <label for="categoria">Categorias: </label>
    <select name="categoria">

      <?php

        $categorias = conseguirCategorias($db);

        if (!empty($categorias)):
          // code...

        while ($categoria = mysqli_fetch_assoc($categorias)):
      ?>
          <option value="<?= $categoria['id'] ?>">
            <?= $categoria['nombre'] ?>
          </option>

       <?php

     endwhile;

   endif;    ?>

    </select>
    <?php echo isset($_SESSION['errores_entradas']) ?  mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>


    <br><br>

    <input type="submit" value="Guardar">

  </form>

  <?php borrarErrores(); ?>


</div>

<!-- Fin Principal -->


<?php require_once('includes/footer.php'); ?>
