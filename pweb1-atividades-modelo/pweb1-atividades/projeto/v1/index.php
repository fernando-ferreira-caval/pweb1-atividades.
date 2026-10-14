<?php
// =====================================================================
// Projeto integrador v1: Perfil do Estudante
// Siga os requisitos do enunciado. Mantenha esta ordem:
// toda a lógica em PHP no topo, e o HTML só depois.
// =====================================================================

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

$perfil = [
  'nome'=> 'Fernando Everson Ferreira Cavalcante',
  'curso' => 'Análise e Desenvolvimento de Sistemas',
  'campus' => 'IFCE',
  'cidade' => 'Boa viagem',
  'apresentacao' => 'Olá! Meu nome é Fernando Everson Ferreira Cavalcante e sou estudante do 4º semestre do curso de Análise e Desenvolvimento de Sistemas (ADS) no IFCE - Campus Boa Viagem. Tenho paixão por tecnologia e foco em desenvolvimento de software, buscando sempre aprimorar minhas habilidades em programação, estrutura de dados e criação de soluções web eficientes. Estou constantemente explorando novas ferramentas e práticas para construir aplicações funcionais, modernas e bem estruturadas.',
  'habilidades' => array_column($habilidades, 'titulo')
  ];


$projetos = [
1 => [
'icone' => 'img/ler+.png',
'titulo' => 'Ler+',
'descricao' => 'Curadoria literária nacional que apresenta livros, autores, periodos literarios, editoras e premiações voltados a literatura brasileira',
'tecnologias' => 'HTML, CSS, JavaScript',
'git'=> 'https://github.com/Fernando-Ferreira-Cavalcante/Curadoria-Ler-'
],

2 => [
'icone' => 'img/gt.svg',
'titulo' => 'Gerenciador de Tarefas',
'descricao' => 'Gerenciador de tarefas, projeto feito como introdução a React que permite o usuario adicionar tarefas, excluir e marcar como conluida ',
'tecnologias' => 'HTML, CSS, JavaScript, React',
'git'=> 'https://github.com/Fernando-Ferreira-Cavalcante/gerenciador-de-tarefas'
],

3 => [
'icone' => 'img/empessoa.webp',
'titulo' => 'EmPessoa',
'descricao' => 'Acervo reune as obras de Fernando Pessoa e que conta parte da sua história, projeto feito para principalmente consolidar meus conhecimentos em React',
'tecnologias' => 'HTML, CSS, JavaScript, React',
'git' => 'https://github.com/Fernando-Ferreira-Cavalcante/Em-Pessoa'
],
];

$pagina = $_GET['pagina'] ?? 'inicio';
$id_projeto = isset($_GET['id']) ? (int)$_GET['id'] : null;

$paginas_validas =['inicio','habilidades', 'projetos', 'projeto'];

if (!in_array($pagina, $paginas_validas)){
  http_response_code(404);
}
elseif($pagina === 'projeto' && (!$id_projeto || !isset($projetos[$id_projeto]))){
  http_response_code(404);
}


//tema claro e escuro
$tema = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro';

if (!in_array($tema, ['claro', 'escuro'])){
  $tema = 'claro';
}
if (isset($_GET['tema'])){
  setcookie('tema', $tema, time()  + (86400*30), "/");
}

$proximo_tema = ($tema === 'claro') ? 'escuro' : 'claro';


if (isset($_GET['formato']) && $_GET['formato'] === 'json') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['perfil' => $perfil, 'projetos' => $projetos], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}



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

    <a href="index.php?pagina=inicio" class="<?= htmlspecialchars(($pagina === 'inicio') ? 'nav_ativo': '') ?>">Inicio</a>
    <a href="index.php?pagina=habilidades" class="<?= htmlspecialchars(($pagina === 'habilidades') ? 'nav_ativo': '') ?>">Habilidades</a>
    <a href="index.php?pagina=projetos" class="<?= htmlspecialchars(($pagina === 'projetos')? 'nav_ativo': '') ?>">Projetos</a>

    <a href="index.php?pagina=<?= htmlspecialchars($pagina) ?><?= ($pagina === 'projeto' && $id_projeto) ? '&id=' . $id_projeto : '' ?>&tema=<?= htmlspecialchars($proximo_tema) ?>" class="botao_tema">
  Trocar Tema
</a>
  </nav>
  </header>

  <main>
<?php if($pagina === 'inicio'): ?>

    <section class="card_apresentacao">
        <h2 class="titulo_card">Olá, eu sou Fernando </h2>
        <div class="card_apresentacao_1">
