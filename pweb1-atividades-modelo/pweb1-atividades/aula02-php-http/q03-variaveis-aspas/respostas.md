# Questão 03: Variáveis, aspas e concatenação

**Nível:** 🟢 Básico

## Arquivos desta questão

| Arquivo | O que é |
|---|---|
| `aspas.php` | Código fornecido (não altere) |

## 1. Análise do código

**1.1 **Antes de executar**, preencha a coluna "Minha previsão" com o que cada linha vai mostrar.

| Linha | Minha previsão | Resultado real |
|---|---|---|
| `"Aluna: " . $nome` |Maria | Maria |
| `"Aluna: $nome"` | O nome da variavel| Maria |
| `'Aluna: $nome'` | o texto desta mesma forma| Aluna: $nome|
| `"Cursa o {$semestre}º semestre de $curso"` |o texto desta mesma forma | Cursa o 2º semestre de ADS|
| `$nome . $curso` |maria, ADS  | MariaADS|
| `<?= $nome ?>` | Maria| Atalho: Maria|**

_(responda aqui)_

**1.2 Para que servem as chaves `{}` em `{$semestre}`?**

_(Serve para identificar no meio de um texto uma parte que deve ser executada como código)_

## 2. Saídas do terminal

> Copie do terminal e cole entre as linhas de três crases. Depois explique **cada linha** com suas palavras.

**2.1 Saída de `curl.exe -s http://localhost:8000/q03-variaveis-aspas/aspas.php`**

```text
(<p>Aluna: Maria</p>
<p>Aluna: Maria</p>
<p>Aluna: $nome</p>
<p>Cursa o 2º semestre de ADS</p>
<p>MariaADS</p>
<p>Atalho: Maria</p>)
```

**Explicação linha por linha:**

_(`<p>Aluna: Maria</p>`, A saida vem como 'Maria', pois a variável foi usada da froma correta.

`<p>Aluna: Maria</p>`, A saida continua correta, indicando que a variável dentro das aspas do echo ainda está sendo usada da forma correta.

`<p>Aluna: $nome</p>`, A saida aparece incorreta, indicando que o uso da aspa única no echo não é a forma correta.

`<p>Cursa o 2º semestre de ADS</p>`, Essa linha cai da mesma explicação da segunda linha já que é o mesmo cenário.

`<p>MariaADS</p>`, Nessa linha é visto que um echo sem aspas, não consegue dar espaço no texto.

`<p>Atalho: Maria</p>`, É uma linha com a tag resumida, usada da forma correta e tendo a saida correta
)_

## 3. Perguntas

**3.1 Em quais linhas sua previsão errou? Explique o motivo.**

_(APenas na primeira e última, minha previsão quanto ao resto não foi precisa por não compreender como as aspas funcionam em php)_

**3.2 Por que `$nome . $curso` aparece sem espaço entre as palavras? Como corrigir?**

_(O ponot entre variáveis concatena elas da forma como foram escritas, como não tinha espaço no inicio de numa delas, a saida cabou sendo junta. A forma mais simples de consertar, seria concatenar com um espaço no meio. Ex: `<p><?php echo $nome . " " . $curso; ?></p>`)_
