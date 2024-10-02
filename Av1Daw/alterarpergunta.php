<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Alterar Pergunta</title>
</head>
<body>
	<h1>Alterar Pergunta e Respostas</h1>
	<form method="post">
		<label for="acharpergunta">Digite uma parte da pergunta ou o número da pergunta para buscar:</label>
		<input type="text" id="acharpergunta" name="acharpergunta" required><br><br>
		<input type="submit" value="Buscar">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['pergunta'])) {
		$acharpergunta = $_POST["acharpergunta"];
		$arquivo = file("perguntaserespostas.txt");
		$encontrado = false;
		$index = 0;
		
		foreach ($arquivo as $i => $pergunta) {
			if (stripos($pergunta, $acharpergunta) !== false) {
				$dados = explode(";", $pergunta);
				echo "<h2>Pergunta encontrada:</h2>";
				echo "<form method='post'>";
				echo "<input type='hidden' name='index' value='$i'>";
				echo "Pergunta: <input type='text' name='pergunta' value='" . $dados[0] . "' required><br>";
				echo "A: <input type='text' name='a' value='" . $dados[1] . "' required><br>";
				echo "B: <input type='text' name='b' value='" . $dados[2] . "' required><br>";
				echo "C: <input type='text' name='c' value='" . $dados[3] . "' required><br>";
				echo "D: <input type='text' name='d' value='" . $dados[4] . "' required><br>";
				echo "Gabarito: <input type='text' name='gabarito' value='" . $dados[5] . "' required><br>";
				echo "<input type='submit' value='Salvar Alterações'>";
				echo "</form>";
				$encontrado = true;
				break;
			}
		}

		if (!$encontrado) {
			echo "<p>Nenhuma pergunta encontrada com essas informações.</p>";
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pergunta'])) {
		$index = $_POST["index"];
		$pergunta = $_POST["pergunta"];
		$respostas = $_POST["a"] . ";" . $_POST["b"] . ";" . $_POST["c"] . ";" . $_POST["d"];
		$gabarito = $_POST["gabarito"];
		$arquivo = file("perguntaserespostas.txt");

		$arquivo[$index] = $pergunta . ";" . $respostas . ";" . $gabarito . PHP_EOL; 
		file_put_contents("perguntaserespostas.txt", implode("", $arquivo)); 

		echo "<p>Pergunta e respostas alteradas com sucesso.</p>";
	}
	?>
</body>
</html>
