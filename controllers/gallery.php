<?php
// require 'utils/utils.php';
// require 'entities/file.class.php';
// require 'entities/image_gallery.class.php';
// require 'entities/connection.class.php';
// require_once 'entities/query_builder.class.php';
// require_once 'entities/categorias.class.php';
// require_once 'exceptions/app_exception.class.php';
// require_once 'exceptions/file_exception.class.php';
// require_once 'exceptions/query_exception.class.php';
// require_once 'entities/repository/image_gallery_repository.class.php';
// require_once 'entities/repository/categoria_repository.class.php';
//array para guardar los mensajes de los errores

use proyecto\entities\repository\ImagenGaleriaRepository;
use proyecto\entities\repository\CategoriaRepository;
use proyecto\exceptions\AppException;
use proyecto\exceptions\FileException;
use proyecto\exceptions\QueryException;
$errores = [];
$descripcion = "";
$mensaje = "";

try {

    $imageRepository = new ImagenGaleriaRepository();
    $categoryRepository = new CategoriaRepository();

} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {

    $imagenes = $imageRepository->findAll();
    $categorias = $categoryRepository->findAll();
}

require 'views/gallery.view.php';
?>