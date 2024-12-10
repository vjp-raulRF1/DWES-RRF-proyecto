<?php
    namespace proyecto\utils;

    $router->get('' , 'controllers/index.php');
    $router->get('about' , 'controllers/about.php');
    $router->get('partners' , 'controllers/partners.php');
    $router->get('blog' , 'controllers/blog.php');
    $router->get('contact' , 'controllers/contact.php');
    $router->get('gallery' , 'controllers/gallery.php');
    $router->get('post' , 'controllers/single_post.php');
    
    $router->post('' , 'controllers/index.php');
    $router->post('about' , 'controllers/about.php');
    $router->post('partners' , 'controllers/partners.php');
    $router->post('blog' , 'controllers/blog.php');
    $router->post('contact' , 'controllers/contact.php');
    $router->post('gallery/new' , 'controllers/gallery_new.php');
    $router->post('post' , 'controllers/single_post.php');
?>