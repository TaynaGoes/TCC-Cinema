<?php
    require_once("conexao.php");

    try {
        $comandoSQL = "SELECT * FROM filme";
        $select = $conexao->query($comandoSQL);
        $resultado = $select->fetchAll();

    } catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }