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
                                <h3 class="panel-center_title">Alterar Produto</h3>
                            </div>

                            <?php 
                                require_once('./app/listar_categoria_produto.php');
                                require_once('./app/obter_produto.php');
                            ?>
        
                            <div class="panel-center_form">
                                <form action="./app/alterar_produto.php" method="post" enctype="multipart/form-data" class="film_form">
                                    <input type="hidden" name="id" value="<?=$linha['id'];?>">
                                    <input type="hidden" name="foto" value="<?=$linha['imagem'];?>">

                                     <!-- Nome -->
                                    <label for="filme_nome" class="film_label">Nome</label>
                                    <input type="text" name="nome" id="filme_nome" class="film_input" value="<?=$linha['nome'];?>">

                                    <!-- Categoria -->
                                    <label for="filme_categoria" class="film_label">Categoria</label>
                                    <select name="categoria" class="film_input film_select">
                                            <?php
                                                $qnt = count($categorias_produto);

                                                for ($i = 0; $i < $qnt; $i++) {
                                                    $id = $categorias_produto[$i]['id'];       
                                                    $nome = $categorias_produto[$i]['nome'];

                                                    if ($categorias_produto[$i]['id'] == $linha['categoria']) {
                                            ?>
                                                        <option selected value="<?=$id;?>"><?=$nome;?></option>
                                            <?php
                                                    }
                                                    else {
                                            ?>            
                                                        <option value="<?=$id;?>"><?=$nome;?></option>
                                            <?php            
                                                    }
                                                }
                                            ?>  
                                     </select>

                                    <!-- Descrição -->
                                    <label for="filme_descricao" class="film_label">Descrição</label>
                                    <textarea name="descricao" id="filme_descricao" cols="30" rows="3"
                                        class="film_input film_textarea"><?=$linha['descricao'];?></textarea>

                                    <!-- Valor -->
                                    <label for="filme_duracao" class="film_label">Valor</label>
                                    <input type="number" min="0.00" max="10000.00" step="0.01" name="valor"
                                        id="filme_duracao" class="film_input film_timer" value="<?=$linha['valor'];?>">

                                    <!-- Caracteristicas -->
                                    <div class="film_feature">
                                        <span class="film_label">Imagem</span>
                                        <label for="filme_image" class="film_label film_label__file">
                                            Adicionar Imagem
                                            <img src="src/imagens/icon/upload.png" alt="" srcset="">
                                        </label>
                                        <input type="file" name="imagem" id="filme_image">
                                    </div>

                                    <div class="panel-button_wrapper">
                                        <a href="administracao_produtos.php" class="panel-button panel-button_cancel">Cancelar</a>
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