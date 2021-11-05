<div class="box-content">
    <h2>Editar usuário</h2>
    <?php 
    require_once "../classes/MySql.php";
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $sql = MySql::conectar()->prepare('SELECT nome, senha FROM admin_usuarios');
            $sql->execute();
            
            //$resultado = UserOnline::Alerta();
        }
        
    ?>
        <form method="post" enctype="multipart/form-data">
            <label>Nome</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['name']; ?>">

            <label>Senha</label>
            <input for="pwd" type="password" name="senha" required value="<?php echo $_SESSION['password']; ?>">

            <label>Foto de perfil</label>
            <input type="file" value="" required value="<?php echo $_SESSION['img']; ?>">

            <input type="submit" name="acao" value="Atualizar">
        </form>
</div>