<img src="/img/eu.jpeg" class="imagem_apresentacao" alt="Foto de perfil ">     
        <dl class="texto_apresentacao">
    
    <dd>Nome:<?= htmlspecialchars($perfil['nome']) ?></dd>
    <dd>Curso: <?= htmlspecialchars($perfil['curso']) ?></dd>
    <dd>Campus: <?= htmlspecialchars($perfil['campus']) ?></dd>
    <dd>Cidade: <?= htmlspecialchars($perfil['cidade']) ?></dd>
  </dl>
        </div>
        <div class="card_apresetacao_2" >
          <p class="texto_apresentacao_2"><?= htmlspecialchars($perfil['apresentacao']) ?></p>
        </div>
</section>


<!--pagina Habilidades ==================================================================-->
<?php elseif($pagina === 'habilidades'): ?>
  <section class="habilidades">
    <div class="titulo_habilidades">
    <h1>As minhas <?= htmlspecialchars($total) ?> principais habilidades são: </h1>
    <p><?= htmlspecialchars($lista_habilidades) ?></p>
    </div>

    <div class="cards_habilidades">
      <?php foreach($habilidades as $habilidade): ?>
        <div class="card_habilidade_pequeno">
          <img src="<?= htmlspecialchars($habilidade['icone']) ?>" class="img_habilidades"> 
          <p><?= htmlspecialchars($habilidade['titulo']) ?></p>
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
      <?php foreach($projetos as $id => $projeto): ?>
        <div class="card_projeto_pequeno">
          <img src="<?= htmlspecialchars($projeto['icone']) ?>" class="img_projetos"> 
          <div class="card_projeto_texto">
          <h2><?= htmlspecialchars($projeto['titulo']) ?></h2>
          <p><?= htmlspecialchars($projeto['descricao']) ?></p>
          <p><?= htmlspecialchars($projeto['tecnologias']) ?></p>
          </div>

          <a href="index.php?pagina=projeto&id=<?= htmlspecialchars($id) ?>&tema=<?= htmlspecialchars($tema) ?>" class="botao_detalhes">></a>
        </div>
        <?php endforeach ?>
    </div>
  </section>

      <!--Pagina especifica de projeto-->
<?php elseif ($pagina === 'projeto' && $id_projeto && isset($projetos[$id_projeto])): ?>
  <?php $proj =$projetos[$id_projeto]; ?>
  <section class="detalhes_projeto">
    <div class="cards_projeto">
      <div class="card_projet_pequeno">
        <img src="<?= htmlspecialchars($proj['icone']) ?>" class="img_projeto" alt="<?= htmlspecialchars($proj['titulo']) ?>">
          <div class="card_projeto_texto">
            <h2><?= htmlspecialchars($proj['titulo']) ?></h2>
            <p><?= htmlspecialchars($proj['descricao']) ?></p>
            <p><strong>Tecnologias utilizadas:</strong> <?= htmlspecialchars($proj['tecnologias']) ?></p>
            <br>

           <?php if (isset($proj['git'])): ?>
        <a href="<?= htmlspecialchars($proj['git']) ?>" target="_blank">Acessar repositório GitHub</a>
      <?php endif; ?>
            <br>
            <a href="index.php?pagina=projetos&tema=<?= htmlspecialchars($tema) ?>">← Voltar para todos os projetos</a>
          </div>
      </div>
    </div>
  </section>




  <!--pagina perdida ==================================================================-->

  <?php else: ?>
    <section class="erro_404" style="text-align: center; margin-top: 5rem;">
      <?php if ($pagina === 'projeto'): ?>
        <h1>Projeto não encontrado! (404)</h1>
      <?php else: ?>
        <h1>A página que você buscou não existe! (404)</h1>
      <?php endif; ?>
      <br>
      <a href="index.php?pagina=inicio&tema=<?= htmlspecialchars($tema) ?>">Voltar para a página inicial</a>
    </section>

    <?php endif; ?>
  </main>


  <footer class="rodape">
    <p>Tema atual: <strong><?= ucfirst(htmlspecialchars($tema)) ?></strong></p>
<p><a href="index.php?formato=json" target="_blank">Ver dados em formato JSON</a></p>    <p>&copy; <?= htmlspecialchars(date('Y')) ?> 
 <?= htmlspecialchars($perfil['nome']) ?></p>
  </footer>

</body>
</html>
