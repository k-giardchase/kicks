<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Brand.php';
   require_once 'src/Store.php';

   class BrandTest extends PHPUnit_Framework_TestCase
   {
       protected function tearDown()
       {
           Brand::deleteAll();
           Store::deleteAll();
       }

       function test_getBrandName()
       {
           //Arrange
           $brand_name = 'Addidas';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $result = $test_brand->getBrandName();

           //Assert
           $this->assertEquals($brand_name, $result);
       }

       function test_setBrandName()
       {
           //Arrange
           $brand_name = 'Addidas';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $test_brand->setBrandName('Nike');

           //Assert

           $this->assertEquals('Nike', $test_brand->getBrandName());
       }

       function test_getId()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $result = $test_brand->getId();

           //Assert
           $this->assertEquals($id, $result);
       }

       function test_setId()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $test_brand->setId(2);

           //Assert
           $this->assertEquals(2, $test_brand->getId());
       }

       function test_save()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $test_brand->save();

           //Assert
           $result = Brand::getAll();
           $this->assertEquals([$test_brand], $result);
       }

       function test_getAll()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);
           $test_brand->save();

           $brand_name2 = 'Converse';
           $id2 = 2;
           $test_brand2 = new Brand($brand_name2, $id2);
           $test_brand2->save();

           //Act
           $result = Brand::getAll();

           //Assert
           $this->assertEquals([$test_brand, $test_brand2], $result);
       }

       function test_deleteAll()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);
           $test_brand->save();

           $brand_name2 = 'Converse';
           $id2 = 2;
           $test_brand2 = new Brand($brand_name2, $id2);
           $test_brand2->save();

           //Act
           Brand::deleteAll();

           //Assert
           $result = Brand::getAll();
           $this->assertEquals([], $result);
       }

       function test_find()
       {
           //Arrange
           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);
           $test_brand->save();

           $brand_name2 = 'Converse';
           $id2 = 2;
           $test_brand2 = new Brand($brand_name2, $id2);
           $test_brand2->save();

           //Act
           Brand::find($test_brand2->getId());

           //Assert
           $result = $test_brand2;
           $this->assertEquals($test_brand2, $result);
       }

       function test_addStore()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $brand_name = 'Kicks';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);
           $test_brand->save();

           //Act
           $test_brand->addStore($test_store);

           //Assert
           $result = $test_brand->getStores();
           $this->assertEquals([$test_store], $result);
       }
   }
?>
