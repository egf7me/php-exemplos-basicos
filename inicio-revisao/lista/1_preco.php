<?php

// Ler o preço do produto e a quantidade comprada
$preco = (float) readline("Digite o preço do produto: ");
$quantidade = (int) readline("Digite a quantidade desejada: ");

if ($preco * $quantidade >= 200) {
    $desconto = 0.10; // 10% de desconto
    $preco_final = $preco * $quantidade * (1 - $desconto);
    echo "Preço final (Acima de 200R$): R$ '$preco_final'";
} else {
    $preco_final = $preco * $quantidade;
    echo "Preço final: R$ '$preco_final'";
}
