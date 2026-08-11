<?php

// Função simples com retorno

function somar(float $a, float $b): float {
    return $a + $b;
}

// Exibindo resultado
echo somar (8, 15.6);
echo "<br>";

// Procedimento (Função sem retorno)

function saudacao($nome = "Aluno") {
    echo "Olá, $nome! Bem-vindo ao PHP.
    <br>";
}

// Exibindo procedimento
saudacao();
saudacao("Maria");

// Outro procedimento
function  mostrarlinha ()