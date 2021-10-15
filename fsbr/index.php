<?php
//error_reporting(0);
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>
<script src="script/alerta.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="CSS/iconee.ico">
<html lang="pt-br">
<head>
	<meta charset = "utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
	<div id="corpo-form"> 
	<h1>Entrar </h1>
	<form method="POST">
		<input type="text" placeholder="Usuário" name="user" maxlength="15"  style="text-transform: capitalize" onkeypress="return somenteLetra()"  id="text" onkeypress="return minusculo()">
		<input type="password" placeholder="Senha" name="senha" id="text" onkeypress="return minusculo()">
		<input type="submit" value="Acessar">
	</form>
	</div>
<?php

if(isset($_POST['user']))
{
	$user = addslashes($_POST['user']);
	$senha = addslashes($_POST['senha']);
	if(!empty($user) && !empty($senha)) {
		$u ->conectar("lono_dev_test1","177.71.228.143","dev1","devpassword");
			if($u->msgErro == ""){
				if($u->logar($user,$senha)){
					echo '<script> correto(); </script>';
					echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastramento.php'>";
				}
				else{
					echo '<script> falha1(); </script>';
					
				}
			}		
			else{
				echo '<script> falha2(); </script>';
			}
	}
	else{
		echo '<script> falha3(); </script>';
	}
}
	
?>
</body>
</html>