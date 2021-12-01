<?php
    
    // UPLOAD ************************************************************

    // diretório que será armazenado todas as imagens enviadas pelos usuários
    $dir_imagens = "../imagens/filmes/";

    // pegando o nome do arquivo e se houver espaço em branco substituir por underline
    $nome_original = str_replace(" ", "_", basename($_FILES["imagem"]["name"]));

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

    if($_FILES["foto"]["size"] > 2000000){
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
        //o move_uploaded_file pega o nome do arquivo temporário e grava na pasta do servidor
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $nome_final);
        // a variável foto terá seu conteúdo gravado no BD com o token+nome_original
        $foto = $token.  $nome_original;
    }
    else{
        $foto = "";
    }

    // FIM UPLOAD ************************************************************

    $nome       = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sinopse    = filter_input(INPUT_POST, "sinopse", FILTER_SANITIZE_STRING);
    $categoria  = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_NUMBER_INT);
    $duracao    = filter_input(INPUT_POST, "duracao", FILTER_SANITIZE_STRING);
    $legendado  = filter_input(INPUT_POST, "legendado", FILTER_SANITIZE_STRING);
    $dublado    = filter_input(INPUT_POST, "dublado", FILTER_SANITIZE_STRING);
    $resolucao  = filter_input(INPUT_POST, "resolucao", FILTER_SANITIZE_NUMBER_INT);
    $status     = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRING);
      
    require_once("conexao.php");

    try {
        $comandoSQL = $conexao->prepare("INSERT INTO filme 
            (categoria, resolucao, nome, sinopse, duracao, legendado, dublado, ativo, imagem) 
            VALUES 
            (:categoria, :resolucao, :nome, :sinopse, :duracao, :legendado, :dublado, :ativo, :imagem) 
        "); 

        $comandoSQL->execute(array(
           ':categoria'    => $categoria,
           ':resolucao'    => $resolucao,
           ':nome'         => $nome,
           ':sinopse'      => $sinopse,
           ':duracao'      => $duracao,
           ':legendado'    => $legendado,
           ':dublado'      => $dublado,
           ':ativo'        => $status,
           ':imagem'       => $foto,
        ));
        
        if($comandoSQL->rowCount() > 0) {
            header('location: ../administracao_filmes.php');
        }
        else {
            header('location: ../administracao_add_filme.php');
        }
    }
    catch(PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }