<?php
    
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING); 
      
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare('INSERT INTO resolucao (nome) VALUES (:nome)');

        $comandoSQL->execute(array(':nome' => $nome));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../administracao_resolucao.php');
        }
        else {
            header('location: ../administracao_add_resolucao.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }