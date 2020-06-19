<!-- Cabecera -->
<?php

require_once('includes/header.php');

 ?>

  <!--Barra Lateral-->

<?php

require_once('includes/barra_lateral.php');

 ?>

 


  <!--Caja Principal-->

  <div id = "principal">

        <h1>Ultimas Entradas</h1>

        <?php

          $entradas = conseguirUltimasEntradas($db);



          if(!empty($entradas)):
            while ($entrada = mysqli_fetch_assoc($entradas)):

        ?>

        <article class="entrada">

          <a href="#">
            <h2><?= $entrada['titulo']; ?></h2>
            <span class="fecha"> <?= $entrada['categoria']. ' | '.$entrada['fecha'] ?> </span>
            <p><?= substr($entrada['descripcion'], 0, 180); ?> ...</p>
         </a>

        </article>

        <?php
        endwhile;

    endif;

         ?>




    <br>
        <div id="ver-todas">

          <a href="#"><p>Ver Todas las entradas</p></a>

        </div>

  </div>

<!--Pie de Pagina-->
<?php

require_once('includes/footer.php');

 ?>

  </body>
</html>
