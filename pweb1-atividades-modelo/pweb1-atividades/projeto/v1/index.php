<?php
// =====================================================================
// Projeto integrador v1: Perfil do Estudante
// Siga os requisitos do enunciado. Mantenha esta ordem:
// toda a lógica em PHP no topo, e o HTML só depois.
// =====================================================================

// 1. Dados do perfil (R2)
//    Crie o array $perfil e o array $projetos.

$perfil = [
  'nome'=> 'Fernando',
  'curso' => 'ADS',
  'campus' => 'IFCE',
  'cidade' => 'Boa viagem',
  'apresentacao' => 'Sou Fernando e blablabla',
  'Habilidade 1' =>[ 'Platinei Dark souls',
  'HTML & CSS',
  'Git & Gituhub',
  'REACT',
  'Tecnico em informática'

  ]
];

$projetos = [
1 => [
'titulo' => 'Calculadora de média',
'descricao' => 'Calcula a média de duas notas recebidas pela URL.',
'tecnologias' => 'PHP, HTML',
],

2 => [
'titulo' => 'Calculadora de média',
'descricao' => 'Calcula a média de duas notas recebidas pela URL.',
'tecnologias' => 'PHP, HTML',
],

3 => [
'titulo' => 'Calculadora de média',
'descricao' => 'Calcula a média de duas notas recebidas pela URL.',
'tecnologias' => 'PHP, HTML',
],
];

// 2. Tema claro ou escuro (R5 e R6)
//    Leia o tema da URL ou do cookie, valide e grave o cookie.

// 3. Rota JSON (R7)
//    Se a URL tiver ?formato=json, envie o cabeçalho, o JSON e encerre com exit.

// 4. Qual página mostrar (R3 e R4)
//    Leia ?pagina= e decida o conteúdo com if/elseif. Página inexistente: 404.

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meu perfil</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <header class="cabecalho">
  <nav class="navbar">

    <a>Inicio</a>
    <a>Habilidades</a>
    <a>Projetos</a>

  </nav>
  </header>

  <main>
    <div class="card_apresentação">

    </div>
  </main>
  <footer>
  </footer>

  <!-- 6. Conteúdo da página escolhida (R3 e R4) -->

  <!-- 7. Rodapé (R8) -->
</body>
</html>
