<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Adcionar novo usuario</title>
</head>
<body>
	<h1>Adcionar novo usuario</h1>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST["email"];
		$nome = $_POST["nome"];
		$senha = $_POST["senha"];
		$login = $email . ";" . $nome . ";" . $senha . PHP_EOL;
		$arquivo = fopen("usuarios.txt", "a");
		fwrite($arquivo, $login);
		fclose($arquivo);
		echo "Usuario foi adicionado com sucesso.";
	}
	?>
	<form method="post">
		Email: <input type="text" name="email"><br>
		Nome: <input type="text" name="nome"><br>
		Senha: <input type="text" name="senha"><br>
		<input type="submit" value="Adcionar">
	</form>
</body>
</html>