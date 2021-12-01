<?php
    require_once("conexao.php");

    try {
        $comandoSQL = "SELECT * FROM categoria_filme";
        $select = $conexao->query($comandoSQL);
        $categorias_filme = $select->fetchAll();

    } catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }