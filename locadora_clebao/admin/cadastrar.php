<?php 	
//verificar se form NÃO foi enviado
if (!isset($_POST['salvar']) || empty($_POST['nomefilme']) || empty($_POST['classindicativa']) || empty($_POST['datalanc'])  || empty($_POST['sinopse'])) 
{
		header('location:index.php?msg=cadembranco');
}
else
{
	$nome_filme 		= $_POST['nomefilme'];
	$class_idade 		= $_POST['classindicativa'];
	$dt_lanca_filme 	= $_POST['datalanc'];
	$descri_filme 		= $_POST['sinopse'];

	include_once '../database/filme.dao.php';

	$result = salvar_filme($nome_filme, $class_idade, $dt_lanca_filme, $descri_filme);

	if ($result) 
	{
		header('location:index.php?msg=cadastrado');
	}
	else
	{
		header('location:index.php?msg=errocadastro');
	}
}