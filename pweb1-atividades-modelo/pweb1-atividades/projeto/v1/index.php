<?php
// =====================================================================
// Projeto integrador v1: Perfil do Estudante
// Siga os requisitos do enunciado. Mantenha esta ordem:
// toda a lógica em PHP no topo, e o HTML só depois.
// =====================================================================

// 1. Dados do perfil (R2)
//    Crie o array $perfil e o array $projetos.

$pagina = $_GET['pagina'] ?? 'inicio';



$perfil = [
  'nome'=> 'Fernando Everson Ferreira Cavalcante',
  'curso' => 'Análise e Desenvolvimento de Sistemas',
  'campus' => 'IFCE',
  'cidade' => 'Boa viagem',
  'apresentacao' => 'Olá! Meu nome é Fernando Everson Ferreira Cavalcante e sou estudante do 4º semestre do curso de Análise e Desenvolvimento de Sistemas (ADS) no IFCE - Campus Boa Viagem. Tenho paixão por tecnologia e foco em desenvolvimento de software, buscando sempre aprimorar minhas habilidades em programação, estrutura de dados e criação de soluções web eficientes. Estou constantemente explorando novas ferramentas e práticas para construir aplicações funcionais, modernas e bem estruturadas.',
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

    <a href="index.php?pagina=inicio">Inicio</a>
    <a href="index.php?pagina=habilidades">Habilidades</a>
    <a href="index.php?pagina=projetos">Projetos</a>

  </nav>
  </header>

  <main>
<?php if($pagina === 'inicio'): ?>

    <section class="card_apresentacao">
        <h2 class="titulo_card">Olá, eu sou Fernando </h2>
        <div class="card_apresentacao_1">
<img src="/img/eu.jpeg" class="imagem_apresentacao" alt="Foto de perfil ">     
        <dl class="texto_apresentacao">
    
    <dd>Nome:<?= $perfil['nome'] ?></dd>
    <dd>Curso: <?= $perfil['curso'] ?></dd>
    <dd>Campus: <?= $perfil['campus'] ?></dd>
    <dd>Cidade: <?= $perfil['cidade'] ?></dd>
  </dl>
        </div>
        <div class="card_apresetacao_2" >
          <p class="texto_apresentacao_2"><?=  $perfil['apresentacao'] ?></p>
        </div>
</section>

<?php elseif($pagina === 'habilidades'): ?>
  <section>
    <h1>Sou uma hibilidadde buuuuuuuuuuuuuuu</h1>
  </section>

  <?php elseif($pagina === 'projetos'): ?>
  <section>
    <h1>Sou uma projeto buuuuuuuuuuuuuuu</h1>
  </section>

  <?php else: ?>
    <h1> A página que você buscou não existe</h1>
    <a href="index.php?pagina=inicio">Voltar para a pagina inicial</a>

    <?php endif; ?>
  </main>
  <footer>
  </footer>

  <!-- 6. Conteúdo da página escolhida (R3 e R4) -->

  <!-- 7. Rodapé (R8) -->
</body>
</html>
