<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');//Para pasar a la funcion si esta pagina incluye "inicio"
?>

    <main class="contenedor">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote><!--Se utiliza cuando hay contenido que estamos citando-->
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus recusandae voluptatum, corrupti magnam minus dolor doloremque iusto magni porro. Laborum impedit facilis placeat, iure quo inventore exercitationem suscipit eius?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae eos laborum, deleniti voluptatum voluptas repellendus iusto soluta ad. Fugiat quia eos cupiditate accusamus reiciendis dignissimos molestiae alias voluptate. Animi, reiciendis.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, labore eveniet et doloremque cupiditate, eligendi optio repudiandae corporis dolorem consectetur tempora vero delectus! Ea similique quo id harum modi laborum.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.</p>
            </div>
        </div>
    </main>

    <section class="contenedor">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt itaque sed, eos corrupti voluptatem voluptas, inventore vel, dolore laborum dolorem ut dolor consequatur totam dicta fuga eaque. Qui, reiciendis?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt itaque sed, eos corrupti voluptatem voluptas, inventore vel, dolore laborum dolorem ut dolor consequatur totam dicta fuga eaque. Qui, reiciendis?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab deserunt itaque sed, eos corrupti voluptatem voluptas, inventore vel, dolore laborum dolorem ut dolor consequatur totam dicta fuga eaque. Qui, reiciendis?</p>
            </div>
        </div>
    </section>
<?php 
    incluirTemplate('footer');
?>