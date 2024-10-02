<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Listar uma pergunta</title>
</head>
<body>
	<h1>Listar uma pergunta</h1>
	<form method="post">
		<label for="acharpergunta">Digite uma parte da pergunta ou o número da pergunta:</label>
		<input type="text" id="acharpergunta" name="acharpergunta" required><br><br>
		<input type="submit" value="Buscar">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$acharpergunta = $_POST["acharpergunta"];
		$arquivo = file("perguntaserespostas.txt");
		$encontrado = false;
		
		foreach ($arquivo as $pergunta) {
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
				$encontrado = true;
				break;
			}
		}

		if (!$encontrado) {
			echo "<p>Nenhuma pergunta encontrada com essa informação.</p>";
		}
	}
	?>
</body>
</html>
