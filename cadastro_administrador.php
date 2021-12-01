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
        
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="register_container">
                        <form action="./app/cadastro_administrador.php" method="POST" class="register_form">
                            <h3 class="register_title">Faça o seu cadastro!</h3>

                            <div class="label-float">
                                <input type="text" name="nome" placeholder=" " required/>
                                <label>Nome</label>
                            </div>

                            <div class="label-float">
                                <input type="tel" name="telefone" placeholder=" " required/>
                                <label>Telefone</label>
                            </div>

                            <div class="label-float">
                                <input type="email" name="email" placeholder=" " required/>
                                <label>E-mail</label>
                            </div>

                            <div class="label-float">
                                <input type="password" name = "senha" placeholder=" " required/>
                                <label>Senha</label>
                            </div>

                            <input type="submit" class="label_button"value="ENVIAR">

                        </form>
                    </div>
                </div>
            </div>
        </section>

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