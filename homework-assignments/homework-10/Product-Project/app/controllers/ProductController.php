<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
    public function validateProduct($inputData) {
        $errors = [];
        $productName = $inputData['product_name'];
        $productDesc = $inputData['product_desc'];
        $productPrice = $inputData['product_price'];
        $productVersion = $inputData['product_version'];

        if ($productName) {
            $productName = htmlspecialchars($productName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($productName) < 2) {
                $errors['productNameShort'] = 'Product name must be greater than 2 characters';
            }
        } else {
            $errors['productNameRequired'] = 'Product name is required';
        }

        if ($productDesc) {
            $productDesc = htmlspecialchars($productDesc, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($productDesc) < 10) {
                $errors['productDescShort'] = 'Product description must be greater than 10 characters';
            }
        } else {
            $errors['productDescRequired'] = 'Product description is required';
        }

        if ($productPrice) {
            $price = (float) $productPrice;
            if ($price < 0) {
                $errors['productPriceInvalid'] = 'Product price must be greater than 0.';
            }
        } else {
            $errors['productPriceRequired'] = 'Product price is required';
        }

        if ($productVersion) {
            $productVersion = htmlspecialchars($productVersion, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($productVersion) <= 4) {
                $errors['productVersionShort'] = 'Product description must be at least 5 characters';
            }
        } else {
            $errors['productVersionRequired'] = 'Product version is required';
        }


        if ($errors) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'product_name' => $productName,
            'product_desc' => $productDesc,
            'product_price' => $productPrice,
            'product_version' => $productVersion,
        ];
    }

    public function getAllProducts() {
        $productModel = new Product();
        header("Content-Type: application/json");
        $products = $productModel->getAllProducts();

        echo json_encode($products);
        exit();
    }

    public function getProductByID($product_id) {
        $productModel = new Product();
        header("Content-Type: application/json");
        $product = $productModel->getProductById($product_id);
        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'product_name' => $_POST['product_name'] ?: null,
            'product_desc' => $_POST['product_desc'] ?: null,
            'product_price' => $_POST['product_price'] ?: null,
            'product_version' => $_POST['product_version'] ?: null
        ];
        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct(
            [
                'product_name' => $productData['product_name'],
                'product_desc' => $productData['product_desc'],
                'product_price' => $productData['product_price'],
                'product_version' => $productData['product_version']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateProduct($product_id) {
        if (!$product_id) {
            http_response_code(404);
            exit();
        }
        
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'product_name' => $_PUT['product_name'] ?: null,
            'product_desc' => $_PUT['product_desc'] ?: null,
            'product_price' => $_PUT['product_price'] ?: null,
            'product_version' => $_PUT['product_version'] ?: null
        ];

        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->updateProduct(
            [
                'product_id' => $product_id,
                'product_name' => $productData['product_name'],
                'product_desc' => $productData['product_desc'],
                'product_price' => $productData['product_price'],
                'product_version' => $productData['product_version']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteProduct($product_id) {
        if (!$product_id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(
            [
                'product_id' => $product_id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function homeView() {
        include './app/views/home-view.html';
        exit();
    }
    public function productsView() {
        include './app/views/product/products-view.html';
        exit();
    }

    public function productDetailsView() {
        include './app/views/product/products-details.html';
        exit();
    }

    public function productsAddView() {
        include './app/views/product/products-add.html';
        exit();
    }

    public function productsDeleteView() {
        include './app/views/product/products-delete.html';
        exit();
    }

    public function productsUpdateView() {
        include './app/views/product/products-update.html';
        exit();
    }

}