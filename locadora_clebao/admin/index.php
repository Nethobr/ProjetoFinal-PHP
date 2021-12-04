<?php 	include_once 'lock.php'; 
include_once '../database/filme.dao.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Locadora do Clebão - Área Restrita</title>
</head>
<body class="container-fluid p-3 mb-2 bg-light text-dark">

	<h1>Locadora do Clebão - Área Restrita</h1>
	<p>
		<a href="logout.php" class="btn btn-light">Sair do sistema</a>
	</p>

	<h3>Cadastrar filme</h3>

	<div class="col-12 shadow-sm p-3 mb-5 bg-body rounded">
		<form action="cadastrar.php" method="post">
			
			<p>
				<label >Nome do filme</label><br>
				<input type="text" name="nomefilme" required class="form-control">
			</p>

			<p>
				<label>Classificação indicativa</label><br>
				<input type="number" name="classindicativa" min="0" required class="form-control">
			</p>

			<p>
				<label>Data de lançamento do filme</label><br>
				<input type="date" name="datalanc" required class="form-control">
			</p>

			<p>
				<label>Sinopse do filme</label><br>
				<input type="text" name="sinopse" required class="form-control">
			</p>								

			<p>
				<button type="submit" name="salvar" class="btn btn-dark">Salvar</button>	
				<button type="reset" name="entrar" class="btn btn-secondary">Limpar</button>
			</p>
		</form>
	</div>
	
	<?php
				if (isset($_GET['msg']))
				{
					include_once '../util.php';
					echo valida_msg ($_GET['msg']);
				}
	?>

	<div class="col-12">
	<h2>FILMES</h2>

	<?php 

	echo exibir_filmes();

	 ?>
	</div>

</body>
</html>