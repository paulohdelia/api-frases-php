# API de frases com PHP

## O que é ?

Uma API simples que retorna um array com frases diversas em formato JSON.

## Como funciona ?

É bem simples, apenas faça uma chamada HTTP do tipo GET para o endereço que está sendo utilizado. Se desejar, passe alguns parâmetros para personalizar a resposta.

## Parâmetros

Existem dois parâmetros que podem ser utilizados:

- total
- all

### total

Retorna um array com frases aleatórias. O número de frases é igual ao valor de **total**

- Regras

  1. Precisa ser inteiro
  2. Maior que 0
  3. Menor que o **total** de itens no array

  > Se o parâmetro "total" for maior ou igual ao total de itens no array, então seu comportamento será igual ao parâmetro "all" descrito abaixo

- Exemplo de uso
  - GET/
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?total=3`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 3", "frase 8", "frase 12" ]`

### all

Retorna todos os itens do array

- Regras

  1. Igual a **true**

- Exemplo de uso
  - GET/
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?all=true`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 1", ..., "última frase" ]`

### OBS

1. Se nenhum dos parâmetros forem utilizados ou não se encaixarem nas regras, então será retornado um array com uma única frase aleatória

- Exemplo
  - GET/
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?total=0`
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?all=false`
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?total=qwerty&all=99`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase aleatória" ]`

2. O parâmetro **total** tem preferência em relação ao **all**

- Exemplo
  - GET/
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`http://localhost:3000/?all=true&total=4`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 1", "frase 7", "frase 26", "frase 31 ]`
