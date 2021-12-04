<?php 	include_once 'lock.php'; 
include_once '../database/filme.dao.php'; 

    if (!isset($_GET['id_filme']))
    {
        header('location:index.php?msg=idinvalido');
    }
    else
    {
        $result = buscar_filme($_GET['id_filme']);

        if ($result == null)
        {
            header('location:index.php?msg=idinvalido');
        }
        else
        {
            $filme = $result;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Locadora do Clebão - Área Restrita</title>
</head>
<body class="container-fluid p-3 mb-2 bg-light text-dark">

	<h1>Locadora do Clebão - Edição gamer</h1>

	<p>
		<a href="logout.php">Sair do sistema</a>
	</p>

	<h3>Cadastrar filme</h3>

	<div class="col-12 shadow-sm p-3 mb-5 bg-body rounded">
		<form action="editado.php" method="post">
			
			<p>
				<label>Nome do filme</label><br>
				<input type="text" name="nomefilme" value = "<?= $filme['nome_filme']?>" required class="form-control">
			</p>

			<p>
				<label>Classificação indicativa</label><br>
				<input type="number" name="classindicativa" min="0" value = "<?= $filme['class_idade']?>" required class="form-control">
			</p>

			<p>
				<label>Data de lançamento do filme</label><br>
				<input type="date" name="datalanc" value = "<?= $filme['dt_lanca_filme']?>" required class="form-control">
			</p>

			<p>
				<label>Sinopse do filme</label><br>
				<input type="text" name="sinopse" value = "<?= $filme['descri_filme']?>" required class="form-control">
			</p>								

			<p>
				<button type="submit" name="salvar" class="btn btn-dark">Salvar</button>	
				<button type="reset" name="entrar" class="btn btn-secondary">Limpar</button>
			</p>
			<input type="hidden" name="id_filme" value = "<?= $filme['id_filme']?>" >
		</form>
	</div>
</body>
</html>