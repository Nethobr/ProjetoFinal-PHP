<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Locadora do Clebão - Home</title>
</head>
<body class="container-fluid p-3 mb-2 bg-light text-dark">
	<center>
		<h1>Projeto final - Locadora do Clebão</h1>

		<form action="validar.php" method="post">
			
			<p>
				<label>Usuário:</label><br>
				<input type="text" name="usuario" required>
			</p>

			<p>
				<label>Senha:</label><br>
				<input type="password" name="senha" required>
			</p>

			<p>
				<button type="submit" name="entrar" class="btn btn-dark">Entrar</button>	
				<button type="reset" name="entrar" class="btn btn-secondary">Limpar</button>
			</p>

		</form>
	</center>
</body>
</html>