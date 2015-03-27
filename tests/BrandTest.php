<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Brand.php';

   class BrandTest extends PHPUnit_Framework_TestCase
   {
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
   }
?>
