<?php


require 'utils/utils.php';
require 'entity/file.class.php';
require 'entity/image_galey.class.php';
require 'entity/connection.class.php';
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
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $connection = Connection::make();
        $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $pdoStatement = $connection->prepare($sql); //Preparamos la consulta
        $parametros = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];
        // error a partir de aqui
        if ($pdoStatement->execute($parametros) === false) { //La ejecutamos con los parámetros
            $errores[] = "No se ha podido guardar la imagen en la BD";
        } else {
            $descripcion = ''; //reinicio la vble para que no aparezca relleno en el formulario
            $mensaje = 'Imagen guardada';
        }
        // $querySql = "Select * from imagenes";
        // $queryStatement = $connection->query($querySql);
        // while($row = $queryStatement->fetch()){
        //     echo "id:".$row['id'];
        //     echo "Nombre:".$row['nombre'];
        //     echo "Descripcion:".$row['descripcion'];

        // }
    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
    }
}
require 'views/gallery.view.php';
?>