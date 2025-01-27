<?php

namespace Danie\Rack\Controllers;

use Danie\Rack\DAO\ProductImplement;

class ProductController extends Controller {
    public function index() {
        $productImplement = new ProductImplement();
        $products = $productImplement->findAll();
        echo $this->twig->render('product/index.html.twig', compact("products"));
    }

    public function add() {
        $productImplement = new ProductImplement();
        $name = $_POST['name'];
        $price = $_POST['price'];

        $productImplement->create($name, $price);
        
        header('Location: /product');
    }

    public function delete(int $id) {
        $productImplement = new ProductImplement();
        $productImplement->delete($id);

        header('Location: /product');
    }

    public function edit (int $id) {
        $productImplement = new ProductImplement();
        $products = $productImplement->findAll();
        $editProduct = $products[array_search($id, array_map(fn($product) => $product->getId(), $products))];
        echo $this->twig->render('product/index.html.twig', compact("products", 'editProduct'));
    }
    public function update (int $id) {
        $productImplement = new ProductImplement();
        $name = $_POST['name'];
        $price = $_POST['price'];

        $productImplement->update($id, $name, $price);
        header('Location: /product');
    }
}