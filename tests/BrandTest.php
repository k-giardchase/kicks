<?php

    $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    /**
   * @backupGlobals disabled
   * $backupStaticAttribute disabled
   */

   require_once 'src/Store.php';

   class BrandTest extends PHPUnit_Framework_TestCase
   {
       
   }
?>
