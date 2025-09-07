<?php

require_once 'Product.php';

class Cart
{
    private const DISCOUNT10 = 0.10;
    private array $products = [];
    private array $cart = [];

    public function addProductToStock(Product $product): void
    {
        $this->products[$product->getId()] = [
            'id_product' => $product->getId(),
            'name'      => $product->getName(),
            'price'     => $product->getPrice(),
            'amount'    => $product->getStock()
        ];
    }

    public function addProductToCart(int $id_product, int $quantity): void
    {
        if (!isset($this->products[$id_product])) {
            echo "Produto não existe no estoque<br>";
            return;
        }

        if ($this->products[$id_product]['amount'] < $quantity) {
            echo "{$this->products[$id_product]['name']} sem estoque suficiente<br>";
            return;
        }

        if (isset($this->cart[$id_product])) {
            $this->cart[$id_product]['quantity'] += $quantity;
        } else {
            $this->cart[$id_product] = [
                'id_product' => $id_product,
                'quantity'   => 0,
                'subtotal'   => 0
            ];
            $this->cart[$id_product]['quantity'] = $quantity;
        }

        $this->cart[$id_product]['subtotal'] = $this->cart[$id_product]['quantity'] * $this->products[$id_product]['price'];
        $this->products[$id_product]['amount'] -= $quantity;

        echo "{$this->products[$id_product]['name']} adicionado ao carrinho ({$quantity})<br>";
        return;
    }

    public function removeProductFromCart(int $id_product, int $quantity): void
    {
        if (!isset($this->cart[$id_product])) {
            echo "Produto não está no carrinho<br>";
            return;
        } elseif ($this->cart[$id_product]['quantity'] < $quantity) {
            echo "A quantidade de {$this->products[$id_product]['name']} deve ser menor ou igual a quantidade do no carrinho<br>";
            return;
        }

        $this->cart[$id_product]['quantity'] -= $quantity;

        if ($this->cart[$id_product]['quantity'] <= 0) {
            unset($this->cart[$id_product]);
        } else {
            $this->cart[$id_product]['subtotal'] = $this->cart[$id_product]['quantity'] * $this->products[$id_product]['price'];
        }

        $this->products[$id_product]['amount'] += $quantity;

        echo "{$this->products[$id_product]['name']} removido do carrinho ({$quantity})<br>";
        return;
    }

    public function listCart(): void
    {
        foreach ($this->cart as $item) {
            echo "ID: {$item['id_product']} - Quantidade: {$item['quantity']} - Subtotal: R$"
                . number_format($item['subtotal'], 2, ',', '.')
                . "<br>";
        }
    }

    public function calculateTotal(bool $applyDiscount = false): void
    {
        $total = array_sum(array_column($this->cart, 'subtotal'));

        if ($applyDiscount) {
            $total -= $total * self::DISCOUNT10;
            echo "Total do carrinho: R$" . number_format($total, 2, ',', '.') . " com desconto" . "<br>";
            return;
        }

        echo "Total do carrinho: R$" . number_format($total, 2, ',', '.') . "<br>";
    }
}
?>
