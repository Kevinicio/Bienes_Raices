<?php 

//Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);//Para validar que sea un id y no se pueda hacer una inyeccion

    if(!$id){
        header('Location: /admin');
    }

    //Base de datos
    require '../../includes/config/database.php'; // Importa archivo de conexión a la BD
    $db = conectarDB(); // Crea la conexión a la base de datos

    //Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db,$consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores"; // Query para obtener todos los vendedores
    $resultado = mysqli_query($db,$consulta); // Ejecuta la consulta y guarda resultados


    //Arreglo con mensajes de errores
    $errores = []; // Array donde se almacenarán errores de validación

    //Inicializar variables (para evitar errores y mantener valores en el form)
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){ // Verifica si el formulario fue enviado
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        
        // Obtener datos del formulario
        // Sanitización de datos para evitar inyección SQL
        // mysqli_real_escape_string escapa caracteres especiales como comillas (' ")
        // que podrían alterar la consulta SQL si el usuario introduce código malicioso
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
        $precio = mysqli_real_escape_string( $db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor']);
        $creado = date('Y/m/d'); // Fecha actual

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        // Validaciones
        if(!$titulo){//Si titulo esta vacio
            $errores[] = "Debes añadir un titulo";
        }
        if(!$precio){//Si precio esta vacio
            $errores[] = "El precio es obligatorio";
        }
        if(strlen($descripcion) < 50){//Debe haber una descripcion con una extension de al menos 50
            $errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }
        if(!$habitaciones){//Si habitaciones vacio
            $errores[] = "El número de habitaciones es obligatorio";
        }
        if(!$wc){//Si wc vacio
            $errores[] = "El número de baños es obligatorio";
        }
        if(!$estacionamiento){//Si estacionamiento vacio
            $errores[] = "El número de estacionamientos es obligatorio";
        }
        if(!$vendedores_id){//Si vendedores vacio
            $errores[] = "Elige un vendedor";
        }

        //Validar por tamaño 1mb maximo
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida){
            $errores[] = 'La imagen es muy pesada';
        }

        // Debug (comentado)
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        // exit;

        //Revisar que el arreglo de errores este vacio
        if(empty($errores)){//empty es para si el arreglo esta vacio
            /** SUBIDA DE ARCHIVOS **/
            //Crear una carpeta
            $carpetaImagenes = '../../imagenes';
            if(!is_dir($carpetaImagenes)){//Verificar si existe la carpeta
                mkdir($carpetaImagenes);
            }
            $nombreImagen = '';//Preparas la variable para guardar el nombre final de la imagen.

            if($imagen['name']){//Si existe:significa que sí seleccionó una imagen nueva.
                //Eliminar la imagen previa
                unlink($carpetaImagenes . "/" . $propiedad['imagen']);//Entonces estás borrando la imagen vieja para que no quede basura acumulada.

                // //Generar nombre unico
                $nombreImagen = md5(uniqid(rand(),true)).'.jpg';
                // //Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);//Para guardar la imagen en la carpeta
            }else{
                $nombreImagen = $propiedad['imagen'];//Propiedad o la imagen previa
            }



            //Actualizar en la DB
            $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio',imagen = '$nombreImagen',descripcion = '$descripcion',
            habitaciones = $habitaciones, wc = $wc,estacionamiento = $estacionamiento,vendedores_id = $vendedores_id WHERE id = $id";

            // echo $query; // Para debug
            // exit;
            $resultado = mysqli_query($db,$query); // Ejecuta el INSERT
            if($resultado){
                //Redireccionar al usuario para evitar que duplique entradas
                header('Location: /admin?resultado=2'); // Redirige al panel admin y usamos query string
            }
        }
    }

    require '../../includes/funciones.php'; // Importa funciones generales
    incluirTemplate('header');//Incluye el header del sitio
?>

    <main class="contenedor">
        <h1>Actualizar</h1>

        <!-- Botón para regresar -->
        <a href="/admin/" class="boton boton-verde">Volver</a>

        <!-- Mostrar errores -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?> <!-- Imprime cada error -->
            </div>
        <?php endforeach; ?>
        <!--Con foreach por lo menos se ejecuta una vez por cada que hay un elemento en el array -->

        <!-- Formulario -->
        <form class="formulario" method="POST" enctype="multipart/form-data"><!-- Es necesario para permitir subir archivos -->
            <fieldset>
                <legend>Información General</legend>

                <!-- Campo titulo -->
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <!-- Campo precio -->
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <!-- Campo imagen (aún no procesado en PHP) -->
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">  <!--accept para indicar que archivos aceptar -->
            
                <img src="/imagenes/<?php echo $imagenPropiedad ?>" class="imagen-small" alt="imagen propiedad">

                <!-- Campo descripción -->
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <!-- Habitaciones -->
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>"><!--Para establecer un minimo y maximo-->

                <!-- Baños -->
                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>"><!--Para establecer un minimo y maximo-->

                <!-- Estacionamiento -->
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>"><!--Para establecer un minimo y maximo-->
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <!-- Select dinámico de vendedores -->
                <select name="vendedor">
                    <option value="">--Seleccione--</option>

                    <?php while($vendedor = mysqli_fetch_assoc($resultado))://acceder a arreglo de resultados ?>
                        <!-- Si el vendedor coincide, se queda seleccionado -->
                        <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'] ?>"> 
                            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?> 
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <!-- Botón submit -->
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer'); // Incluye el footer
?>