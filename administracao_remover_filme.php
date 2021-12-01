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
                                <h3 class="panel-center_title">Excluir Filme</h3>
                            </div>
                            <?php 
                                require_once('./app/listar_categoria_filme.php');
                                require_once('./app/listar_resolucao.php');
                                require_once('./app/obter_filme.php');
                            ?>
        
                            <div class="panel-center_form">
                                <form action="./app/excluir_filme.php" method="post" enctype="multipart/form-data" class="film_form">

                                    <input type="hidden" name="id" value="<?=$linha['id'];?>">
                                    <input type="hidden" name="foto" value="<?=$linha['imagem'];?>">

                                    <!-- Nome -->
                                    <label for="filme_nome" class="film_label">Nome</label>
                                    <input disabled type="text" name="nome" id="filme_nome" class="film_input" value="<?=$linha['nome'];?>">

                                    <!-- Sinopse -->
                                    <label for="filme_sinopse" class="film_label">Sinopse</label>
                                    <textarea disabled name="sinopse" id="filme_sinopse" cols="30" rows="3"
                                        class="film_input film_textarea"><?=$linha['sinopse'];?></textarea>

                                    <!-- Categoria/Gênero -->
                                    <label for="filme_categoria" class="film_label">Categoria/Gênero</label>
                                    <select disabled name="categoria" class="film_input film_select">
                                            <?php
                                                $qnt = count($categorias_filme);

                                                for ($i = 0; $i < $qnt; $i++) {
                                                    $id = $categorias_filme[$i]['id'];       
                                                    $nome = $categorias_filme[$i]['nome'];

                                                    if ($id == $linha['categoria']) {
                                            ?>
                                                    <option selected value="<?=$id;?>"><?=$nome;?></option>
                                            <?php
                                                        break;
                                                    }
                                                }
                                            ?>  
                                    </select>

                                    <!-- Duração -->
                                    <label for="filme_duracao" class="film_label">Duração</label>
                                    <input disabled type="time" name="duracao" id="filme_duracao" class="film_input film_timer" value="<?=$linha['duracao'];?>">

                                    <!-- Caracteristicas -->
                                    <div class="film_feature">

                                        <label for="filme_caracteristica" class="film_label">Legendado</label>
                                        <select disabled name="legendado" class="film_input film_select">
                                            <option value="<?=$linha['legendado'];?>" selected><?=$linha['legendado'];?></option>
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Dublado</label>
                                        <select disabled name="dublado" class="film_input film_select">
                                            <option value="<?=$linha['dublado'];?>" selected><?=$linha['dublado'];?></option>
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Resolução</label>
                                        <select disabled name="resolucao" class="film_input film_select">
                                            <?php
                                                $qnt = count($resolucoes);

                                                for ($i = 0; $i < $qnt; $i++) {
                                                    $id = $resolucoes[$i]['id'];       
                                                    $nome = $resolucoes[$i]['nome'];

                                                    if ($id == $linha['resolucao']) {
                                            ?>
                                                <option value="<?=$id;?>"><?=$nome;?></option>
                                            <?php
                                                    break;
                                                    }
                                                }
                                            ?> 
                                        </select>

                                        <label for="filme_caracteristica" class="film_label">Status</label>
                                        <select disabled name="status" class="film_input film_select">
                                            <option value="<?=$linha['ativo'];?>" selected><?=$linha['ativo'];?></option>
                                        </select>

                                        <span class="film_label">Imagem</span>
                                        <label for="filme_image" class="film_label film_label__file">
                                            Adicionar Imagem
                                            <img src="src/imagens/icon/upload.png" alt="" srcset="">
                                        </label>
                                        <input disabled type="file" name="imagem" id="filme_image">
                                    </div>

                                    <div class="panel-button_wrapper">
                                        <a hred="administracao_filmes.php" class="panel-button panel-button_cancel">Cancelar</a>
                                        <button type="submit" class="panel-button panel-button_confirm">Excluir</button>
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