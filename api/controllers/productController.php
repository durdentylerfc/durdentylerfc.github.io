<?php
require_once __DIR__ . '/../utils/Response.php';

class ProductController {
    public function getProducts() {
        $products = [
            ['id' => 1, 'name' => 'Laptop'],
            ['id' => 2, 'name' => 'Phone']
        ];
        Response::json(['status' => 'success', 'data' => $products]);
    }
}