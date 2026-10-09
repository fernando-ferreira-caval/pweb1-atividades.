# Questão 02: Lendo mensagens de erro

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `erro.php` | Código fornecido com um erro proposital (corrija no item 3.3) |

## 1. Análise do código

**1.1 Antes de executar: qual é o erro do código? Em que linha ele está?**

_(`<?php
$curso = "ADS";
echo "Bem-vindo ao curso de $curso";`, e o erro está no declaração da variavel, que falta o `;` no final, por conta da sua base ser a linguagem C
)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Log do servidor ao abrir a página com `display_errors=1`**

```text
([Fri Oct  9 19:21:21 2026] [::1]:59706 Accepted
[Fri Oct  9 19:21:21 2026] PHP Parse error:  syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3
[Fri Oct  9 19:21:21 2026] [::1]:59706 [500]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3
[Fri Oct  9 19:21:21 2026] [::1]:59706 Closing)
```

**Explicação linha por linha:**

_(`[Fri Oct  9 19:21:21 2026] [::1]:59706 Accepted` é a abertura da conexão do navegador.

`[Fri Oct  9 19:21:21 2026] PHP Parse error:  syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3` -Indica um erro de sintase junto do caminho do arquivo e a linha onde está o erro.

`[Fri Oct  9 19:21:21 2026] [::1]:59706 [500]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3` - o mesmo que acima, porem com a adição do codigo `[500]`, sendo codigo HTTP para erro do servidor
)_

**2.2 Log do servidor ao abrir a página com `display_errors=0`**

```text
([Fri Oct  9 19:34:27 2026] PHP 8.5.11 Development Server (http://localhost:8000) started
[Fri Oct  9 19:34:33 2026] [::1]:47742 Accepted
[Fri Oct  9 19:34:33 2026] PHP Parse error:  syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3
[Fri Oct  9 19:34:33 2026] [::1]:47742 [200]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3)
```

**Explicação linha por linha:**

_(não existe diferenças entre uma saida e outra com excessão de `[Fri Oct  9 19:34:33 2026] [::1]:47742 [200]: GET /q02-erros/erro.php - syntax error, unexpected token "echo" in /home/fernando/Documentos/IF/Programação WEB I/pweb1-atividades./pweb1-atividades-modelo/pweb1-atividades/aula02-php-http/q02-erros/erro.php on line 3`, que ao inves de exibir o erro `[500]`, exibe o código `[200]` que vem de um requisição bem sucedida)_

## 3. Perguntas

**3.1 A mensagem diz que o erro está em qual linha? Por que não é a linha onde falta o `;`?**

_(Avisa que o erro está na linha 3, mas só avisa nessa, pois como a linha dois não possui um indicativo de ter sido fechada, é como se considerasse o `echo` algo da variavel, causando erro por uma variavel não poder receber o echo )_

**3.2 Compare o status registrado no log nas duas execuções (`[200]` e `[500]`). Por que eles são diferentes? Qual dos dois é o correto do ponto de vista do HTTP?**

_(Apenas o `[500]`, pois esse codigo http indica um erro, e um erro é exatamente oque temos. Mesmo exibindo na tela a descrição do erro no `[200]` também, não é o ideial já que esse é o codigo de um requisição bem sucedida)_

**3.3 Corrija o código, faça um commit e cole aqui o log da execução corrigida.**

_(responda aqui)_
