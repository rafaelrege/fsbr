<?php
	error_reporting(0);
	session_start();

	if(!isset($_SESSION))
	{
		header("location: index.php");
		exit;
		
	}
	include("conexao.php");  

?>
<script src="script/alerta.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="CSS/iconee.ico">
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <title>Inclusão</title>
  	<link rel="stylesheet" href="CSS/estilo1.css">
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <a href="cadastramento.php">Cadastramento</a>
  <a href="inclusao.php">Incluir</a>
  <a href="edicao.php">Alterar</a>
  <a href="exclusao.php">Excluir</a>
  <a href="consultar.php">Consultar</a>
  <a href="lista.php">Listagem</a>
  <a href="sair.php">Sair</a>
</div>
<span style="	font-size:30px;
				cursor:pointer;
				right: 0.5%;
				//color: white;
				position: absolute;" onclick="openNav()">&#9776; Menu</span>


	<div id="corpo-form-cad"> 
	<h1>Inclusão</h1><br>
	<form method="POST">
		<label for="estado">Estado: </label>		
<?php
$sql = "SELECT estado FROM estados";
$stmt = $PDO->prepare($sql);
$stmt->execute();


echo "<select name='estado' placeholder='Estado'>";
echo "<option value=''>Selecione um estado</option>";
while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){

	echo "<option value=".$linha->estado.">". $linha->estado . "  </option>";	
	
}
echo "</select>";
			?>
	<br>
		<label for="nome">Nome: </label>
		<input type="text" name="nomecomp" placeholder="Nome" maxlength="100" style="text-transform: capitalize" id="text" onkeypress="return somenteLetra()"><br>
		<label for="cpf">CPF: </label>
		<input type="text" name="cpf" placeholder="CPF" maxlength="11" style="text-transform: capitalize" id="text" onkeypress="return somenteNumeros()"><br>
		<label for="cidade">Cidade: </label>
		<input type="text" name="cidade" placeholder="Cidade" maxlength="50" style="text-transform: capitalize" id="text" onkeypress="return somenteLetra()"><br>
		
		</div>
		<div id="botao"> 
		<input style= "background-color: rgb(221, 54, 48);
		border:none;
		cursor: pointer;
		border : 0;
		text-shadow:2px 2px 2px rgba(0, 0, 0, 0.5);
		border-radius: 0.Sen;
		box-shadow: 2px 2px 0 1px rgb(173, 83, 67);
		transition: box-shadow 0.3s ease, transform 0.3s ease;" type="button"value="Voltar"  onclick="location.href='cadastramento.php'">
		<input style= "background-color: rgb(29, 212, 53);
		border:none;
		cursor: pointer;
		border : 0;
		text-shadow:2px 2px 2px rgba(0, 0, 0, 0.5);
		border-radius: 0.Sen;
		box-shadow: 2px 2px 0 1px rgb(19, 153, 37);
		transition: box-shadow 0.3s ease, transform 0.3s ease;" type="submit" value="Salvar">
		</div>
	</form>





<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$estado = $_POST['estado'] ;
$nomecomp =   $_POST['nomecomp'] ;
$cpf =  $_POST['cpf'] ;
$cidade =  $_POST['cidade'] ;


if (!empty($estado) &&  !empty($nomecomp) && !empty($cpf) && !empty($cidade)){

	$sql = "SELECT cpf FROM cadastramento WHERE cpf LIKE '" . $cpf . "'";
	$stmt = $PDO ->prepare($sql);
	$stmt->execute();
	$stmt->fetch(PDO::FETCH_OBJ);

	if($stmt ->rowCount() > 0) {
		echo '<script> existente(); </script>';

	}
	else{
	$sql1 = "INSERT INTO cadastramento ( nome, cpf, cidade, estado) VALUES ('". $nomecomp . "','" . $cpf. "','" . $cidade . "','". $estado ."')";
	$stmt = $PDO ->prepare($sql1);
	$stmt->execute();
	$stmt->fetch(PDO::FETCH_OBJ);
	echo '<script> criado(); </script>';
}
}
}
?>

			
  

</div>
</body>
</html>