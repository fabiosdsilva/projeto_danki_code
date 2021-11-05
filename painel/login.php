<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/font-awsome.min.css">
    <script src="https://kit.fontawesome.com/33eac2bf3e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL;?>css/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <section class="painel_login">
        <div class="center">
            <div id=q class="w50 left formulario">
                <h2>Login</h2>
                <?php
                    require_once('../classes/MySql.php');
                    
                    if(isset($_POST['acao'])){
                        $usuario    = $_POST['nome'];
                        $senha      = $_POST['senha'];
                        $sql        = MySql::conectar()->prepare("SELECT * FROM admin_usuarios WHERE nome=? AND senha=?");
                        $sql->execute(array($usuario,$senha));
                        if($sql->rowCount() == 1){
                            $info = $sql->fetch();
                            $_SESSION['login'] = true;
                            $_SESSION['name'] = $usuario;
                            $_SESSION['password'] = $senha;
                            $_SESSION['cargo'] = $info['cargo'];
                            $_SESSION['usuario'] = $info['usuario'];
                            $_SESSION['img'] = $info['img'];
                            header('Location : '.INCLUDE_PATH_PAINEL);
                            die();
                        }else{
                            echo "<div class='login-erro'> <h4>Usuário ou senha incorretos! </div><h4>";
                        }
                    }
                ?>
                <form method="post">
                    <label for="">Nome de usuário</label>
                    <div></div>
                    <input type="text" name="nome" placeholder="digite seu nome" require>
                    <div></div>
                    <label for="">Senha</label>
                    <div></div>
                    <input type="password" name="senha" placeholder="digite sua senha" require>
                    <div></div>
                    <ul><li><a href="">Esqueceu a senha?</a></li></ul>
                    <div></div>
                    <input type="submit" name="acao" value="Entar">
                </form>
            </div>
            <div id=nota class="w50 right nota">
                <h2>Welcome!</h2>
            </div>
        <div class="clear"></div>
        </div>
    </section>
</body>
</html>