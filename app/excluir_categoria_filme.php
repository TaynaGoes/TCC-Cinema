<?php

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    require_once("conexao.php");

    try{
        $comandoSQL = $conexao->prepare("DELETE FROM categoria_filme WHERE id=:id");
        $comandoSQL->bindParam(":id", $id);
        $comandoSQL->execute();

        if($comandoSQL->rowCount() > 0){
            header("location:../categoria_filmes.php");
        }
        else{
            header("location:../categoria_filmes.php");
        }
    }
    catch(PDOException $erro){
        echo $erro->getMessage();
    }