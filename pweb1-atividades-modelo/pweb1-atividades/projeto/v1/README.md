# Perfil do Estudante: versão 1

**Autor(a):** _(Fernando everson Ferreira Cavalcante)_

## Como executar

```
cd projeto/v1
php -S localhost:8000 -d display_errors=1 -d output_buffering=0
```

Abra http://localhost:8000

## Telas

| Tema claro | Tema escuro |
|---|---|
| ![Tema claro](prints/claro.png) | ![Tema escuro](prints/escuro.png) |

## 1. Mapa de rotas

Complete com todas as rotas do seu projeto.

| URL | O que mostra | Status |
|---|---|---|
| `/` | | |
| `/?pagina=habilidades` | Minha página de habilidades|[200]: GET /favicon.ico |
| `/?pagina=projetos` |Minha Pagina de projetos |[200]: GET /favicon.ico |
| `/?pagina=projeto&id=1` |Meu projeto 1, a curadoria Ler+ |[200]: GET /favicon.ico |
| `/?pagina=projeto&id=99` | Uma página de aviso com projeto não encontrado e erro 404|[::1]:51092 [404]: GET /index.php?pagina=projeto&id=99&tema=claro |
| `/?pagina=qualquercoisa` |Um página de aviso que a página buscada não existe | 56696 [404]: GET /index.php?pagina=qualquercoisa|
| `/?tema=escuro` |A página selecionada com o tema escuro |[200]: GET /favicon.ico |
| `/?formato=json` | A página selecionada em formato JSON| 38834 [200]: GET /index.php?pagina=habilidades&tema=escuro&formato=json|

## 2. Saídas do terminal

**2.1 Uma página que existe:** `curl.exe -i "http://localhost:8000/?pagina=habilidades"` (cole só até o início do HTML)

```text
(
HTTP/1.1 200 OK
Host: localhost:8000
Date: Tue, 13 Oct 2026 22:58:24 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-type: text/html; charset=UTF-8)
```

**Explicação:**

_(
`HTTP/1.1 200 OK` - o HTTP sendo a versão do protocolo http usado, 200 código http que indica que a requisição foi bem sucedida, OK a descrição textual do código 200

`Host: localhost:8000` - identifica que o servidor foi inciado localmente na porta 8000

`Date: Tue, 13 Oct 2026 22:58:24 GMT`- Data e hora que a requisição aconteceu

`Connection: close`- indica que a requsição será encerrada após a resposta

`X-Powered-By: PHP/8.5.11`- indica a  tecnologia do meu servidor

`Content-type: text/html; charset=UTF-8` - indica que o conteudo foi escrito em html e a forma como vai ser formatado na tela é no formato UTF-8, que suporta acentos usados comumento na lingua portuguêsa)_

**2.2 Uma página que não existe:** `curl.exe -i "http://localhost:8000/?pagina=projeto&id=99"` (cole só até o início do HTML)

```text
(HTTP/1.1 404 Not Found
Host: localhost:8000
Date: Wed, 14 Oct 2026 11:12:05 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-type: text/html; charset=UTF-8)
```

**Explicação:**

_(HTTP/1.1 404 Not Found - A requisição exibe o código html 404, indicando que o que foi buscado não foi encontradado, mas como a conexão com o servidor funcionou, o restante das saidas são como o esperado 
)_

**2.3 A troca de tema:** `curl.exe -i "http://localhost:8000/?tema=escuro"` (cole só até a linha do `<body>`)

```text
(HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 11:15:48 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Set-Cookie: tema=escuro; expires=Fri, 13 Nov 2026 11:15:48 GMT; Max-Age=2592000; path=/
Content-type: text/html; charset=UTF-8)
```

**Explicação (qual cabeçalho grava o tema e como o PHP sabe o tema na próxima requisição):**

_(`Set-Cookie: tema=escuro; expires=Fri, 13 Nov 2026 11:15:48 GMT; Max-Age=2592000; path=/` - aponta que o tema escolhido foi o escuro e aponta quando o tema definido na URL irá deixar de ser valido
)_

**2.4 A API:** `curl.exe -i "http://localhost:8000/?formato=json"`

```text
(HTTP/1.1 200 OK
Host: localhost:8000
Date: Wed, 14 Oct 2026 11:19:46 GMT
Connection: close
X-Powered-By: PHP/8.5.11
Content-Type: application/json; charset=utf-8)
```

**Explicação:**

_(`Content-Type: application/json; charset=utf-8` - a única mudança é nessa linha, que indica que o formato do conteúdo agora é JSON e não html)_

**2.5 Log do servidor** das quatro requisições acima

