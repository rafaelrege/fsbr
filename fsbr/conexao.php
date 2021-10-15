<?php

try{
	//$HOST = "";    
	//$HOST = "localhost";
	$HOST = "177.71.228.143";
        $BANCO = "lono_dev_test1";
        $USUARIO = "dev1";
        $SENHA = "devpassword";
        $PDO = new PDO("mysql:host=".$HOST.";dbname=".$BANCO.";charset=utf8",$USUARIO,$SENHA);
	$mysqli = new mysqli($HOST, $USUARIO, $SENHA, $BANCO);
    } catch (PDOException $erro) {
        //echo "Erro de conexao, detalhes: ".$erro->getMessage();
        echo "conexao_erro";
    }

?>

