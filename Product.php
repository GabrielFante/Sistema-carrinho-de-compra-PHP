<?php

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(int $id, string $name, float $price, int $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getId(): void {
        $this->id = $id;
    }

    public function setId(int $id): int{
        if ($id < 0 or !$id) {
            return "Id deve ser positivo!";
        }
        return $id;
    }

    public function getName(): void {
        $this->name = $name;
    }

    public function setName(string $name): string {
        if (!$name or $name < 2) {
            return "O nome deve ser maior que 2 digitos";
        }
        return $name;
    }

    public function getPrice(): void{
        $this->price = $price;
    }

    public function setPrice(float $price): float {
        if (!$price or $price < 0) {
            return "O preço deve ser maior do que 0";
        }
        return $price;
    }

    public function getStock(): void {
        $this->stock = $stock;
    }

    public function setStock(int $stock): int {
        if (!$stock or $stock < 0) {
            return "O Estoque deve ser maior que 0";
        }
        return $stock;
    }
}
?>
