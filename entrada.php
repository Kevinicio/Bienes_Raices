<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');//Para pasar a la funcion si esta pagina incluye "inicio"
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2026</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus recusandae voluptatum, corrupti magnam minus dolor doloremque iusto magni porro. Laborum impedit facilis placeat, iure quo inventore exercitationem suscipit eius?
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae eos laborum, deleniti voluptatum voluptas repellendus iusto soluta ad. Fugiat quia eos cupiditate accusamus reiciendis dignissimos molestiae alias voluptate. Animi, reiciendis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, labore eveniet et doloremque cupiditate, eligendi optio repudiandae corporis dolorem consectetur tempora vero delectus! Ea similique quo id harum modi laborum.
            </p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.
            <p>
        </div>
    </main>
<?php 
    incluirTemplate('footer');
?>