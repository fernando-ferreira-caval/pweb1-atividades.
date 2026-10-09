## 1. Análise do código

### 1.1 O arquivo mistura HTML e PHP. Indique quais linhas são HTML e quais são PHP.

As únicas linhas PHP no código são:

```php
<?php echo "Este texto foi escrito pelo PHP."; ?>
<?= date('H:i:s') ?>
```

O restante são linhas HTML, identificadas pelas tags `<!DOCTYPE html>`, `<head>`, `<body>`, `<p>`, entre outras.

### 1.2 Qual a diferença entre `<?php echo ... ?>` e `<?= ... ?>`?

Tanto `<?php echo ... ?>` quanto `<?= ... ?>` são formas de escrever código PHP dentro de um documento HTML. A tag `<?php` indica o início de um trecho de código PHP, enquanto `echo` é um comando utilizado para exibir informações na saída.

Já `<?= ... ?>` é uma forma abreviada de escrever `<?php echo ... ?>`, permitindo exibir um valor de maneira mais rápida e direta. Por exemplo, `<?= date('H:i:s') ?>` exibe o horário atual no formato especificado.

## 2. Saídas do terminal

### 2.1 Log do servidor (as linhas que apareceram no terminal do `php -S` ao abrir a página no navegador)

**Explicação linha por linha:**

- `[Fri Oct 9 15:51:20 2026] [::1]:43848 Accepted`: `[Fri Oct 9 15:51:20 2026]` indica a data e o horário registrados pelo servidor. `[::1]` é a representação IPv6 do endereço de loopback, que corresponde à própria máquina. `:43848` é a porta de origem utilizada pelo cliente na conexão. `Accepted` indica que o servidor PHP aceitou a conexão.

- `[Fri Oct 9 15:51:20 2026] [::1]:43848 [200]: GET /ola.php`: `[200]` é o código HTTP que indica sucesso na requisição. `GET /ola.php` indica o método utilizado na requisição e o recurso solicitado pelo navegador.

- `[Fri Oct 9 15:51:20 2026] [::1]:43848 Closing`: indica que o servidor encerrou a conexão após processar a requisição.

### 2.2 Saída de `curl.exe -i http://localhost:8000/q01-primeiro-script/ola.php`

**Explicação linha por linha:**

- `HTTP/1.1 200 OK`: indica a versão do protocolo HTTP utilizada e o código de status `200`, que significa que a requisição foi bem-sucedida.

- `Host: localhost:8000`: indica o host e a porta do servidor acessado.

- `Date: Fri, 09 Oct 2026 19:10:06 GMT`: informa a data e o horário registrados no cabeçalho da resposta, utilizando o fuso horário GMT.

- `Connection: close`: indica que a conexão será encerrada após a conclusão da resposta.

- `X-Powered-By: PHP/8.5.11`: informa a tecnologia e a versão do PHP utilizadas pelo servidor para processar o script.

- `Content-type: text/html; charset=UTF-8`: indica que o conteúdo retornado é HTML e utiliza a codificação UTF-8, que permite representar corretamente caracteres acentuados e outros símbolos.

O restante da saída corresponde ao conteúdo HTML gerado pelo arquivo `ola.php`. Esse conteúdo inclui a estrutura da página, o título, a mensagem exibida e o horário gerado pelo PHP.

## 3. Perguntas

### 3.1 Aperte F5 três vezes. O que muda na página e no log? Por quê?

A cada vez que pressionei F5, novas mensagens apareceram no log, indicando que a conexão foi aceita, qual arquivo foi solicitado e quando a conexão foi encerrada.

Isso acontece porque cada atualização da página gera uma nova requisição ao servidor. Na página, a única mudança observada foi o horário exibido, pois ele é gerado pelo PHP durante o processamento de cada requisição.

### 3.2 No "Exibir código-fonte" (Ctrl+U), aparece alguma linha de PHP? Explique.

As tags PHP não aparecem no código-fonte exibido pelo navegador. Isso acontece porque o PHP é executado no servidor, que processa o código e retorna ao navegador o resultado gerado, neste caso, o HTML. Assim, o navegador recebe o conteúdo da página, e não o código PHP original.

### 3.3 Na saída do curl, o que indicam a primeira linha, o cabeçalho `Content-type` e o cabeçalho `X-Powered-By`?

A primeira linha, `HTTP/1.1 200 OK`, indica a versão do protocolo HTTP e o código de status da resposta, que informa que a requisição foi bem-sucedida.

O cabeçalho `Content-type: text/html; charset=UTF-8` indica que o conteúdo retornado é HTML e que sua codificação é UTF-8.

O cabeçalho `X-Powered-By: PHP/8.5.11` informa que o PHP, na versão 8.5.11, foi utilizado para processar o script.