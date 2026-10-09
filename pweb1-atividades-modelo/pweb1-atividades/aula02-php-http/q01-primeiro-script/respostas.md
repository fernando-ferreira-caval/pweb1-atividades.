# Questão 01: O primeiro script e o log do servidor

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `ola.php` | Código fornecido (não altere) |

## 1. Análise do código

**1.1 O arquivo mistura HTML e PHP. Indique quais linhas são HTML e quais são PHP.**

_(As unicas linha PHP no código são: 
<?php echo "Este texto foi escrito pelo PHP."; ?>
<?= date('H:i:s') ?>

O restante são linha HTML, visiveis pelas tags: <!DOCTYPE html>, <head>, <body>,<p> dentre algumas outras.
)_

**1.2 Qual a diferença entre `<?php echo ... ?>` e `<?= ... ?>`?**

_(Tanto <?php echo ... ?> quanto <?= ... ?> são formas de abrir uma tag em PHP, indicando que está parte do código deve ser interpretada com PHP e não HTML, mas
<?php echo ... ?> além de ser a forma padrão de se escrever a tag, também vem junto com "echo", que é um comando padrão para saida de dados na tela. Além disso <?= ... ?> é conhecimendo como "Tag curta", uma forma de indicar um código em PHP e de gerar essa saida de dados na tela de forma mais rápida

)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Log do servidor (as linhas que apareceram no terminal do `php -S` ao abrir a página no navegador)**

```text
(

[Fri Oct  9 15:51:20 2026] [::1]:43848 Accepted
[Fri Oct  9 15:51:20 2026] [::1]:43848 [200]: GET /ola.php
[Fri Oct  9 15:51:20 2026] [::1]:43848 Closing
)
```

**Explicação linha por linha:**

_([Fri Oct  9 15:51:20 2026] [::1]:43848 Accepted - "[Fri Oct  9 15:51:20 2026]" É o horario que a requisição no navegador foi feita.  "[::1]" É a representação IPv6 da minha máquina. ":43848" É a porta temporaria aberta pelo navegador para fazer a requisição. "Accepted" É a indicação de que o servidor php aceitou a conexão do navegador.

[Fri Oct  9 15:51:20 2026] [::1]:43848 [200]: GET /ola.php - "[200]" É o código HTTP de sucesso.
"GET /ola.php" Indica o método GET e o arquivo que o navegador carregou 

[Fri Oct  9 15:51:20 2026] [::1]:43848 Closing - Indica que após carregador o conteúdo pedido pelo negador o servidor encerrou a conexão


)_

**2.2 Saída de `curl.exe -i http://localhost:8000/q01-primeiro-script/ola.php`**

```text
(http://localhost:8000/ola.php
HTTP/1.1 200 OK
Host: localhost:8000
Date: Fri, 09 Oct 2026 19:10:06 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Questão 01</title>
</head>
<body>
  <h1>Olá, turma!</h1>
  <p>Este texto foi escrito pelo PHP.</p>
  <p>Hora no servidor: 19:10:06</p>
</body>
</html>)
```

**Explicação linha por linha:**

_(http://localhost:8000/ola.php - É a URL da requisição, indica a porta e o arquivo acessado.
HTTP/1.1 200 OK - É| auma linha para o status da requisição, no caso possue o código HTTP para um sucesso na requisição.

Host: localhost:8000 - É o servidor de destino, indicando o nome do host e a porta acessada.

Date: Fri, 09 Oct 2026 19:10:06 GMT - Indica o horário da requisição e formato em que o harário está sendoe exibido.

Connection: close - É para a gestão de conexão, indica a quem está acessando que o servidor fechará assim que a requisição for conluída.

X-Powered-By: PHP/8.5.11 - É um cabeçalho que indica o tipo de tecnologia e a versão do interpretador usado para processar o script.

Content-type: text/html; charset=UTF-8 - É uma area para exibir o tipo de conteudo e a forma como será exibido, nesse caso especifica que é HTML e a forma a ser exibida é o UTF-8 que garante a leitura correta de palavras com certos acentos.

O restante da saida é o conteúdo de ola.php
)_

## 3. Perguntas

**3.1 Aperte F5 três vezes. O que muda na página e no log? Por quê?**

_(Para cada F5 precionado, no log eu recebi as mensagem de requisção aceita, qual arquivo foi acessado e que a conexão foi fechada pós a requisição. Isso acontece pois uma requisição nova é feita cada vez que a página é acessada, nesse caso recarregada. Já na página única mudança foi o horário já que nessa página o horario exibido é o harário que a requisição foi feita)_

**3.2 No "Exibir código-fonte" (Ctrl+U), aparece alguma linha de PHP? Explique.**

_(As tags do PHP não foram exibidas, mas isso acontece pois o PHP roda apenas no servidor, quando a conexão é feita pelo nevador, a requisição é executada no servidor que retorna para o naveagor apenas o HTML)_

**3.3 Na saída do curl, o que indicam a primeira linha, o cabeçalho `Content-type` e o cabeçalho `X-Powered-By`?**

_(http://localhost:8000/ola.php - Indica a URL da conexão, indica o host, a porta em que a conxexão foi feita, e o arquivo acessado. 

Content-type: text/html; charset=UTF-8 - Indica que o retorno veio em HTML formatado no padrão UTF-8.

X-Powered-By: PHP/8.5.11 - Indica as informações do interpretador usado.
)_
