<?php



// Solicitando ao usuário que insira o peso e a altura
$peso = readline("Digite o peso em kg: ");
$altura = readline("Digite a altura em metros: ");

function calcularIMC(float $peso, float $altura): float {
    return $peso / ($altura ** 2);
}

// Calculando o IMC
$resultado = calcularIMC($peso, $altura);
echo "O resultado do IMC é: $resultado" . "<br>";

if ($resultado < 18.5) {
    echo " - Abaixo do peso";
} elseif ($resultado >= 18.5 && $resultado < 24.9) {
    echo " - Peso normal";
} elseif ($resultado >= 25 && $resultado < 29.9) {
    echo " - Sobrepeso";
} elseif ($resultado >= 30 && $resultado < 34.9) {
    echo " - Obesidade grau I";
} elseif ($resultado >= 35 && $resultado < 39.9) {
    echo " - Obesidade grau II";
} else {
    echo " - Obesidade grau III";
}