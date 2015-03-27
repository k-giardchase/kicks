<?php

    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $DB = new PDO('pgsql:host=localhost;dbname=shoes');

    $app = new Silex\Application();

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../views'
    ));



    return $app;
?>
