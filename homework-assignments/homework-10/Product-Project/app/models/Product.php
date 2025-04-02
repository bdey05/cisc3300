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

    public function getProductById($id){
        $query = "select * from products where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveProduct($inputData){
        $query = "insert into products (product_name, product_desc, product_price, product_version) values (:product_name, :product_desc, :product_price, :product_version);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData){
        $query = "update products set product_name = :product_name, product_desc = :product_desc, product_price = :product_price, product_version = :product_version where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData){
        $query = "DELETE FROM products where id = :id";
        return $this->query($query, $inputData);
    }
}