<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Excluir Pergunta</title>
</head>
<body>
	<h1>Excluir Pergunta e Respostas</h1>
	<form method="post">
		<label for="acharpergunta">Digite uma parte da pergunta ou número da pergunta para buscar:</label>
		<input type="text" id="acharpergunta" name="acharpergunta" required><br><br>
		<input type="submit" value="Buscar">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['deletando'])) {
		$acharpergunta = $_POST["acharpergunta"];
		$arquivo = file("perguntaserespostas.txt");
		$encontrado = false;
		$index = 0;

		foreach ($arquivo as $i => $pergunta) {
			if (stripos($pergunta, $acharpergunta) !== false) {
				$dados = explode(";", $pergunta);
				echo "<h2>Pergunta encontrada:</h2>";
				echo "<strong>Pergunta:</strong> " . $dados[0] . "<br>";
				echo "<strong>Alternativas:</strong><br>";
				echo "A: " . $dados[1] . "<br>";
				echo "B: " . $dados[2] . "<br>";
				echo "C: " . $dados[3] . "<br>";
				echo "D: " . $dados[4] . "<br>";
				echo "<strong>Gabarito:</strong> " . $dados[5] . "<br>";
				echo "<form method='post'>";
				echo "<input type='hidden' name='index' value='$i'>";
				echo "<input type='hidden' name='deletando' value='true'>";
				echo "<input type='submit' value='Excluir Pergunta'>";
				echo "</form>";
				$encontrado = true;
				break;
			}
		}

		if (!$encontrado) {
			echo "<p>Nenhuma pergunta encontrada com essas informações.</p>";
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deletando'])) {
		$index = $_POST["index"];
		$arquivo = file("perguntaserespostas.txt");

		unset($arquivo[$index]);

		file_put_contents("perguntaserespostas.txt", implode("", $arquivo));

		echo "<p>Pergunta excluída com sucesso.</p>";
	}
	?>
</body>
</html>
