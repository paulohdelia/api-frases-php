<?php

  // Parametros pegos na url => ?all=string&total=number
  $all = explode('/', $_GET['all'])[0] === 'true'; // boolean
  $total = (int) explode('/', $_GET['total'])[0]; // number

  // Pega o conteúdo do arquivo frases.json
  $contents = file_get_contents('./frases.json');

  // Decodifica de json para Array
  $json = json_decode($contents, true);

  // Pega o metodo HTTP sendo usando (GET, POST, PATCH, PUT, DELETE...)
  $method = $_SERVER['REQUEST_METHOD'];

  // Informa que o conteúdo enviado para o client é um JSON
  header('Content-type: application/json');

  // Valor que faz referência à chave que eu quero escolher do arquivo frases.json
  // Nessa caso ao objeto "frases"
  $key = "frases";

  // Se a requisição for do tipo GET continue
  if ($method === 'GET') {

    // Existem 3 cenários possíveis e nessa ordem de preferência
    /* 
      1º: Se for passado um valor $total que seja inteiro, maior que 0 
        e menor que o total de itens no array, então retorna 
        um array com frases aleatórias com o tamanho determinado pelo $total
      
      2º: Se for passado um valor $all que seja igual a "true"
        ou se o valor $total for maior que o total de itens no array,
        então retorna todos os itens do array

      3º: Se nenhum dos critérios acima forem satisfeitos,
        então retorna um array, com um único item, contendo uma item 
        aleatório do array
    */

    // $total é um int ?
    // $total é maior que 0 ?
    // $total é menor que o número total de frases ?
    if (is_int($total) && $total > 0 && $total < sizeof($json[$key])) {

      //  $total é maior que o número total de frases no array ?
      if ($total > sizeof($json[$key])) {

        // $total = tamanho total do array
        $total = sizeof($json[$key]);
      }
      
      // Gera um array com índex aleatórios
      $randomIndexArray = array_rand($json[$key], $total);

      $randomItemsArray = [];

      // Preenche o array de itens aleatórios
      foreach ($randomIndexArray as $randomIndex) {
        array_push($randomItemsArray, $json[$key][$randomIndex]);
      }

      // Retorna um array com frases aleatórias do tamanho determinado pelo $total
      echo json_encode($randomItemsArray);
          
    // $all é true ?
    // $total é maior ou igual ao número total de frases no array ?
    } else if ($all || $total >= sizeof($json[$key])) {

      // Retorna um array com todas as frases
      echo json_encode($json[$key]);
    } else {

      // Retorna um array de uma posição com uma frase aleatória 
      echo json_encode([$json[$key][rand(0, sizeof($json[$key]) - 1)]]);
    }
  }

