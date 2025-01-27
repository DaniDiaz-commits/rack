<?php

namespace Danie\Rack\Controllers;

use Danie\Rack\DAO\CompanyImplement;

class CompanyController extends Controller 
{
    public function index() {
        $companyImplement = new CompanyImplement();
        $companies = $companyImplement->findAll();
        echo $this->twig->render('company/index.html.twig', compact("companies"));
    }

    public function add() {
        $companyImplement = new CompanyImplement();
        $name = $_POST['name'];
        $email = $_POST['contact_info'];

        $companyImplement->create($name, $email);
        
        header('Location: /company');
    }

    public function delete(int $id) {
        $companyImplement = new CompanyImplement();
        $companyImplement->delete($id);

        header('Location: /company');
    }

    public function edit (int $id) {
        $companyImplement = new CompanyImplement();
        $companies = $companyImplement->findAll();
        $editCompany = $companies[array_search($id, array_map(fn($company) => $company->getId(), $companies))];
        echo $this->twig->render('company/index.html.twig', compact("companies", 'editCompany'));
    }

    public function update (int $id) {
        $companyImplement = new CompanyImplement();
        $name = $_POST['name'];
        $email = $_POST['contact_info'];

        $companyImplement->update($id, $name, $email);
        header('Location: /company');
    }
}