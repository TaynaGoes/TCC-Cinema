<?php
    require_once("conexao.php");

    try {
        $comandoSQL = "SELECT * FROM categoria_produto";
        $select = $conexao->query($comandoSQL);
        $categorias_produto = $select->fetchAll();

    } catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }