<?php
require 'app.php';
function incluirTemplate(string $nombre, $inicio = false){
    include TEMPLATES_URL . "/$nombre.php";//TEMPLATES_URL tiene /templates, por eso es lo mismo
}