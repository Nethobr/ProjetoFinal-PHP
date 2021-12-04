<?php 

include_once 'conn.php';

//função para salvar filme
function salvar_filme($nome_filme, $class_idade, $dt_lanca_filme, $descri_filme)
{
	$conn = conectar();

	$sql = "INSERT INTO filmes (nome_filme, class_idade, dt_reg_filme, dt_lanca_filme, descri_filme, status_alug) VALUES
					  ('$nome_filme', '$class_idade', now(), '$dt_lanca_filme', '$descri_filme', 0);";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}
	return false;
}

//função para buscar filmes
function buscar_filmes()
{
	$conn = conectar();

	$sql = "SELECT * FROM filmes";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return $result;
	}
	return null;
}
//função para exibir filmes
function exibir_filmes()
{
	$result = buscar_filmes();

	//se valor result for nulo, retornar msg de erro
	if ($result == null) 
	{
		$retorno = '<h3>Não há filmes para exibir</h3>';
	}
	else //senão (tem pelo menos um filme)
	{
		$retorno = '<table class="table">';

		//primeira linha da tabela

		$retorno .= '<tr class="table-dark">';
		$retorno .= '<th>ID #</th>';
		$retorno .= '<th>Nome</th>';
		$retorno .= '<th>Classificação</th>';
		$retorno .= '<th>Data de registro</th>';
		$retorno .= '<th>Data de lançamento</th>';
		$retorno .= '<th>Sinopse</th>';
		$retorno .= '<th>Deletar</th>';
		$retorno .= '<th>Editar</th>';
		$retorno .= '</tr>';

		while($filme = mysqli_fetch_assoc($result))
		{

			$retorno .= '<tr>';

			$retorno .= "<td>" . $filme['id_filme'] . "</td>";
			$retorno .= "<td>" . $filme['nome_filme'] . "</td>";
			$retorno .= "<td>" . $filme['class_idade'] . "</td>";
			$retorno .= "<td>" . $filme['dt_reg_filme'] . "</td>";
			$retorno .= "<td>" . $filme['dt_lanca_filme'] . "</td>";
			$retorno .= "<td>" . $filme['descri_filme'] . "</td>";
			$retorno .= "<td>".delet_link($filme['id_filme']). "</td>";
			$retorno .= "<td>".update_link($filme['id_filme']). "</td>";
			$retorno .= '</tr>';
		}
		$retorno .= '</table>';
	}
	return $retorno;
}
//pegar um filme só
function buscar_filme($id_filme)
{
	$conn = conectar();
	$sql =  "SELECT * FROM filmes WHERE id_filme = $id_filme";

	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);

	if (mysqli_affected_rows($conn) > 0)
	{
		return $res;
	}
	return null;
}

//fumção de link deletar foda
function delet_link($id_filme)
{
	$filme = buscar_filme($id_filme);

	$link = '<a href="deletar.php?id_filme='.$id_filme.'" 
	onclick="return confirm(\'Vai de deletar o filme: #'.$id_filme.' '.$filme['nome_filme'].'?\')" class="btn btn-outline-danger">Deletar</a>';

	return $link;
} 
//função de deletar
function delet_filme ($id_filme)
{
	$conn = conectar ();

	$sql = "DELETE FROM filmes WHERE id_filme = $id_filme";

	$result = mysqli_query ($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}
	return false;
}

//link de update
function update_link ($id_filme)
{
	$link = '<a href="editar.php?id_filme='.$id_filme.'" class="btn btn-outline-warning">Editar</a>';
	return $link;
}
//edita o filme fonfon
function update_filme ($id_filme, $nome_filme, $class_idade, $dt_lanca_filme, $descri_filme)
{
	$conn = conectar();
	$sql = "UPDATE filmes SET nome_filme = '$nome_filme', class_idade = '$class_idade', 
	dt_lanca_filme = '$dt_lanca_filme', descri_filme = '$descri_filme' WHERE id_filme = '$id_filme'";

	$result = mysqli_query ($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}
	return false;
}
?>