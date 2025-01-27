<?php
namespace Danie\Rack\DAO;

use Danie\Rack\Database\Database;
use Danie\Rack\Models\Product;

class ProductImplement {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findAll() {
        $query = "SELECT * FROM products";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $products = [];
        while ($row = $stmt->fetch()){
            $products[] = new Product($row['id'], $row['name'], $row['price']);
        }
        return $products;
    }

    public function create(string $name, float $price){
        $query = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }

    public function delete (int $id) {
        $query = "DELETE FROM products c where c.id = :id"; //Estandar de seguridad.
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function update( int $id, string $name, float $price) {
        $query = "UPDATE products set name = :name, price = :price where id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }
}