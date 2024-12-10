<?php
    // require_once 'entities/app.class.php';
    // require_once 'entities/request.class.php';
    // require_once 'entities/router.class.php';
    // require_once 'exceptions/not_found.class.php';
    // require_once 'entities/repository/mylog.class.php';
    
    
    use proyecto\entities\App;
    use proyecto\entities\Router;
    use proyecto\entities\repository\MyLog;
    require_once 'vendor/autoload.php';
    
    $config = require_once 'app/config.php';
    App::bind('config', $config);
   
    
    $router = Router::load('utils/routes.php');
    App::bind('router',$router);

    $logger = MyLog::load('logs/proyecto.log');
    App::bind('logger',$logger);
?>