```text
(started
[Tue Oct 13 19:58:24 2026] [::1]:54910 Accepted
[Tue Oct 13 19:58:24 2026] [::1]:54910 [200]: GET /?pagina=habilidades
[Tue Oct 13 19:58:24 2026] [::1]:54910 Closing
[Wed Oct 14 08:12:05 2026] [::1]:47552 Accepted
[Wed Oct 14 08:12:05 2026] [::1]:47552 [404]: GET /?pagina=projeto&id=99
[Wed Oct 14 08:12:05 2026] [::1]:47552 Closing
[Wed Oct 14 08:15:48 2026] [::1]:40496 Accepted
[Wed Oct 14 08:15:48 2026] [::1]:40496 [200]: GET /?tema=escuro
[Wed Oct 14 08:15:48 2026] [::1]:40496 Closing
[Wed Oct 14 08:19:46 2026] [::1]:42592 Accepted
[Wed Oct 14 08:19:46 2026] [::1]:42592 [200]: GET /?formato=json
[Wed Oct 14 08:19:46 2026] [::1]:42592 Closing)
```

**Explicação:**

_(Os logs do servidor indicam em sua maioria que as requisições foram bem sucedidas, retornando código 200, porem em pontos como [Wed Oct 14 08:12:05 2026] [::1]:47552 [404]: GET /?pagina=projeto&id=99 o erro 404 era inevitavel considerando que essa página não existe
)_

## 3. Onde usei cada conceito
_(Por uma questão de redundancia e sobrecarga de informações, decidir não adicionar todas linhas em que usei um conceito, mas sim o contexto)_
| Conceito | Linha(s) do `index.php` | Para que usei |
|---|---|---|
| Array associativo |`'icone' => 'img/ler+.png',` na função projetos  | Usado nas definições das funções, podendo chamar um dado do array por um identificador decidido por mim.|
| `$_GET` e `??` |$pagina = $_GET['pagina'] ?? 'inicio'; e $tema = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro'; |Utilizados para receber parâmetros enviados pela URL e definir valores padrão quando eles não estão presentes. Assim, posso identificar a página solicitada, receber o tema escolhido e definir o tema claro como padrão quando não existe uma preferência salva. |
| `if` / `elseif` / `else` |Validação das páginas e do tema no PHP; seleção de conteúdo no HTML com if ($pagina === 'inicio'), elseif e else. | Utilizados para controlar o fluxo da aplicação, validar os parâmetros recebidos e exibir o conteúdo correspondente à página solicitada, incluindo mensagens de erro para páginas ou projetos inexistentes.|
| `htmlspecialchars` | Na exibição dos dados do perfil, das habilidades, dos projetos e dos parâmetros dinâmicos inseridos no HTML.|Utilizado para converter caracteres especiais em entidades HTML antes de exibir dados dinâmicos, reduzindo o risco de que esses valores sejam interpretados como código HTML ou JavaScript. |
| `setcookie` e `$_COOKIE` |setcookie('tema', $tema, time() + (86400*30), "/"); e $tema = $_GET['tema'] ?? $_COOKIE['tema'] ?? 'claro'; |Utilizados para salvar a preferência de tema do usuário por 30 dias e recuperá-la em requisições posteriores, permitindo manter o tema escolhido mesmo após navegar entre páginas. |
| `http_response_code(404)` |Dentro das condições que verificam se a página solicitada é válida e se o projeto informado existe. | Utilizado para definir o status HTTP 404 quando a página não existe ou quando o usuário solicita um projeto com identificador inválido ou inexistente.|
| `header` e `json_encode` |No bloco if (isset($_GET['formato']) && $_GET['formato'] === 'json'). | Utilizados para disponibilizar os dados do perfil e dos projetos em formato JSON. A função header() informa o tipo de conteúdo retornado, enquanto json_encode() converte os arrays PHP em JSON. O exit encerra a execução para impedir que o HTML da página seja acrescentado à resposta.|
| `implode` e `count` |$total = count($habilidades); e $lista_habilidades = implode(", ", array_column($habilidades, 'titulo')); |Utilizados para contar a quantidade de habilidades cadastradas e reunir seus títulos em uma única string, separados por vírgulas, facilitando a exibição dessas informações na página de habilidades. |

## 4. Decisões e dificuldades

**4.1 Por que toda a lógica PHP fica no topo do arquivo, antes do HTML?**

_(É feito assim para separar a lógica do código da exibição dele, desta forma arrays, funções e outros são criados e validados para sṕ depois o html poder exibi-los)_

**4.2 Por que o tema escolhido na URL precisa ser validado?**

_(Como só existe um tema claro e tema escuro, a validação serve para assegurar que apenas uma destas opções seja selecionada, previnindo possiveis erros do usuário.)_

**4.3 Qual foi a maior dificuldade e como você resolveu?**

_(Adaptação à nova linguagem: o PHP não é naturalmente complicado, mas a falta de familiaridade com suas funções e com a própria sintaxe foi um dos principais obstáculos, especialmente no início do projeto.)_
