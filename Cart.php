<?php

require_once 'Product.php';

class Cart
{
    private const DISCOUNT10 = 0.10;
    private array $cart = [];

    //Cria função de buscar item
    private function findItem(Product $product): ?int
    {
        foreach ($this->cart as $index => $cartItem) {
            if($cartItem['product']->getId() === $product->getid()){
                return $index;
            }
        }
        return null;
    }

    //adicionar produto no carrinho
    public function addProduct(Product $product) 
    {
        if ($product->getStock() < $quantity){
            echo "Estoque insuficiente do produto {$product->getNome()}";
            return;
        }

        $index = $this->findItem($product);

    }

    //remover produto do carrinho
    public function removeProduct(Product $product) {
        
    }

    //listar itens de dentro do carrinho
    public function listCart() {
        
    }

    //Calcular o valor total do carrinho
    public function calculateTotal() {
        
    }

    //adicionar o cupom de desconto ao total do carrinho
    public function addDiscount() {

    }

}
?>
