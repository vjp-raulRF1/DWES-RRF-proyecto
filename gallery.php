<?php
require 'utils/utils.php';
require 'utils/File.class.php';
//require'exceptions/FileException.class.php';
//array para guardar los mensajes de los errores
$errores = [];
$descripcion = "";
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        //el parametro fileNmae es 'imagen' porque así lo indicamos en
        //en el formulario (type='file' name='imagen')
        $mensaje = "Datos enviados";
    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
    }
}
require 'views/gallery.view.php';
?>