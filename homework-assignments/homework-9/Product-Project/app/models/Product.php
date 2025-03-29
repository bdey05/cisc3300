<?php

namespace app\models;

class Product extends Model {

    public function getProducts($name) {
        if ($name) {
            $query = "select * from products WHERE product_name like :name";
            return $this->fetchAllWithParams($query, ['name' => '%' . $name . '%']);
        }
        $query = "select * from products";
        return $this->fetchAll($query);
    }

    public function getProductById($id){
        $query = "select * from products where product_id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}