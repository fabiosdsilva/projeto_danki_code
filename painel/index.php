<?php

include('../config.php');
require_once('../classes/Painel.php');
require_once('../classes/UsuarioOnline.php');

if(Painel::logado() == false){
    include('login.php');
}else{
    include('main.php');
}

?>