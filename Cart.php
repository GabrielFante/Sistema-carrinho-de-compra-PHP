<?php

require_once 'Product.php';

class Cart
{
    private const DISCOUNT10 = 0.10;
    private array $products = [];
    private array $cart = [];

    private function updateSubtotal(int $id_product)
    {
        $this->cart[$id_product]['subtotal'] = 
            $this->cart[$id_product]['quantity'] * $this->products[$id_product]['price'];
    }

    private function printMessage(string $message)
    {
        echo $message . "<br>";
    }

    public function addProductToStock(Product $product)
    {
        $this->products[$product->getId()] = [
            'id_product' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'amount' => $product->getStock()
        ];
    }

    public function addProductToCart(int $id_product, int $quantity = 1)
    {
        if (!isset($this->products[$id_product])) {
            $this->printMessage("Produto não existe no estoque");
            return;
        }

        if ($this->products[$id_product]['amount'] < $quantity) {
            $this->printMessage("{$this->products[$id_product]['name']} sem estoque suficiente");
            return;
        }

        if (isset($this->cart[$id_product])) {
            $this->cart[$id_product]['quantity'] += $quantity;
        } else {
            $this->cart[$id_product] = [
                'id_product' => $id_product,
                'quantity' => $quantity,
                'subtotal' => 0
            ];
        }

        $this->updateSubtotal($id_product);
        $this->products[$id_product]['amount'] -= $quantity;
        $this->printMessage("{$this->products[$id_product]['name']} adicionado ao carrinho ({$quantity})");
    }

    public function removeProductFromCart(int $id_product, int $quantity = 1)
    {
        if (!isset($this->cart[$id_product])) {
            $this->printMessage("Produto não está no carrinho");
            return;
        }

        $this->cart[$id_product]['quantity'] -= $quantity;

        if ($this->cart[$id_product]['quantity'] <= 0) {
            unset($this->cart[$id_product]);
        } else {
            $this->updateSubtotal($id_product);
        }

        $this->products[$id_product]['amount'] += $quantity;
        $this->printMessage("{$this->products[$id_product]['name']} removido do carrinho ({$quantity})");
    }

    public function listCart()
    {
        foreach ($this->cart as $item) {
            echo "ID: {$item['id_product']} - Quantidade: {$item['quantity']} - Subtotal: R$" 
                . number_format($item['subtotal'], 2, ',', '.') . "<br>";
        }
    }

    public function calculateTotal(bool $applyDiscount = false)
    {
        $total = array_reduce($this->cart, fn($carry, $item) => $carry + $item['subtotal'], 0);

        if ($applyDiscount) {
            $total -= $total * self::DISCOUNT10;
        }

        echo "Total do carrinho: R$" . number_format($total, 2, ',', '.') . "<br>";
    }
}
?>
