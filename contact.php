<?php
    require_once 'entities/file.class.php';
    require_once 'entities/connection.class.php';
    require_once 'entities/query_builder.class.php';
    require_once 'exceptions/app_exception.class.php';
    require_once 'entities/message.class.php';
    require_once 'entities/repository/mensaje_repository.class.php';

    $erroresValidacion = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellido = trim(htmlspecialchars($_POST['apellido']));
        $correo = trim(htmlspecialchars($_POST['correo']));
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $mensaje = trim(htmlspecialchars($_POST['mensaje']));

        if (empty($nombre)) {
            $erroresValidacion [] = 'El campo nombre esta vacio.';
        }

        if (empty($correo)) {
            $erroresValidacion [] = 'El campo correo esta vacio.';
        } else {
            if ((filter_var($correo, FILTER_VALIDATE_EMAIL)) === false) {
                $erroresValidacion [] = 'Email incoorecto';
            }
        }

        if (empty($asunto)) {
            $erroresValidacion [] = 'El campo asunto esta vacio.';
        }

        $datos = [
            'Nombre: ' => $nombre,
            'Apellidos: ' => $apellido,
            'Correo: ' => $correo,
            'Asunto: ' => $asunto,
            'Mensaje: ' => $mensaje
        ];

        $config = require_once 'app/config.php';
        App::bind('config', $config);
        $connection = App::getConnection();
        $messageRepository = new MessageRepository();

        if (empty($erroresValidacion)) {
            $mensaje = new Message($nombre, $apellido, $asunto, $correo, $mensaje);

            $messageRepository->guardar($mensaje);
        }
    }
    require 'utils/utils.php';
    require 'views/contact.view.php';
?>