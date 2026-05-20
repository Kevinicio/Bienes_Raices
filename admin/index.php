<?php 
    //Importar la conexion
    require '../includes/config/database.php'; // Importa archivo de conexión a la BD
    $db = conectarDB(); // Crea la conexión a la base de datos
    //Escribir el query
    $query = "SELECT * FROM propiedades"; 
    //Consultar base de datos
    $resultadoConsulta = mysqli_query($db, $query);

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;//El place holder "??" busca el valor 'resultado' y si no existe le asigna null

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];//Este post no va a existir hasta que se mande el request method
        $id = filter_var($id, FILTER_VALIDATE_INT);//Validar que es un entero el id
        //Eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db,$query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes' . $propiedad['imagen']);

        //Eliminar la propiedad
        if($id){
            $query = "DELETE FROM propiedades WHERE id = $id";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                header('location: /admin?resultado=3');
            }
        }
    }

    //Incluye un template
    require '../includes/funciones.php';
    incluirTemplate('header');//Para pasar a la funcion si esta pagina incluye "inicio"
?>

    <main class="contenedor">
        <h1>Administrador de bienes raices</h1>
        <?php if(intval($resultado) === 1): ?><!-- intval para convertir a entero-->
            <p class="alerta exito">¡Anuncio Creado Correctamente!</p>
        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta exito">¡Anuncio Actualizado Correctamente!</p>
        <?php elseif(intval($resultado) === 3): ?>
            <p class="alerta exito">¡Anuncio Eliminado Correctamente!</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <table class="propiedades">
            <thead><!--Header de la tabla-->
                <tr><!--Define fila de tabla-->
                    <th>ID</th><!--th define seccion de fila-->
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!--Mostrar los resultados-->
                <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr class="info-tabla">
                    <td><?php echo $propiedad["id"]; ?></td><!--Define una celda individual dentro de la tabla-->
                    <td><?php echo $propiedad["titulo"]; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad["imagen"]; ?>" alt="imagenCasa" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad["precio"]; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>"><!--hidden sirve para guardar y enviar datos en el formulario sin que el usuario los vea-->
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
<?php 
    //Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>