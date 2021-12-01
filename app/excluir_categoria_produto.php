<?php

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    require_once("conexao.php");

    try{
        $comandoSQL = $conexao->prepare("DELETE FROM categoria_produto WHERE id=:id");
        $comandoSQL->bindParam(":id", $id);
        $comandoSQL->execute();

        if($comandoSQL->rowCount() > 0){
            header("location:../categoria_produtos.php");
        }
        else{
            header("location:../categoria_produtos.php");
        }
    }
    catch(PDOException $erro){
        echo $erro->getMessage();
    }