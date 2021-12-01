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
                                <h3 class="panel-center_title">Gêneros</h3>
                                <div class="panel-button_wrapper">

                                    <button class="panel-button panel-button_register">
                                        <a href="categoria_filmes_add.php" class="button">
                                            <img src="src/imagens/icon/adicionar.png" alt="" srcset="">
                                            Cadastrar Novo
                                        </a>
                                    </button>

                                </div>
                            </div>

                            <!-- LISTA DE CATEGORIAS -->
                            <div class="col-12">
                                <table class="table table_view">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="table_title col-2">Nome</th>
                                            <th scope="col" class="table_title col-2"></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php
                                        require_once './app/listar_categoria_filme.php'; 
                                        foreach($categorias_filme as $linha) {
                                    ?>

                                    <tbody>
                                        <tr class="table_row">
                                            <td class="table_row__container"><?=$linha["nome"];?></td>
                                            <td class="table_button__container">
                                                <a href="categoria_filmes_alterar.php?id=<?=$linha['id'];?>" class="table_button table_button__update">
                                                    <i class="table_button__icon">
                                                        <img src="src/imagens/icon/update.png" alt="" srcset="">
                                                    </i>
                                                    Editar
                                                </a>
                                                <a href="categoria_filmes_remover.php?id=<?=$linha['id'];?>" class="table_button table_button__delete">
                                                    <i class="table_button__icon">
                                                        <img src="src/imagens/icon/delete.png" alt="" srcset="">
                                                    </i>
                                                    Excluir
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <?php } ?>

                                </table>
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