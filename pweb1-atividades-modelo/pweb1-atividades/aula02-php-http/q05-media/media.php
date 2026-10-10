<?php
const MEDIA_APROVACAO = 7;

$n1 = filter_input(INPUT_GET, 'n1', FILTER_VALIDATE_FLOAT) ?: 0;
$n2 = filter_input(INPUT_GET, 'n2', FILTER_VALIDATE_FLOAT) ?: 0;
$media = ($n1 + $n2) / 2;
$situacao = $media >= MEDIA_APROVACAO ? "Aprovado" : "Em recuperação";
?>
<p>Notas: <?= $n1 ?> e <?= $n2 ?></p>
<p>Média: <?= $media ?></p>
<p>Situação: <?= $situacao ?></p>
