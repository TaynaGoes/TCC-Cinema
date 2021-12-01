<?php

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT); 
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING); 
      
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare('UPDATE categoria_produto SET nome = :nome WHERE id = :id');

        $comandoSQL->execute(array(':nome' => $nome, ':id' => $id));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../categoria_produtos.php');
        }
        else {
            header('location: ../categoria_produtos.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }