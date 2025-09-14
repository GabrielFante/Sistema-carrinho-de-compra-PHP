# Sistema de Carrinho de Compras 

Projeto feito em **PHP** para treinar os princípios **KISS (Keep It Simple, Stupid)** e **DRY (Don't Repeat Yourself)**.  
A ideia foi construir um sistema simples de carrinho de compras, mas já aplicando boas práticas de organização do código.

---

## Funcionalidades Aplicadas

- Adicionar produtos ao carrinho
- Remover produtos do carrinho
- Listar produtos que estão no carrinho
- Calcular o total da compra

---

## Objetivos do Projeto

- Praticar a aplicação dos princípios **KISS** e **DRY** no código
- Criar um exemplo funcional de carrinho de compras em PHP
- Organizar o projeto de forma clara e reutilizável

---

## Tecnologias Utilizadas

- PHP 8+

---

## Como rodar o projeto

1. Clone o repositório
2. Coloque os arquivos em um servidor local(XAMPP)
3. Abra no navegador: `http://127.0.0.1/Sistema-carrinho-de-compra-PHP-main/index.php`

---

## Exemplos de Uso (Casos de Teste)

```php
require_once "Product.php";
require_once "Cart.php";

// Criando alguns produtos
$p1 = new Product("Camisa", 50);
$p2 = new Product("Calça", 100);
$p3 = new Product("Tênis", 200);

// Criando o carrinho
$cart = new Cart();

// Adicionando produtos
$cart->addProduct($p1);
$cart->addProduct($p2);
$cart->addProduct($p3);

// Listando produtos
print_r($cart->getProducts());

// Removendo um produto
$cart->removeProduct("Calça");

// Listando produtos após remoção
print_r($cart->getProducts());

// Total da compra
echo "Total: R$ " . $cart->getTotal();
```

