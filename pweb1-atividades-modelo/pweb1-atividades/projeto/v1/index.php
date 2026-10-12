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
  ];

  $habilidades = [
    1 => [
      'icone' => 'img/html.png',
      'titulo' => 'HTML'
    ],
    2 => [
      'icone' => 'img/css.png',
      'titulo' => 'CSS'
    ],
    3 => [
      'icone' => 'img/js.webp',
      'titulo' => 'JavaScript'
    ],
     4 => [
      'icone' => 'img/c.png',
      'titulo' => 'C'
    ],
    5 => [
      'icone' => 'img/react.png',
      'titulo' => 'React'
    ],
   
  ];

  $total = count($habilidades);

 $lista_habilidades = implode(", ", array_column($habilidades, 'titulo'));

$projetos = [
1 => [
'icone' => 'img/ler+.png',
'titulo' => 'Ler+',
'descricao' => 'Curadoria literária nacional que apresenta livros, autores, periodos literarios, editoras e premiações voltados a literatura brasileira',
'tecnologias' => 'HTML, CSS, JavaScript',
],

2 => [
'icone' => 'img/gt.svg',
'titulo' => 'Gerenciador de Tarefas',
'descricao' => 'Gerenciador de tarefas, projeto feito como introdução a React que permite o usuario adicionar tarefas, excluir e marcar como conluida ',
'tecnologias' => 'HTML, CSS, JavaScript, React',
],

3 => [
'icone' => 'img/empessoa.webp',
'titulo' => 'EmPessoa',
'descricao' => 'Acervo reune as obras de Fernando Pessoa e que conta parte da sua história, projeto feito para principalmente consolidar meus conhecimentos em React',
'tecnologias' => 'HTML, CSS, JavaScript, React',
],
];

$tema = $_GET['tema'] ?? $_COOKIE['escuro'] ?? 'claro';

if (!in_array($tema, ['claro', 'escuro'])){
  $tema = 'tema';
}
if (isset($_GET['tema'])){
  setcookie('tema', $tema, time()  + (86400*30), "/");
}

$proximo_tema = ($tema === 'claro') ? 'escuro' : 'claro';



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
<body class="tema-<?= htmlspecialchars($tema) ?>">
  <header class="cabecalho">
  <nav class="navbar">

    <a href="index.php?pagina=inicio" class="<?= ($pagina === 'inicio') ? 'nav_ativo': '' ?>">Inicio</a>
    <a href="index.php?pagina=habilidades" class="<?= ($pagina === 'habilidades') ? 'nav_ativo': '' ?>">Habilidades</a>
    <a href="index.php?pagina=projetos" class="<?= ($pagina === 'projetos')? 'nav_ativo': '' ?>">Projetos</a>

    <a href="index.php?pagina=<?=  htmlspecialchars($pagina) ?>&tema=<?= $proximo_tema  ?>" class="botao_tema">Trocar Tema</a>
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


<!--pagina Habilidades ==================================================================-->
<?php elseif($pagina === 'habilidades'): ?>
  <section class="habilidades">
    <div class="titulo_habilidades">
    <h1>As minhas <?= $total ?> principais habilidades são: </h1>
    <p><?= $lista_habilidades ?></p>
    </div>

    <div class="cards_habilidades">
      <?php foreach($habilidades as $habilidade): ?>
        <div class="card_habilidade_pequeno">
          <img src="<?=$habilidade['icone']?>" class="img_habilidades"> 
          <p><?= $habilidade['titulo'] ?></p>
        </div>
        <?php endforeach ?>
    </div>
  </section>


  <!--pagina projetos ==================================================================-->

  <?php elseif($pagina === 'projetos'): ?>
  <section>
    <div class="titulo_projetos">
    <h1>Meus Projetos </h1>
   
    </div>

    <div class="cards_projetos">
      <?php foreach($projetos as $projeto): ?>
        <div class="card_projeto_pequeno">
          <img src="<?=$projeto['icone']?>" class="img_projetos"> 
          <div class="card_projeto_texto">
          <h2><?= $projeto['titulo'] ?></h2>
          <p><?=  $projeto['descricao']?></p>
          <p><?= $projeto['tecnologias'] ?></p>
          </div>
        </div>
        <?php endforeach ?>
    </div>
  </section>


  <!--pagina perdida ==================================================================-->

  <?php else: ?>
    <h1> A página que você buscou não existe</h1>
    <a href="index.php?pagina=inicio">Voltar para a pagina inicial</a>

    <?php endif; ?>
  </main>


  <footer class="rodape">
    <p>Tema atual: <strong><?= ucfirst(htmlspecialchars($tema)) ?></strong></p>
    <p><a target="_blank">Ver dados em formato JSON</a></p>
    <p>&copy; <?= date('Y') ?> - <?= htmlspecialchars($perfil['nome']) ?></p>
  </footer>

</body>
</html>
