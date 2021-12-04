<?php 
//verificar se o form não foi enviado
if (!isset($_POST['entrar']) || empty($_POST['usuario']) || empty($_POST['senha']))
{
	// redirecionar para home
	header('location:index.php?msg=embranco');
}
else
{
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	//incluir o arquivo usuario.dao
	include_once 'database/usuario.dao.php';

	//buscar usuario na tabela usuarios com base nos dados fornecidos no form
	$result = buscar_usuario($usuario, $senha);

	//se usuario e senha são corretos, $result = true
	if ($result) 
	{
		//iniciar sessao
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha'] = $senha;


		//redirecionar usuario para pagina restrita
		header('location:admin/index.php');
	}
	else
	{
		//redirecionar usuario para home
		header('location:index.php?msg=invalido');
	}
}