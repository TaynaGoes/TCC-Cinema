<?php
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    require_once("conexao.php");

    $comandoSQL = "SELECT * FROM categoria_produto WHERE id = $id";

    $selecionado = $conexao->query($comandoSQL);

    $linha = $selecionado->fetch(PDO::FETCH_ASSOC);