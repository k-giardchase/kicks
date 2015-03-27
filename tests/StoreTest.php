<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Store.php';

   class ShoeTest extends PHPUnit_Framework_TestCase
   {

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



   }



?>
