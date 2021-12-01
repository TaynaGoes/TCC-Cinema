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
    <main>
        
        <?php require_once('menu_cliente.php'); ?>
    
        <!-- Filmes em Cartaz -->
        <section class="films">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="films_top">
                            <div class="films_all">
                                <span class="films_all__title">Filmes em Cartaz</span>
                                <div class="films_all__text-container">
                                    <span class="films_all__text">Ver todos
                                        <i class="films_all_icon">
                                            <!DOCTYPE svg
                                                PUBLIC '-//W3C//DTD SVG 20010904//EN' 'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'>
                                            <svg width="16x" height="16px" version="1.0" viewBox="0 0 512 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g transform="translate(0 512) scale(.1 -.1)">
                                                    <path fill="white"
                                                        d="m2321 5110c-497-48-990-251-1376-565-114-92-294-274-384-387-229-287-417-675-495-1023-49-218-60-325-60-575s11-357 60-575c79-355 272-749 509-1040 92-114 274-294 387-384 287-229 675-417 1023-495 218-49 325-60 575-60s357 11 575 60c261 58 603 204 828 353 389 259 688 599 893 1016 125 255 196 484 241 775 24 161 24 539 0 700-45 291-116 520-241 775-134 272-283 480-498 692-211 209-404 346-673 478-252 124-486 197-765 240-126 19-468 27-599 15zm474-430c656-74 1243-450 1591-1020 275-452 369-998 263-1530-113-567-480-1085-989-1396-452-275-998-369-1530-263-567 113-1085 480-1396 989-156 258-260 562-294 865-22 200-10 457 31 665 113 567 480 1085 989 1396 251 153 562 260 850 293 107 12 379 13 485 1z" />
                                                    <path fill="white"
                                                        d="m2045 3816c-27-13-58-32-67-42-29-33-58-107-58-149 0-86 17-106 508-597l467-468-467-467c-491-492-508-512-508-598 0-42 29-116 58-149 26-30 113-66 157-66 87 1 102 13 668 578 296 295 553 557 570 582 29 41 32 52 32 120s-3 79-32 120c-17 25-274 287-570 582-566 565-581 577-668 578-22 0-62-11-90-24z" />
                                                </g>
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="films_container">
                        <ul class="films_list">

                            <?php
                                require_once './app/listar_filmes.php'; 
                                require_once './app/listar_categoria_filme.php';
                                require_once './app/listar_resolucao.php';

                                $contador = 0;

                                foreach ($resultado as $linha) {
                            ?>

                            <li class="films_item">
                                <div class="films_image">
                                    <img style="width: 200px; height: 281px;" src="imagens/filmes/<?=$linha['imagem'];?>" alt="">
                                </div>
                                <div class="films_name__container">
                                    <span class="films_name"><?=$linha['nome'];?></span>
                                </div>
                            </li>

                            <?php
                                $contador++;

                                if ($contador >= 5){
                                    break;
                                }
                            }
                            ?>

                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- Filmes em Cartaz -->

        <!-- Bomboniere -->
        <section class="bomboniere">
            <div class="container">
                <div class="row">
                    <h3 class="product_title">Bomboniere</h3>
                    <span class="product_subtitle">Todos os dias um combo com preço especial para você!</span>
                    <div class="col-12">
                        <h5 class="product_title__showcase">Pipocas</h5>
                        <ul class="product_list">
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 1]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>
                            
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 2]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 3]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 4]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 5]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>

                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="product_title__showcase">Bebidas</h5>
                        <ul class="product_list">
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 1]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>
                            
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 2]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 3]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 4]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 5]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>

                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="product_title__showcase">Doces</h5>
                        <ul class="product_list">
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 1]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>
                            
                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 2]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 3]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 4]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>
                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                            <li class="product_item">
                                <div class="product_image__wrapper">
                                    <img src="src/imagens/produto.png" alt="">
                                </div>
                                <div class="product_infos">
                                    <h4 class="product_name">[Nome Combo 5]</h4>
                                    <span class="product_description">Pipoca grande + Refri 2L</span>
                                    <span class="product_price">R$ <span class="product_price__buy">00,00</span></span>

                                    <span class="product_button">
                                        <a href="" class="product_button__link">Adicionar</a>
                                    </span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fim Bomboniere -->

        <!-- Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer_wrapper">
                        <span class="footer_text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, placeat dolorum rerum expedita error ex vero ipsa perferendis repellat unde consequuntur cupiditate qui omnis maiores aut consectetur beatae in magnam.
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Fim Footer -->
    </main>
</body>

</html>