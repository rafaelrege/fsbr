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
  <title>Exclusão</title>
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

	<div id="corpo-form"> 
	<h1>Exclusão </h1>
	</div>
	
	
  <table border="0">
   <div class="container">
	<div class="areaPesquisa">
		<form action="" method="POST">
			<label for="cpf">CPF: </label>	
			<input type ="text" name ="pesquisar"  placeholder="Pesquisar CPF" maxlength="11" style="text-transform: capitalize" onkeypress="return somenteNumeros()">
			<input style= "background-color: rgb(221, 54, 48);
		border:none;
		cursor: pointer;
		border : 0;
		text-shadow:2px 2px 2px rgba(0, 0, 0, 0.5);
		border-radius: 0.Sen;
		box-shadow: 2px 2px 0 1px rgb(173, 83, 67);
		transition: box-shadow 0.3s ease, transform 0.3s ease;" type ="submit" name="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">
			

			
		</form>
		</table>
		
	</div>
	
	</div>
	
	<div id="corpo-tab"> 
	
	<?php	
	
	
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if(($_POST['pesquisar'])!= null){
		$Pesquisa = "%" . $_POST['pesquisar'] . "%";
		$sql = "SELECT * FROM cadastramento WHERE cpf LIKE '" . $Pesquisa . "'";
		
		
	

	}else{
		if ($row == 0){
			echo '<script> alert("Nenhum CPF foi encontrado."); </script>';
			
		}
		$Pesquisa = null;
	}
	
} else{

			$sql = "SELECT * FROM cadastramento WHERE cpf LIKE 'null'";
		} 
	
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$row = $stmt ->rowCount();
		
		echo "<table border=\"0\">";
		
		echo "<tr> <th>Id</th> <th>Nome</th> <th>CPF</th> <th>Cidade</th> <th>Estado</th> </tr>";
		
		while ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
			echo "<tr >";
			echo "<td style=\"line-height: 1.0;\">" . $linha->id . "</td>";
			echo "<td style=\"line-height: 1.0;\">" . $linha->nome . "</td>";
			echo "<td style=\"line-height: 1.0;\">" . $linha->cpf . "</td>";		
			echo "<td style=\"line-height: 1.0;\">" . $linha->cidade . "</td>";
			echo "<td style=\"line-height: 1.0;\">" . $linha->estado . "</td>";
		
			echo "</tr>";	
			$id = $linha->id;
		}
		echo "</table>";
	

	
			if ($row == 1){

				$sql1 = "DELETE FROM `cadastramento` WHERE `cadastramento`.`id` = ". $id;
				$stmt = $PDO->prepare($sql1);
				$stmt->execute();
				echo '<script> alert("CPF excluido com sucesso!"); </script>';

			}
			if ($row > 1){
				echo '<script> alert("Preencha o campo corretamente pois você selecionou mais de um CPF."); </script>';
				
			}
			?>
			
  

</div>
<div id="botao"> 
		<input style= "background-color: rgb(206, 202, 1) ;
		border:none;
		cursor: pointer;
		border : 0;
		text-shadow:2px 2px 2px rgba(0, 0, 0, 0.5);
		border-radius: 0.Sen;
		box-shadow: 2px 2px 0 1px rgba(212, 199, 14, 0.2) ;
		transition: box-shadow 0.3s ease, transform 0.3s ease;" type="button"value="Voltar"  onclick="location.href='cadastramento.php'">
</div>	
</body>
</html>