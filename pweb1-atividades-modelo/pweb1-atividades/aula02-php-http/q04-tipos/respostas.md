# Questão 04: Tipos e conversões

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `tipos.php` | Código fornecido (no item 3.3 você vai acrescentar linhas) |

## 1. Análise do código

**1.1 **Antes de executar**, preencha a coluna "Minha previsão" com o tipo e o valor de cada linha.

| Linha | Minha previsão | Resultado real |
|---|---|---|
| `"10" + 5` |Erro |15 |
| `"10" . 5` |105 | 105|
| `7 / 2` | 3.5|3.5 |
| `7 % 2` |1 | 1|
| `(int) "3.9 kg"` | 3|3 |
| `(bool) "0"` |0 |false |
| `(bool) "false"` |false |true |
| `0.1 + 0.2 == 0.3` | true|false |**

_(responda aqui)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s http://localhost:8000/q04-tipos/tipos.php`**

```text
(<pre>int(15)
string(3) "105"
float(3.5)
int(1)
int(3)
bool(false)
bool(true)
bool(false)
</pre>)
```

**Explicação linha por linha:**

_(`int(15)` - A soma de `"10" + 5`, deu certo, contrariando minha espectativa já que o primeiro por estar entre aspas poderia ser considerado uma string, mas pela natureza não tipada do PHP, o resultado funciona.

`string(3) "105"` - Por conta do uso do ponto, a saida vem concatenada e não somada como se supõe.

`float(3.5)` - A divisão foi feita com sucesso.

`int(1)` - como `%` pega o resto de uma divisão, a saida está correta.

`int(3)` - como nessa linha foi expecificado que o tipo seria inteiro, a saida não podeia vir como float.

`bool(false)` - Como em PHP, apenas valores vazio ou zero resultam em um bolleano falos, a saida está correta.

`bool(true)` - False entre aspas na netrada da variável, é considerado um vetor de caracteres, desta forma não estando vazio e não recebendo o valor `false` de verdade.

`bool(false)` - o resultado é falso por conta da forma como o calculo é feito internamente, resultando num valor ligeiramente maior que `0.3`
)_

## 3. Perguntas

**3.1 Explique a diferença entre `"10" + 5` e `"10" . 5`.**

_(No primeiro, sem tipar as entradas, o calculo é feito e resulta em `15`, no segundo não existe um operador logico, oque temos é o ponto que concatena os valores, resultando em `105`)_

**3.2 Por que `(bool) "0"` é `false`, mas `(bool) "false"` é `true`?**

_(No primeiro caso, 0 realmente vai representar false para o phph, no segundo o php interpreta como um array de caracteres, desta forma não correspondendo diretamente a `false`, e sendo considerado `true` por não ser zero e nem uma entrada vazia.)_

**3.3 Acrescente ao arquivo duas linhas `var_dump` criadas por você, com resultados que te surpreenderam ou que você achou interessantes. Explique cada uma.**

_(var_dump(5*5 == "5*5");
var_dump(false);

O resultado de ambas foi false, no primeiro eu quis testar a comparação com aspas, e no segundo se passar o false sem aspas, resultaria em false como eu imaginei.)_
