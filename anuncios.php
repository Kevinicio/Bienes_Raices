<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');//Para pasar a la funcion si esta pagina incluye "inicio"
?>

    <main class="contenedor seccion">
        <h2>Casas y Depas en Ventas</h2>
        <?php 
            $limite = 10;
            include 'includes/templates/anuncios.php';
        ?>
    </main>
<?php 
    incluirTemplate('footer');
?>