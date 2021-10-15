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
  <title>Lista</title>
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
	<h1>Consultar</h1>
	</div>

<div id="corpo-form"> 
	<h1>Pesquisar CPF </h1>
	</div>
	
	
  <table border="0">
   <div class="container">
	
	
	<div class="areaPesquisa">
		<form action="" method="POST">
			<input type ="text" name ="pesquisar"  placeholder="Pesquisar CPF" maxlength="11" style="text-transform: capitalize" onkeypress="return somenteNumeros()" >
			<input  type ="submit" name="submit" value="Buscar">
			
		
			
		</form>
		</table>
		
	</div>
	
	</div>
	
	<div id="corpo-tab"> 
	
	<?php		

if ($_SERVER['REQUEST_METHOD'] == "POST"){

	$Pesquisa = $_POST['pesquisar'];
	
	
	$sql = "SELECT * FROM cadastramento WHERE cpf LIKE ".$Pesquisa ;

}
		
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		
		echo "<table border=\"0\">";
		
		echo "<tr> <th>Id</th> <th>Nome</th> <th>CPF</th> <th>Cidade</th> <th>Estado</th> </tr>";
		
		while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
			echo "<tr >";
			echo "<td style=\"line-height: 1.0;\">  " . $linha->id . "  </td>";
			echo "<td style=\"line-height: 1.0;\">  " . $linha->nome . "  </td>";
			echo "<td style=\"line-height: 1.0;\">  " . $linha->cpf . "  </td>";		
			echo "<td style=\"line-height: 1.0;\">  " . $linha->cidade . "  </td>";
			echo "<td style=\"line-height: 1.0;\">  " . $linha->estado . "  </td>";
			
			echo "</tr>";	
		}
		echo "</table>";
			?>
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
</div>
</body>
</html>