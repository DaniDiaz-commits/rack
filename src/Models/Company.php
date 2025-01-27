<?php
namespace Danie\Rack\Models;

class Company {
    private INT $id;
    private string $name;
    private string $contact_info;

    public function __construct(int $id, string $name, string $contact_info) {
        $this->id = $id;
        $this->name = $name;
        $this->contact_info = $contact_info;
    }

    public function getId(): int{
        return $this->id;
    }
    
    public function getName(): string{
        return $this->name;
    }

    public function getContactInfo(): string{
        return $this->contact_info;
    }
}