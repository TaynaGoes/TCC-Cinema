<?php
    require_once("conexao.php");

    try {
        $comandoSQL = "SELECT * FROM resolucao";
        $select = $conexao->query($comandoSQL);
        $resolucoes = $select->fetchAll();

    } catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }