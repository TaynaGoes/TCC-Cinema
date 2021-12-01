<?php
    
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $telefone   = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha      = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);    
      
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare("INSERT INTO administrador 
            (nome, telefone, email, senha) 
            VALUES 
            (:nome, :telefone, :email, :senha)
        "); 

        $comandoSQL->execute(array(
           ':nome'       => $nome,
           ':telefone'   => $telefone,
           ':email'      => $email,
           ':senha'      => md5($senha)
        ));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../cadastro_sucesso.php');
        }
        else {
            header('location: ../cadastro_erro.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }