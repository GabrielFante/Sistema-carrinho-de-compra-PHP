<?php

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(int $id, string $name, float $price, int $stock) {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
        $this->setStock($stock);
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        if ($id <= 0) {
            throw new InvalidArgumentException("Id deve ser positivo!");
        }
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        if (strlen($name) < 2) {
            throw new InvalidArgumentException("O nome deve ter pelo menos 2 caracteres");
        }
        $this->name = $name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        if ($price <= 0) {
            throw new InvalidArgumentException("O preço deve ser maior que 0");
        }
        $this->price = $price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function setStock(int $stock): void {
        if ($stock < 0) {
            throw new InvalidArgumentException("O estoque deve ser maior ou igual a 0");
        }
        $this->stock = $stock;
    }
}
?>
