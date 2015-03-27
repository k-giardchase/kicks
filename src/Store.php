<?php

    class Store
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO stores (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE store_id = {$this->getId()};");
        }

        static function find($search_id)
        {
            $found_store = null;
            $all_stores = Store::getAll();
            foreach($all_stores as $store){
                $store_id = $store->getId();
                if($store_id == $search_id){
                    $found_store = $store;
                }
            }
            return $found_store;
        }

        static function getAll()
        {
            $query = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $returned_stores = $query->fetchAll(PDO::FETCH_ASSOC);

            $stores = array();
            foreach($returned_stores as $store){
                $name = $store['name'];
                $id = $store['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores *;");
        }

        function addBrand($new_brand)
        {
            $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$new_brand->getId()});");
        }

        function getBrands()
        {
            $query = $GLOBALS['DB']->query("SELECT brands.* FROM stores JOIN stores_brands ON (stores.id = stores_brands.store_id) JOIN brands ON (stores_brands.brand_id = brands.id) WHERE stores.id = {$this->getId()};");
           $returned_brands = $query->fetchAll(PDO::FETCH_ASSOC);
               $brands = array();
               foreach($returned_brands as $returned_brand) {
               $brand_name = $returned_brand['brand_name'];
               $id = $returned_brand['id'];
               $new_brand = new brand($brand_name, $id);
               array_push($brands, $new_brand);
           }
           return $brands;
       }

    }

?>
