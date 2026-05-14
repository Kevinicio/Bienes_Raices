<?php
    require 'includes/funciones.php';
    incluirTemplate('header');//Para pasar a la funcion si esta pagina incluye "inicio"
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus recusandae voluptatum, corrupti magnam minus dolor doloremque iusto magni porro. Laborum impedit facilis placeat, iure quo inventore exercitationem suscipit eius?
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae eos laborum, deleniti voluptatum voluptas repellendus iusto soluta ad. Fugiat quia eos cupiditate accusamus reiciendis dignissimos molestiae alias voluptate. Animi, reiciendis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, labore eveniet et doloremque cupiditate, eligendi optio repudiandae corporis dolorem consectetur tempora vero delectus! Ea similique quo id harum modi laborum.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla iusto sequi provident id odit minima omnis quam ullam consequatur quos quas adipisci maxime, incidunt et, eius nobis possimus rem error.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum recusandae inventore dolorem quos at pariatur ut minus, numquam quas accusantium. Minus voluptas ex dicta eius accusamus necessitatibus numquam quia repellendus.
            </p>
        </div>
    </main>
<?php 
    incluirTemplate('footer');
?>