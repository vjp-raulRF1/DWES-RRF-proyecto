<?php
// require_once 'entities/file.class.php';
// require_once 'entities/connection.class.php';
// require_once 'entities/query_builder.class.php';
// require_once 'exceptions/app_exception.class.php';
// require_once 'entities/message.class.php';
// require_once 'entities/repository/mensaje_repository.class.php';

use proyecto\entities\repository\MessageRepository;
use proyecto\entities\Message;

$errores = [];
$noErrores = [];
$claseDiv = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellido = trim(htmlspecialchars($_POST['apellido']));
    $correo = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

    if (empty($_POST['nombre'])) {
        $errores[] = "Debe introducir su nombre";
    } else {
        $noErrores['nombre'] = $_POST['nombre'];
    }

    if (!empty($_POST['apellido'])) {
        $noErrores['apellido'] = $_POST['apellido'];
    }


    if (empty($_POST['email'])) {
        $errores[] = "Debe introducir su email";
    } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $noErrores['email'] = $_POST['email'];
    } else {
        $errores[] = "introduzca un email válido";
    }

    if (empty($_POST['asunto'])) {
        $errores[] = "Debe introducir su asunto";
    } else {
        $asunto = ($_POST['asunto']);
        $noErrores['asunto'] = $_POST['asunto'];
    }

    if (!empty($_POST['mensaje'])) {
        $mensaje = ($_POST['mensaje']);
        $noErrores['mensaje'] = $_POST['mensaje'];
    }

    
    $messageRepository = new MessageRepository();

    if (empty($errores)) {
        $mensaje = new Message($nombre, $apellido, $asunto, $correo, $mensaje);

        $messageRepository->guardar($mensaje);
        $nombre = '';
        $apellido = '';
        $correo = '';
        $asunto = '';
        $mensaje ='';
    }
}
require 'utils/utils.php';
require 'views/contact.view.php';
?>