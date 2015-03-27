<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=shoes');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    $app->post('/create_store', function() use ($app) {
        $name = $_POST['name'];
        $id = null;
        $new_store = new Store($name, $id);
        $new_store->save();
        return $app['twig']->render('index.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    $app->get('/stores/{id}', function($id) use ($app) {
        return $app['twig']->render('store.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    $app->post('/stores/{id}', function($id) use ($app) {
        $brand_name = $_POST['brand_name'];
        $id = null;
        $new_brand = new Brand($brand_name, $id);
        $new_brand->save();
        return $app['twig']->render('store.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });



    return $app;
?>
