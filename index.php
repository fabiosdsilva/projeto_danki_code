<?php include('config.php'); 
require_once "classes/Email.php"; 
require_once "classes/MySql.php";
require_once "classes/UsuarioOnline.php";
UserOnline::Online();
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/ont-awsome.min.css">
    <script src="https://kit.fontawesome.com/33eac2bf3e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto_01</title>
</head>
<body>
    <?php
        
        //Pegando IP e última ação de usuários conectdos
        


        //FOMUMÁRIOS DE CADASTROS
        //Botão CADASTRAR
            if(isset($_POST['acao']) && $_POST['identificador'] == 'form_home'){
                $email = $_POST['email'];
                $email_nome = $email;
                $nome = explode("@",$email_nome);
                $teste = new Email('smtp.mailtrap.io','03c64e9d01f07d','e9ffae8b9b4326', 2525);
                $teste->Emitente($email,$nome[0]);
                $teste->Destinatario('fabiosds17@gmail.com','Fabio Santos');
                $teste->Envio('Mais um e-mail foi cadastrado no nosso site!',"<pre>Nome: $nome[0]</pre>Email: $email</pre>",'Nao tem html :(');
                if(!$teste->Enviar()){
                    echo '<script>alert("Deu certo")</script>';
                }else{
                    echo '<script>alert("Deu errado")</script>';
                }
            //BOTÃO ENVIAR DA PÁGINA CADASTRO
            }else if(isset($_POST['acao']) && $_POST['identificador'] == 'form_contato'){
                $nome_contato       =    $_POST['nome'];
                $email_contato      =    $_POST['email'];
                $telefone_contato   =    $_POST['telefone'];
                $mensagem           =    $_POST['mensagem'];

                //Passando informações para o banco de dados
                $registro = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare('INSERT INTO clientes VALUES (NULL,?,?,?,?,?)');
                $sql->execute(array("$nome_contato","$email_contato","$mensagem","$telefone_contato","$registro"));

                $test = new Email('smtp.mailtrap.io','03c64e9d01f07d','e9ffae8b9b4326', 2525);
                $test->Emitente($email_contato,$nome_contato);
                $test->Destinatario('fabiosds17@gmail.com','Fabio Santos');
                $test->Envio('Recebemos uma nova mensagem!', "<pre>Nome: $nome_contato</pre><pre>Telefone: $telefone_contato</pre><pre>Mensagem: $mensagem</pre>",'Nao tem html :(');
                if(!$test->Enviar()){
                    echo '<script>alert("Deu certo")</script>';
                }else{
                    echo '<script>alert("Deu errado")</script>';
                }
            }
            
    ?>        
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch($url){
            case 'sobre':
                echo '<target target="sobre" />';
                break;
            case 'servicos':
                echo '<target target="servicos" />';
                break;   
        }
    ?>
    <header>
        <div class="center">
            <div class="logo left">Fabio Silva</ul> </div> 
            <!-- Paginação para Desktop -->  
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a> </li>
                </ul>
            </nav>
            <!-- Paginação para mobile -->
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a> </li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a> </li>
                </ul>
            </nav>
            </div> 
        <div class="clear"></div> 
    </div>
    </header>
    <!-- Final dos MENUS -->

    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            if($url != 'sobre' && $url != 'servicos'){
                $pagina404 = true;
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }   
        }
    ?>

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
        <div class="center">
            <p>Todos os direitos reservados</p>
        </div>
    </footer>
    
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <?php
        if($url == 'home' || $url == '');{
    ?>
        <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <?php
        }
    ?>
    <?php
        if($url == 'contato'){
    ?>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
    <?php
        }
    ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
</body>
</html>