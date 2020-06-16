

<?php require_once('includes/redireccion.php');?>
<?php  require_once('includes/header.php');?>
<?php  require_once('includes/barra_lateral.php');?>



<!-- Caja Principal -->

<div id="principal">

  <h1>Crear Categorias</h1>

  <br>
  <p>Añade Nuevas Categorias para que los usuarios puedan usarlas al crear sus Entradas</p>
  <br>
  <form action="guardar_categorias.php" method="POST">

    <label for="">Nombre de la Categoria</label>
    <input type="text" name="nombre">

    <input type="submit" value="Guardar">

  </form>


</div>

<!-- Fin Principal -->


<?php require_once('includes/footer.php'); ?>
