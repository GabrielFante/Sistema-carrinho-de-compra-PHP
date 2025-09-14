# Sistema de Carrinho de Compras 

Projeto feito em **PHP** para treinar os princípios **KISS (Keep It Simple, Stupid)** e **DRY (Don't Repeat Yourself)**.  
A ideia foi construir um sistema simples de carrinho de compras, mas já aplicando boas práticas de organização do código.

---

# Participantes
- Gabriel Fante Javarotti  (RA: 1990554)
- João Pedro Pereira Guerra  (RA:2006484)

---

## Estrutura de Pastas

```bash
C:\xampp\htdocs\Sistema-carrinho-de-compra-PHP-main\
│
├── Cart.php        # Lógica do carrinho de compras
├── index.php       # Página inicial
├── Product.php     # Classe Produto
└── README.md       # Documentação do projeto
```

---
## Funcionalidades Aplicadas

- Adicionar produtos ao carrinho
- Remover produtos do carrinho
- Listar produtos que estão no carrinho
- Calcular o total da compra
- Aplicar desconto
  
---

## Objetivos do Projeto

- Praticar a aplicação dos princípios **KISS** e **DRY** no código
- Criar um exemplo funcional de carrinho de compras em PHP
- Organizar o projeto de forma clara e reutilizável

---

## Tecnologias Utilizadas

- PHP 8+
- XAMPP Control Panel
---

## Como rodar o projeto

1. Clone o repositório
2. Abra o armazenamento local -> xampp -> htdocs
3. Cole o clone do repositório dentro do htdocs
4. Abra no navegador: `http://127.0.0.1/Sistema-carrinho-de-compra-PHP-main/index.php`

---

## Exemplos de Uso (Casos de Teste)

```php
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
```





