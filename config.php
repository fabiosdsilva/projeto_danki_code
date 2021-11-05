<?php
    session_start();
    require_once "classes/UsuarioOnline.php";
    date_default_timezone_set('America/Sao_Paulo');
    define('INCLUDE_PATH','http://localhost/projeto_01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');


    //Conexão com o banco de dados
    define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','1234');
	define('DATABASE','testesphp');

    //Funções

    function pegaCargos($cargos){
        $array = ['0'=>'Normal','1'=>'Gerente','2'=>'Adminstrador'];
        return $array[$cargos];
    };

?>