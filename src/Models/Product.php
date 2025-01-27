<?php
namespace Danie\Rack\Models;

class Product {
    private INT $id;
    private string $name;
    private float $precio;

    public function __construct(int $id, string $name, float $precio) {
        $this->id = $id;
        $this->name = $name;
        $this->precio = $precio;
    }

    public function getId(): int{
        return $this->id;
    }
    
    public function getName(): string{
        return $this->name;
    }

    public function getPrice(): float{
        return $this->precio;
    }
}