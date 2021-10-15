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
  <title>Cadastramento</title>
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

				position: absolute;" onclick="openNav()">&#9776; Menu</span>
	<div id="corpo-form-cad"> 
	<h1>Rafael Rezende Rege</h1>
	</div>


    <div id="botao">
	<input style = " height: 5%;
		width: 20%;" type="button"value="Incluir"  onclick="location.href='inclusao.php'">
	<input  style = " height: 5%;
		width: 20%;" type="button"value="Alterar"  onclick="location.href='edicao.php'">
	<input  style = " height: 5%;
		width: 20%;" type="button"value="Excluir"  onclick="location.href='exclusao.php'">
	<br>
	<br>
	<input  style = " height: 5%;
		width: 20%;" type="button"value="Consultar"  onclick="location.href='consultar.php'">
	<input  style = " height: 5%;
		width: 20%;" type="button"value="Listagem"  onclick="location.href='lista.php'">
	<br>
	<br>
	<input style= "background-color: rgb(221, 54, 48);
	height: 5%;
	width: 20%;
	border:none;
	cursor: pointer;
	border : 0;
	text-shadow:2px 2px 2px rgba(0, 0, 0, 0.5);
	border-radius: 0.Sen;
	box-shadow: 2px 2px 0 1px rgb(173, 83, 67);
	transition: box-shadow 0.3s ease, transform 0.3s ease;" type="button"value="Sair"  onclick="location.href='sair.php'">
	</div>

</body>
</html>