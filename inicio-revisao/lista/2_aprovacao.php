<?php

$media = (float) readline("Digite a média do aluno: ");
$faltas = (int) readline("Digite o número de faltas do aluno: (Em porcentagem) ");

if ($media > 10 || $media < 0 || $faltas < 0 || $faltas > 100) {
    echo "Valores inválidos. A média deve estar entre 0 e 10, e as faltas entre 0% e 100%.";
    exit;
}

if ($media >= 6.0 && $faltas <= 15) {
    echo "Aprovado";
} else {
    echo "Reprovado";
}