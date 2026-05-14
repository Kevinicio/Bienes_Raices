<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <!--Ya no se usa isset por el cambio en la funcion, la funcion va detectar si la variable existe o si no-->
    <header class="header <?php echo $inicio ? $inicio : ''; ?>"><!--Si la variable existe y no es null, úsala.
                                                            Si no existe o es null, usa el valor por defecto.-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"><!--/ Para referirse a la pagina principal-->
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
                </a>    
                
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark mode img">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>

            </div><!--.barra-->
        </div>
    </header>