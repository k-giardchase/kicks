<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Store.php';

   class BrandTest extends PHPUnit_Framework_TestCase
   {
       function test_getBrandName()
       {
           //Arrange
           $brand_name = 'Adidas';
           $id = 1;
           $test_brand = new Brand($brand_name, $id);

           //Act
           $result = $test_brand->getBrandName();

           //Assert
           $this->assertEquals('Adidas', $result);
       }
   }
?>
