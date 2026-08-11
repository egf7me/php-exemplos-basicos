<?php

// Vetor (array simples - "1 linha")
$frutas = ["Maçã", "Banana", "Uva"];

// Exibindo os valores com laço
foreach ($frutas as $indice => $fruta) {
    echo "Posição $indice: $fruta <br>";
}

// Array (Linhas e Colunas)

$matriz = [
    ["Max Verstappen", "Oscar Piastri", "Lando Norris"],
    ["Lewis Hamilton", "George Russell", "Valtteri Bottas"],
    ["Charles Leclerc", "Carlos Sainz", "Sergio Pérez"]
];

echo "<br><br>";
echo "Lista de pilotos de F1 (Dica: O 1º é o melhor.) <br><br>";

// Exibindo os valores da matriz

foreach ($matriz as $linha) {
    foreach ($linha as $piloto) {
        echo $piloto . " | ";
    }
    echo "<br>";
}