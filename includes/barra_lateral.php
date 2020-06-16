<?php require_once 'helpers.php'; ?>

<!--Barra Lateral -->
<aside id = "sidebar">

<?php if (isset($_SESSION['usuario'])): ?>

  <div id = "usuario-logueado" class="bloque">

    <h2><?= 'Bienvenido '.$_SESSION['usuario']['nombre']. ' '.$_SESSION['usuario']['apellidos'];?></h2>

      <a href="cerrar.php" class="boton boton-verde">Crear Entradas</a>
      <a href="crear_categorias.php" class="boton boton-azul">Crear Categorías</a>
      <a href="cerrar.php" class="boton boton-naranja">Mis Datos</a>
      <a href="cerrar.php" class="boton boton-rojo">Cerrar Sesion</a>

  </div>



<?php endif; ?>

<?php  if (!isset($_SESSION['usuario'])):  ?>

  <div id = "login" class="bloque">

    <h3>Login</h3>

      <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] != ''): ?>
            <div class= "alerta alerta-error">

              <?= $_SESSION['error_login']; ?>

            </div>
      <?php endif; ?>

    <form action="login.php" method="post">

        <label for="email">Escribe tu email</label>
        <p>
          <input type="email" name="email">
        </p>
        <label for="password">Escribe tu pasword</label>
        <p>
          <input type="password" name="password">
        </p>
        <input type="submit" name = "submit" value="ingresar">

    </form>

  </div>

<!--------------------------------------------------------------------->

  <div id = "register" class = "bloque">

        <h3>Registro</h3>

        <?php if (isset($_SESSION['completado'])): ?>

            <div class="alerta alerta-exito">

              <?= $_SESSION['completado']; ?>

            </div>

        <?php elseif(isset($_POST['errores']['general'])): ?>

          <div class="alerta alerta-error">

            <?= $_SESSION['errores']['general']; ?>

          </div>

        <?php endif; ?>


        <form action="registro.php" method="post">
            <label for="name">Escribe tu Nombre</label>
            <p>
              <input type="text" name="nombre">
            </p>
            <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellido">Escribe tu apellido</label>
            <p>
              <input type="text" name="apellido">
            </p>
            <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

            <label for="email">Escribe tu email</label>
            <p>
              <input type="email" name="email">
            </p>
            <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <label for="email">Escribe tu pasword</label>
            <p>
              <input type="password" name="password">
            </p>
            <?php echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'], 'password') : ''; ?>

            <input type="submit" name = "submit" value="Registrar">
        </form>

        <?php borrarErrores(); ?>
  </div>

<?php endif; ?>

</aside>
