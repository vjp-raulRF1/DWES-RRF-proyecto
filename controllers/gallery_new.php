<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require 'entities/image_gallery.class.php';
require 'entities/connection.class.php';
require_once 'entities/query_builder.class.php';
require_once 'entities/categorias.class.php';
require_once 'exceptions/app_exception.class.php';
require_once 'exceptions/file_exception.class.php';
require_once 'exceptions/query_exception.class.php';
require_once 'entities/repository/image_gallery_repository.class.php';
require_once 'entities/repository/categoria_repository.class.php';
//array para guardar los mensajes de los errores
$errores = [];
$descripcion = "";
$mensaje = "";

try {

    $imageRepository = new ImagenGaleriaRepository();

    $descripcion = trim(htmlspecialchars($_POST['descripcion'] ?? ''));
    $categoria = trim(htmlspecialchars($_POST['categoria'] ?? ''));

    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    //el parametro fileNmae es 'imagen' porque así lo indicamos en
    //en el formulario (type='file' name='imagen')
    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
    $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

    $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
    $imageRepository->save($imagenGaleria);

    $descripcion = '';
    $mensaje = 'Imagen guardada '. $imagenGaleria->getNombre();
    App::get('logger')->add($mensaje);
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}

    header('Location: /gallery');
?>