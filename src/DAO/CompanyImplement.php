<?php
namespace Danie\Rack\DAO;

use Danie\Rack\Database\Database;
use Danie\Rack\Models\Company;

class CompanyImplement {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findAll() {
        $query = "SELECT * FROM companies";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        $companies = [];
        while ($row = $stmt->fetch()){
            $companies[] = new Company($row['id'], $row['name'], $row['contact_info']);
        }
        return $companies;
    }

    public function create(string $name, string $contact_info){
        $query = "INSERT INTO companies (name, contact_info) VALUES (:name, :contact_info)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contact_info', $contact_info);
        $stmt->execute();
    }

    public function delete (int $id) {
        $query = "DELETE FROM companies c where c.id = :id"; //Estandar de seguridad.
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function update( int $id, string $name, string $contact_info) {
        $query = "UPDATE companies set name = :name, contact_info = :contact_info where id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contact_info', $contact_info);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}