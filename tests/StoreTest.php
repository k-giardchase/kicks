<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Store.php';
   require_once 'src/Brand.php';

   class StoreTest extends PHPUnit_Framework_TestCase
   {

       protected function tearDown()
       {
           Store::deleteAll();
           Brand::deleteAll();
       }

       function test_getName()
       {
           //Arrange
           $name = 'Kicks';
           $id = 1;
           $test_store = new Store($name, $id);

           //Act
           $result = $test_store->getName();

           //Assert
           $this->assertEquals($name, $result);
       }

       function test_setName()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);

           //Act
           $test_store->setName('kicks r us');

           //Assert
           $result = $test_store->getName();
           $this->assertEquals('kicks r us', $result);
       }

       function test_getId()
       {
           //Arrange
           $name = 'Kicks';
           $id = 1;
           $test_store = new Store($name, $id);

           //Act
           $result = $test_store->getId();

           //Assert
           $this->assertEquals($id, $result);
       }

       function test_setId()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);

           //Act
           $test_store->setId(2);

           //Assert
           $result = $test_store->getId();
           $this->assertEquals(2, $result);
       }

       function test_save()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);

           //Act
           $test_store->save();

           //Assert
           $result = Store::getAll();
           $this->assertEquals([$test_store], $result);
       }

       function test_getAll()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $name2 = 'kicks r us';
           $id2 = 2;
           $test_store2 = new Store($name2, $id2);
           $test_store2->save();

           //Act
           $result = Store::getAll();

           //Assert
           $this->assertEquals([$test_store, $test_store2], $result);
       }

       function test_deleteAll()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $name2 = 'kicks r us';
           $id2 = 2;
           $test_store2 = new Store($name2, $id2);
           $test_store2->save();

           //Act
           Store::deleteAll();

           //Assert
           $result = Store::getAll();
           $this->assertEquals([], $result);
       }

       function test_update()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $new_name = 'kicks r us';
           //Act
           $test_store->update($new_name);

           //Assert
           $this->assertEquals('kicks r us', $test_store->getName());
       }

       function test_delete()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $name2 = 'kicks r us';
           $id2 = 2;
           $test_store2 = new Store($name2, $id2);
           $test_store2->save();

           //Act
           $test_store->delete();

           //Assert
           $result = Store::getAll();
           $this->assertEquals([$test_store2], $result);
       }

       function test_find()
       {
           //Arrange
           $name = 'kicks';
           $id = 1;
           $test_store = new Store($name, $id);
           $test_store->save();

           $name2 = 'kicks r us';
           $id2 = 2;
           $test_store2 = new Store($name2, $id2);
           $test_store2->save();

           //Act
           $result = Store::find($test_store->getId());

           //Assert
           $this->assertEquals($test_store, $result);
       }

       function test_addBrand()
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
           $test_store->addBrand($test_brand);

           //Assert
           $result = $test_store->getBrands();
           $this->assertEquals([$test_brand], $test_store->getBrands());
       }

       function test_getBrands()
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

           $brand_name2 = 'Converse';
           $id2 = 2;
           $test_brand2 = new Brand($brand_name2, $id2);
           $test_brand2->save();

           //Act
           $test_store->addBrand($test_brand);
           $test_store->addBrand($test_brand2);

           //Assert
           $this->assertEquals($test_store->getBrands(), [$test_brand, $test_brand2]);
       }
   }

?>
