<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = [];
    $noErrores = [];
    $claseDiv='';
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

}
require 'utils/utils.php';
require 'views/contact.view.php';

?>