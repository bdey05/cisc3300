<?php

namespace app\models;

class Product extends Model {

    public function getAllProductsByName($name) {
        $query = "select product_name, product_price, product_version from products WHERE product_name like :name";
        return $this->query($query, [
            'name' => '%' . $name . '%'
        ]);
    }

    public function getAllProducts() {
        $query = "select * from products";
        return $this->query($query);
    }

    public function getProductById($product_id){
        $query = "select * from products where product_id = :product_id";
        return $this->query($query, ['product_id' => $product_id]);
    }

    public function saveProduct($inputData){
        $query = "insert into products (product_name, product_desc, product_price, product_version) values (:product_name, :product_desc, :product_price, :product_version);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData){
        $query = "update products set product_name = :product_name, product_desc = :product_desc, product_price = :product_price, product_version = :product_version where product_id = :product_id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData){
        $query = "DELETE FROM products where product_id = :product_id";
        return $this->query($query, $inputData);
    }
}