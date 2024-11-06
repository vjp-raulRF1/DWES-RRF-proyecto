<?php


require 'utils/utils.php';
require 'entity/file.class.php';
require 'entity/image_gallery.class.php';
require 'entity/connection.class.php';
require_once 'entity/query_builder.class.php';
require_once 'exceptions/app_exception.class.php';
// require_once 'exceptions/file_exception.class.php';
//array para guardar los mensajes de los errores
$errores = [];
$descripcion = "";
$mensaje = "";

try {
    $config = require_once 'app/config.php';

    App::bind('config',$config);   

    $connection = App::getConnection();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        //el parametro fileNmae es 'imagen' porque así lo indicamos en
        //en el formulario (type='file' name='imagen')
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


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
        $querySql = "Select * from imagenes";
        $queryStatement = $connection->query($querySql);
        while ($row = $queryStatement->fetch()) {
            echo "id:" . $row['id'];
            echo "Nombre:" . $row['nombre'];
            echo "Descripcion:" . $row['descripcion'];
        }
    }
    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll('imagenes','ImagenGaleria');
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception){
    $errores[] = $exception->getMessage();
} catch (AppException $exception){
    $errores[] = $exception->getMessage();
}

require 'views/gallery.view.php';
?>