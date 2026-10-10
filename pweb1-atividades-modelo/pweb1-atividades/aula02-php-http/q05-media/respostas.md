# Questão 05: Média com dados da URL

**Nível:** 🟡 Intermediário

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `media.php` | Código fornecido, que você vai modificar no item 1.2 |

## 1. Análise do código

**1.1 Explique o código original: o que fazem `const`, os parênteses no cálculo e o operador `? :`?**

_(Uma Const é um valor recebido apenas uma vez e que não suposto ser modificado ao longo do código, diferente de uma variável convencional ela não consome uma parte da memória apenas pesrando ser preenchida e modificada, e ma glumas linguagens pode resultar em erro atribuir outro valor a uma constante.

os parênteses no calculo, indicam que aquele operação deve ser feita primeiro, do contrario, assim como a matemática real, a divisão seria feita antes das somas.

o operador `? :` é uma forma resumida de escrever o `if else`, quando o tratamento só possue esses estados "binarios", ou um, ou outro, pode-se escrever desta forma.)_

**1.2 Modifique o código para receber as notas pela URL (`?n1=...&n2=...`), usando `??` com valor padrão `0` e convertendo para `float`. Cole aqui o trecho que você alterou e explique.**

_(`$n1 = filter_input(INPUT_GET, 'n1', FILTER_VALIDATE_FLOAT) ?: 0;`
`$n2 = filter_input(INPUT_GET, 'n2', FILTER_VALIDATE_FLOAT) ?: 0;`

`filter_input` é uma funçaõ nativa do PHP para capturar dados e validar antes usar no código.

`INPUT_GET` informa a função de que os dados vão ser tirados da URL.

`n1` uma string que informa como a variável será reconhecida na URL.

`FILTER_VALIDATE_FLOAT` Identifica se o valor na URL é um decimal valido, convertendo para float se for o caso, se não retornará apenas false ou null.

`?: 0` analisa se o valor na URL foi passado, se não segue a operação com o valor padrão 0.
)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=5&n2=6"`**

```text
(<p>Notas: 5 e 6</p>
<p>Média: 5.5</p>
<p>Situação: Em recuperação</p>)
```

**Explicação linha por linha:**

_(`<p>Notas: 5 e 6</p>` são os valores passados na URL.

`<p>Média: 5.5</p>` É a média dos valores, saindo como float.

`<p>Situação: Em recuperação</p>)` - Como a média para aprovação foi definida como 7, o ALuno não conseguiu passar)_

**2.2 Saída de `curl.exe -s "http://localhost:8000/q05-media/media.php?n1=9"`**

```text
(`<p>Notas: 9 e 0</p>
<p>Média: 4.5</p>
<p>Situação: Em recuperação</p>`)
```

**Explicação linha por linha:**

_(`<p>Notas: 9 e 0</p>`, valores passados na URL, como não foi passado um n2, foi usado o valor padrão 0.

O restante possue a mesma explicação da questão anterior.)_

**2.3 Log do servidor das duas requisições acima**

```text
(
[Sat Oct 10 12:38:49 2026] [::1]:41710 Accepted
[Sat Oct 10 12:38:49 2026] [::1]:41710 [200]: GET /q05-media/media.php?n1=5&n2=6
[Sat Oct 10 12:38:49 2026] [::1]:41710 Closing
[Sat Oct 10 12:41:54 2026] [::1]:43532 Accepted
[Sat Oct 10 12:41:54 2026] [::1]:43532 [200]: GET /q05-media/media.php?n1=9
[Sat Oct 10 12:41:54 2026] [::1]:43532 Closing)
```

**Explicação linha por linha:**

_([Sat Oct 10 12:38:49 2026] [::1]:41710 Accepted - conexão aceita.

[Sat Oct 10 12:38:49 2026] [::1]:41710 [200]: GET /q05-media/media.php?n1=5&n2=6 - código http de sucesso, e a URL junto dos valores das varáveis.

[Sat Oct 10 12:38:49 2026] [::1]:41710 Closing - fim da conexão.

[Sat Oct 10 12:41:54 2026] [::1]:43532 [200]: GET /q05-media/media.php?n1=9 - Código HTTP de sucesso, e URL sem o valor n2, que realmente não foi passado.



)_

## 3. Perguntas

**3.1 No log, onde aparecem os valores das notas? Que parte da URL é essa?**

_(Após o caminho do arquivo a partir do delimitador `?` e são chamados de parâmentros)_

**3.2 Na requisição 2.2, a nota 2 não foi enviada. Qual valor o código usou? Qual operador garantiu isso?**

_(Usou 0, por conta do ?:)_

**3.3 O que acontece com `?n1=abc&n2=10`? Explique o papel do `(float)`.**

_(O primeiro valor é passado como não sendo um tipo aceito, então é substituido pelo valor padrão, e em seguida é tratado com float da mesma forma.)_
