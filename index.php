<?php
    session_start();
    //referencing my autoloader and retrieving our router
    require_once 'vendor/autoload.php';
    $f3 = require_once 'vendor/bcosca/fatfree-core/base.php';

    //error handling
    $f3->set('DEBUG', 3);

    //define our routes
    //route for index
    $f3->route('GET /', function($f3) {
        $controller = new Controller($f3);
        $controller->home();
    });

    //route for home
    $f3->route('GET|POST /post-job', function($f3) {
        $controller = new Controller($f3);
        $controller->postJob();
    });

    //route for about
    $f3->route('GET|POST /announcements', function($f3) {
        $controller = new Controller($f3);
        $controller->announcements();
    });

    //route for the login page
    $f3->route('GET|POST /login', function($f3) {
        $controller = new Controller($f3);
        $controller->login();
    });

    //route to logout
    $f3->route('GET /logout', function($f3) {
        $controller = new Controller($f3);
        $controller->logout();
    });  

    //route for the confirmation page
    $f3->route('GET /confirmation', function($f3) {
        $controller = new Controller($f3);
        $controller->confirmation();
    });

    //route for hiding a job (Only logged in admin should be able to click this)
    $f3->route('GET /hide/@id', function($f3, $params) {
        $controller = new Controller($f3);
        $controller->hide($params['id']);
    });
    
    //route for hiding a job (Only logged in admin should be able to click this)
    $f3->route('GET /hideAnnoucement/@id', function($f3, $params) {
        $controller = new Controller($f3);
        $controller->hideAnnoucement($params['id']);
    });
    
    //route for editing a job (Only logged in admin should be able to click this)
    $f3->route('GET|POST /edit/@id', function($f3, $params) {
        $controller = new Controller($f3);
        $controller->edit($params['id']);
    });

    $f3->run();
?>