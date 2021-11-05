<?php
        require_once "../classes/MySql.php";
        $user_online = UserOnline::ListarUsuarios();
?>
<link rel="shortcut icon" href="/painel/favicon.ico" type="image/x-icon">
<div class="w100 left box-content"> <!-- Esse preenche toda a area -->
        <div class="painel_adm">
                <h2> <i class="fa fa-home"></i> Painel Administrativo</h2>

                <!-- BOX COM 3 ESPAÇOS -->
                <div class="box">
                        <h3>Usuários online</h3>
                        <p> <?php echo count($user_online) ?> </p>
                </div>
                
                <div class="box">
                        <h3>Total de visitas</h3>
                        <p> 
                                <?php
                                        $sql = MySql::conectar()->prepare("SELECT * FROM visitas");
                                        $sql->execute();
                                        $sql->fetchAll();

                                        $visitas = $sql->rowCount();

                                        echo $visitas;
                                        
                                ?> 
                        
                        </p>
                </div>

                <!-- LISTAR VISITAS DE HOJE -->
                
                <div class="box">
                        <h3>Visitas hoje</h3>
                        <p>
                        <?php
                                $hoje = date("Y-m-d");
                                $sql = MySql::conectar()->prepare("SELECT * FROM visitas WHERE dia ='$hoje'");
                                $sql->execute();
                                $sql->fetchAll();

                                $visitas = $sql->rowCount();

                                echo $visitas;

                        ?>
                        
                        </p>
                </div>
                
        </div>
        
</div>
<div class="clear"></div>

<!-- BOX IP E ÚLTIMA AÇÃO -->
<div class="w100 box-content"> <!-- Preencre apenas a metade da area -->
        <div class="usuarios_online">
                <h2> <i class="fa fa-globe"></i> Usuários online</h2>
                <div class="table-reponsive">

                        <div class="row">
                                <div class="col w50 left">
                                        <span>IP</span>
                                </div>
                                <div class="col w50 right">
                                        <span>Última açao</span>
                                </div>
                        </div>
                        <div class="clear"></div>
                        <?php 
                                foreach($user_online as $Key => $value){                        
                        ?>
                        <div class="row">
                                <div class="col w50 left">
                                        <!-- PEGANDO O IP DO USER -->
                                        <span> 
                                                <?php 
                                                       echo $value['ip'];
                                                ?>
                                        </span>
                                </div>
                                <div class="col w50 right">
                                        <span> 
                                        <?php
                                                echo date('d/m/Y H:i:s', strtotime($value['ultima_acao']));
                                        ?>

                                        </span>
                                </div>
                        </div>
                        <div class="clear"></div>
                        <?php
                                }
                        ?>
                </div>
        </div> 
</div>
<div class="clear"></div> 
