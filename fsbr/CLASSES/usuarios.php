<?php
error_reporting(0);
class Usuario{
	private $PDO;
	public $msgErro = "";
	public function conectar ($nome, $host, $usuario, $senha){
	try{
		//$HOST = "";    
		//$HOST = "localhost";

		global $PDO;
		$PDO = new PDO("mysql:dbname=".$nome.";host".$host,$usuario, $senha);
	} catch (PDOException $e) {
		$msgErro = $e-> getMessage();
	}
	}
	
	public function logar ($user, $senha){
		if (($user == admin) && ($senha == admin)){
			session_start();
			$_SESSION = $user;
			return true;

		}

		else{

		return false;

		}
		
	}

	
	
	

	public function adicionar ($nomecomp, $email, $tel, $estado, $cargo){
		global $PDO;
		//Verificar se já existe cadastro
		$sql = $PDO -> prepare("SELECT cpf FROM cadastramento WHERE cpf = :a");
		$sql->bindValue(":a",$cpf);
		$sql->execute();
	if($sql ->rowCount() > 0) {
		return false;
	}
	else{
		$sql = $PDO->prepare("INSERT INTO cadastramento (nome, cpf, cidade, estado) VALUES (:a, :b,:c,:d)");
		$sql->bindValue(":a",$nomecomp);
		$sql->bindValue(":b",$cpf);
		$sql->bindValue(":c",$cidade);
		$sql->bindValue(":d",$estado);
		$sql->execute();
		return true;
	}
	}
}
?>