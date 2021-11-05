<?php 
    class UserOnline {

       public static function Online(){
            if(isset($_SESSION['online'])){
                $horarioatual = date('Y-m-d H:i:s'); //última ação
                $token = $_SESSION['online'];
                $sql = MySql::conectar()->prepare("UPDATE usuarios_online SET ultima_acao = ? WHERE token = ?");
                $sql->execute(array("$horarioatual","$token"));
            }else{
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $horarioatual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare("INSERT INTO usuarios_online VALUES (NULL,?,?,?)");
                $sql->execute(array("$ip","$horarioatual","$token"));

            }
       }

        public static function ListarUsuarios(){
            self::LimparUsuarios();        
            $sql = MySql::conectar()->prepare("SELECT * FROM usuarios_online");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function LimparUsuarios(){
                $data_atual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->exec("DELETE FROM usuarios_online WHERE ultima_acao < '$data_atual' - INTERVAL 01 MINUTE");
        }

        public static function ListarVisitas(){

            //Embaixo serve para apagar todos os cookies
            //setcookie('visitas','true', time() - 1);

            if(!isset($_COOKIE['visitas'])){
                //Esse cookie vai estar disponível por 7 dias
                setcookie('visitas', time() + (60*60*24*7));
                $sql = MySql::conectar()->prepare("INSERT INTO visitas VALUES (NULL, ?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'], date('Y-m-d')));
            }
        }

        public static function Alerta($tipo,$mensagem){
            if($tipo == 'sucesso'){
                echo "<div class='box-alert sucesso'>$mensagem</div>";

            }else if ($tipo == 'erro'){
                echo "<div class='box-alert erro'>$mensagem</div>";

            }else{
                echo "Há coisas erradas por aqui!";
            }
        }
    }
?>