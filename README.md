# API de frases com PHP

A [api de frases aleatórias](https://api-frases-php.herokuapp.com/) está hospedada no Heroku e você pode utilizar a partir desta url https://api-frases-php.herokuapp.com/.

## O que é ?

Uma API simples que retorna um array com frases diversas em formato JSON.

## Por que PHP ?
Uma das obrigações de um trabalho na faculdade é "o sistema precisa ter alguma coisa em PHP", então está aqui a implementação em PHP. Uma API que vai retornar frases aleatórias para serem exibidas no front-end do site.

## Como usar ?

É bem simples, faça chamadas do tipo GET/ para essa url https://api-frases-php.herokuapp.com/. Se desejar, passe alguns parâmetros para personalizar a resposta.

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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?total=3`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 3", "frase 8", "frase 12" ]`

### all

Retorna todos os itens do array

- Regras

  1. Igual a **true**

- Exemplo de uso
  - GET/
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?all=true`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 1", ..., "última frase" ]`

### OBS

1. Se nenhum dos parâmetros forem utilizados ou não se encaixarem nas regras, então será retornado um array com uma única frase aleatória

- Exemplo
  - GET/
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?total=0`
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?all=false`
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?total=qwerty&all=99`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase aleatória" ]`

2. O parâmetro **total** tem preferência em relação ao **all**

- Exemplo
  - GET/
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`https://api-frases-php.herokuapp.com/?all=true&total=4`
  - RESPONSE
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`[ "frase 1", "frase 7", "frase 26", "frase 31 ]`
