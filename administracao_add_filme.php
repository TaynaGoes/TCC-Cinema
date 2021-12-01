<?php
    session_start();

    if (!isset($_SESSION['nivel'])) {
        header('location: index.php');
    }
    else if ($_SESSION['nivel'] != 'Administrador') {  
        header('location: index.php');   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</head>

<body>
    <main class="panel_main">

    <?php require_once('menu_administracao.php'); ?>

        <section class="panel-container">
            
            <?php require_once('esquerda_administracao.php'); ?>

            <div class="panel-container_center">
                <div class="container">
                    <div class="row">
                        <div class="panel-container_center__wrapper">
                            <div class="panel-center_top">
                                <h3 class="panel-center_title">Novo Filme</h3>
        
                            </div>
                            <div class="panel-center_form">
                                <form action="./app/cadastro_filme.php" method="post" enctype="multipart/form-data" class="film_form">
                                    <!-- Nome -->
                                    <label for="filme_nome" class="film_label">Nome</label>
                                    <input type="text" name="nome" id="filme_nome" class="film_input">

                                    <!-- Sinopse -->
                                    <label for="filme_sinopse" class="film_label">Sinopse</label>
                                    <textarea name="sinopse" id="filme_sinopse" cols="30" rows="3"
                                        class="film_input film_textarea"></textarea>

                                    <!-- Categoria/Gênero -->
                                    <label for="filme_categoria" class="film_label">Categoria/Gênero</label>
                                    <select name="categoria" class="film_input film_select">
                                            <?php
                                                require_once('./app/listar_categoria_filme.php');

                                                $qnt = count($categorias_filme);

                                                for ($i = 0; $i < $qnt; $i++) {

                                                $id = $categorias_filme[$i]['id'];       
                                                $nome = $categorias_filme[$i]['nome'];
                                            ?>
                                                <option value="<?=$id;?>"><?=$nome;?></option>
                                            <?php
                                                }
                                            ?>  
                                    </select>

                                    <!-- Duração -->
                                    <label for="filme_duracao" class="film_label">Duração</label>
                                    <input type="time" name="duracao" id="filme_duracao" class="film_input film_timer">

                                    <!-- Caracteristicas -->
                                    <div class="film_feature">

                                        <label for="filme_caracteristica" class="film_label">Legendado</label>
                                        <select name="legendado" class="film_input film_select">
                                            <option value="Sim" selected>Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Dublado</label>
                                        <select name="dublado" class="film_input film_select">
                                            <option value="Sim" selected>Sim</option>
                                            <option value="Não">Não</option>
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Resolução</label>
                                        <select name="resolucao" class="film_input film_select">
                                            <?php
                                                require_once('./app/listar_resolucao.php');

                                                $qnt = count($resolucoes);

                                                for ($i = 0; $i < $qnt; $i++) {

                                                $id = $resolucoes[$i]['id'];       
                                                $nome = $resolucoes[$i]['nome'];
                                            ?>
                                                <option value="<?=$id;?>"><?=$nome;?></option>
                                            <?php
                                                }
                                            ?> 
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Status</label>
                                        <select name="status" class="film_input film_select">
                                            <option value="Ativo" selected>Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>

                                        <span class="film_label">Imagem</span>
                                        <label for="filme_image" class="film_label film_label__file">
                                            Adicionar Imagem
                                            <img src="src/imagens/icon/upload.png" alt="" srcset="">
                                        </label>
                                        <input type="file" name="imagem" id="filme_image">
                                    </div>

                                    <div class="panel-button_wrapper">
                                        <a href="administracao_filmes.php" class="panel-button panel-button_cancel">Cancelar</a>
                                        <button type="submit" class="panel-button panel-button_confirm">Salvar</button>
                     
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer footer_panel">
            <div class="container">
                <div class="row">
                    <div class="footer_wrapper">
                        <span class="footer_text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, placeat dolorum rerum
                            expedita error ex vero ipsa perferendis repellat unde consequuntur cupiditate qui omnis
                            maiores aut consectetur beatae in magnam.
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Fim Footer -->
    </main>
</body>

</html>