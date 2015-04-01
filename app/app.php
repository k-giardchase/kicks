<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../src/Store.php';

    $app = new Silex\Application();

    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=shoes');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //READ

    //Home page - display option of brands or stores
    //send to get/brands or get/stores
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    //View all brands
    $app->get('/brands', function() use ($app) {
        return $app['twig']->render('brands.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    //view all stores
    $app->get('/stores', function() use ($app) {
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    //Click link to individual store - Display store, all brands w/ store
    $app->get('/store/{id}', function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store.html.twig', array('store' => $store, 'stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    //Click link from brands to go to individual brand.
    $app->get('/brand/{id}', function($id) use ($app) {
        $brand = Brand::find($id);
        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores'=> $brand->getStores(), 'allstores' => Store::getAll()));
    });

    //CREATE

    //Post to stores- Add store
    $app->post('/create_store', function() use ($app) {
        $name = $_POST['name'];
        $id = null;
        $new_store = new Store($name, $id);
        $new_store->save();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    //Add brands to brand
    $app->post('/create_brands', function() use ($app) {
        $brand_name = $_POST['name'];
        $new_store = new Brand($brand_name);
        $new_store->save();
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    //Add a brand to a particular store
    $app->post('/create_brand', function() use ($app) {
        $store = Store::find($_POST['store_id']);
        $brand_name = $_POST['brand_id'];
        $brand = new Brand($brand_name);
        $brand->save();
        $store->addBrand($brand);
        return $app['twig']->render('store.html.twig', array('store' => $store, 'stores' => Store::getAll(), 'brands'=> Brand::getAll()));
    });

    //Add individual store to brand
    $app->post('/add_store', function() use ($app) {
        $store = Store::find($_POST['store_id']);
        $brand = Brand::find($_POST['brand_id']);
        $brand->addStore($store);
        return $app['twig']->render('brand.html.twig', array('brand' => $brand, 'stores'=> $brand->getStores(), 'allstores' => Store::getAll()));
    });

    //UPDATE
    //click link from store{id} to edit individual store.
    $app->post('/store/{id}/edit', function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store_edit.html.twig', array('store' => $store));
    });

    //click link from store{id}edit to update store name, send back to stores
    $app->patch('/store/{id}', function($id) use ($app) {
        $selected_store = Store::find($id);
        $new_store_name = $_POST['name'];
        $selected_store->update($new_store_name);
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    //DELETE

    //Delete all brands from brand
    $app->post('/delete_brands', function() use ($app) {
        Brand::deleteAll();
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    //Delete all stores from store
    $app->post('/delete_stores', function() use ($app) {
        Store::deleteAll();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    //Delete single store
    $app->delete('/store/{id}', function($id) use ($app) {
        $selected_store = Store::find($id);
        $selected_store->delete();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    return $app;
?>
