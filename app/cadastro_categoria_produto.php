<?php
    
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING); 
      
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare('INSERT INTO categoria_produto (nome) VALUES (:nome)');

        $comandoSQL->execute(array(':nome' => $nome));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../categoria_produtos.php');
        }
        else {
            header('location: ../categoria_produtos_add.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }