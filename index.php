<?php

require_once 'Product.php';
require_once 'Cart.php';

$cart = new Cart();

$notebook = new Product(1, "Notebook", 3000, 5);
$mouse = new Product(2, "Mouse", 100, 10);
$teclado = new Product(3, "Teclado", 200, 5);

$cart->addProductToStock($notebook);
$cart->addProductToStock($mouse);
$cart->addProductToStock($teclado);

echo "<h3>Caso 1: Adicionar produto válido</h3>";
$cart->addProductToCart(1, 2);
$cart->listCart();

echo "<h3>Caso 2: Adicionar além do estoque</h3>";
$cart->addProductToCart(3, 10);
$cart->listCart();

echo "<h3>Caso 3: Remover produto do carrinho</h3>";
$cart->addProductToCart(2, 1);
$cart->removeProductFromCart(2, 2);
$cart->addProductToCart(2, 3);
$cart->listCart();
$cart->removeProductFromCart(2, 2);
$cart->listCart();
$cart->calculateTotal(false);

echo "<h3>Caso 4: Aplicar cupom de desconto</h3>";
$cart->listCart();
$cart->calculateTotal(true);