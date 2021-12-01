<?php

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        session_start();

        require_once("conexao.php");

        try{
            $comandoSQL = $conexao->prepare("SELECT * FROM administrador WHERE email = :email");
            $comandoSQL->bindParam(":email", $email);
            $comandoSQL->execute();

            if($comandoSQL->rowCount() > 0){
                $linha = $comandoSQL->fetch();
                $hash = $linha["senha"];
                
                if (md5($senha) == $hash) {
                    session_unset();

                    $_SESSION['id'] = $linha["id"];
                    $_SESSION['nivel'] = 'Administrador';

                    header("location:../administracao_produtos.php");
                }
                else{
                    session_unset();
                        
                    $_SESSION["msg"] = "Senha ou email inválido.";

                    header("location:../login_administracao.php");
                }
            }
            else {
                session_unset();
                
                $_SESSION["msg"] = "Senha ou email inválido.";

                header("location:../login_administracao.php");
            }
        }
        catch (PDOException $erro) {
            echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
            die();
        }
    }