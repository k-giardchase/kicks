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
   }
?>
