<?php 
//função para buscar um usuário no bd
function buscar_usuario($usuario, $senha)
{
	//incluir arquivo de conexão
	include_once 'conn.php';

	//estabelecer conexão com o bd
	$conn = conectar();

	//montar busca na tabela usuarios
	$sql = "SELECT * FROM USUARIOS WHERE nome_us = '$usuario' AND senha_us = '$senha'";

	//executar comando sql
	$result = mysqli_query($conn, $sql);

	//verificar o numero de linhas afetadas pelo comando sql
	if (mysqli_affected_rows($conn) > 0) 
	{
		return true;
	}

	return false;
}
