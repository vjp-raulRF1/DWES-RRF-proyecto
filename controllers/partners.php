<?php
    // require_once 'entities/file.class.php';
    // require_once 'entities/connection.class.php';
    // require_once 'entities/query_builder.class.php';
    // require_once 'exceptions/app_exception.class.php';
    // require_once 'entities/partner.class.php';
    // require_once 'entities/repository/partner_repository.class.php';
    // require_once 'utils/utils.php';

    use proyecto\entities\repository\PartnerRepository;
    use proyecto\entities\Partner;
    use proyecto\entities\File;
    use proyecto\exceptions\AppException;
    use proyecto\exceptions\FileException;
    use proyecto\exceptions\QueryException;

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    try {

        
        $PartnerRepository = new PartnerRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            
            $logo = new File('logo', $tiposAceptados);

            $logo ->saveUploadFile(Partner::RUTA_IMAGENES_ASOCIADOS);
            
            $partner = new Partner($nombre, $logo->getFileName(), $descripcion);
            
            $PartnerRepository->guardar($partner);
            $descripcion = ''; 
            $mensaje = "Logo guardado";
        }
    }
    catch (FileException | QueryException | AppException $exception) {
       
        $errores[] = $exception->getMessage();
    } finally {
    
        $partners = $PartnerRepository->findAll();
    }

    require '../views/partners.view.php';
?>