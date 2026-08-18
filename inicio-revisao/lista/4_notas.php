<?php

$notas = [7.5, 4.0, 9.5, 10, 5.5];


// Exibindo os valores com laço
foreach ($notas as $indice => $nota) {
    echo "Posição $indice: $nota <br>";
}

$media = array_sum($notas) / count($notas);
echo "A média das notas é: $media";


    