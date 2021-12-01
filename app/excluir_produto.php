<?php

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $foto = filter_input(INPUT_POST, "foto", FILTER_SANITIZE_STRING);

    require_once("conexao.php");

    try{
        $comandoSQL = $conexao->prepare("DELETE FROM produto WHERE id=:id");
        $comandoSQL->bindParam(":id", $id);
        $comandoSQL->execute();

        if($comandoSQL->rowCount() > 0){
            header("location:../administracao_produtos.php");

            $dir_imagens = "../imagens/produtos/";

            if ($foto != null) {
                if ($foto != '') {
                    unlink($dir_imagens . $foto);
                }
            }
        }
        else{
            header("location:../administracao_produtos.php");
        }
    }
    catch(PDOException $erro){
        echo $erro->getMessage();
    }