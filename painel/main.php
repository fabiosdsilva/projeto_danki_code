<?php

    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="../css/font-awsome.min.css">
    <script src="https://kit.fontawesome.com/33eac2bf3e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <nav>
        <div class="box-usuario">

        <!-- Se no banco de dados a coluna img estiver vazia
            então, no painel vai aparecer o avatar, caso contrário
            irá aparecer a img que a pessoa escolheu.
        -->
            <?php
                if($_SESSION['img'] == ''){ //Se estiver vazia, vai aparecer o avatar no pefil
            ?>
                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div>
            <?php 
            
                }else{ ?> <!-- Se não estiver vazia, vai aparecer a imagem da pessoa -->
                <div class="imagem-usuario"> 
                    <img src="<?php  echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img'];?>" alt="">
                </div>

            <?php
                }
            ?>

            <div class="nome-usuario">
                <p><?php echo $_SESSION['usuario']; ?></p>
                <p><?php echo pegaCargos($_SESSION['cargo']); ?></p>
            </div>
        </div>
        <div class="itens-menu">
                <h2>Cadastro</h2>
                <a href="">Cadastrar Depoimento</a>
                <a href="">Cadastrar Serviço</a>
                <h2>Gestão</h2>
                <a href="">Listar Depoimentos</a>
                <a href="">Listar Serviços</a>
                <a href="">Listar Slides</a>
                <h2>Administração</h2>
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuarios">Editar Usuários</a>
                <a href="">Adicionar Usuários</a>
                <h2>Configurações</h2>
                <a href="">Editar</a>
        </div>
        <div class="clear"></div>
    </nav>
    
    <header>
        <div class="center-bar">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            <div class="loggout right">
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa fa-window-close"></i><span> Sair</span> </a>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <div class="content">

       <?php 

            Painel::CarregarPagina();
        
       ?>         

    </div><!-- FIM DA CLASSE CONTENT -->
    <div class="clear"></div>      
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
</body>
</html>