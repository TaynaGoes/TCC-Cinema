<?php
    $foto = filter_input(INPUT_POST, "foto", FILTER_SANITIZE_STRING);
    
    // diretório que será armazenado todas as imagens enviadas pelos usuários
    $dir_imagens = "../imagens/produtos/";

    // pegando o nome do arquivo e se houver espaço em branco substituir por underline
    $nome_original = str_replace(" ", "_", basename($_FILES["imagem"]["name"]));

    if($nome_original != ""){
        // criar um token/chave exclusivo e para finalizar faz a criptografia usando o MD5
        // que gera uma sequência de 32 caracteres.
        $token = md5(uniqid(rand(), true));

        // nome_final é a junção das váriáveis de diretório+token+nome_original
        $nome_final = $dir_imagens.$token.$nome_original;

        // A variável Flag é usada para sinalizar que está tudo ok quando valer 1
        $flag = 1;

        // verifica se o arquivo foi enviado pelo submit
        if(isset($_POST["submit"])){
            //verifica o tamanho do arquivo temporário e se for maior que 0 está ok
            if(getimagesize($_FILES["imagem"]["tmp_name"])){
                $flag = 1;
            }
            else{
                $flag = 0;
            }
        }

        if($_FILES["imagem"]["size"] > 2000000){
            $flag = 0;
        }

        // strtolower converte todos os caracteres de um texto/variável para minúsculo
        // pathinfo retorna a extensão do arquivo
        $extensao = strtolower(pathinfo($nome_final, PATHINFO_EXTENSION)); 
    
        // teste para validar a extensão do arquivo.
        if(($extensao != "jpg") && ($extensao != "png") && ($extensao != "jpeg") && ($extensao != "gif")){
            $flag = 0;
        }

        if($flag == 1){            
            // apaga a foto antiga
            unlink($dir_imagens . $foto);

            //o move_uploaded_file pega o nome do arquivo temporário e grava na pasta do servidor
            move_uploaded_file($_FILES["imagem"]["tmp_name"], $nome_final);
            // a variável foto terá seu conteúdo gravado no BD com o token+nome_original
            $foto = $token.$nome_original;            
        }
    }
    // FIM UPLOAD ************************************************************

    $id         = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $categoria  = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_NUMBER_INT);
    $descricao  = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING);
    $valor      = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRING);
       
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare("UPDATE produto SET categoria = :categoria, nome = :nome, descricao = :descricao, imagem = :imagem, valor = :valor WHERE id = :id"); 

        $comandoSQL->execute(array(
           ':categoria'   => $categoria,
           ':nome'        => $nome,
           ':descricao'   => $descricao,
           ':imagem'      => $foto,
           ':valor'       => $valor,
           ':id'          => $id
        ));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../administracao_produtos.php');
        }
        else {
            header('location: ../administracao_produtos.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }