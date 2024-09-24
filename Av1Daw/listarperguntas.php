<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Listar todas as perguntas</title>
</head>
<body>
	<h1>Listar todas as perguntas</h1>
	<?php
	$arquivo = file("perguntas.txt");
	echo "<table>";
	echo "<tr><th>Perguntas</th><th>Alternativas</th><th>Gabarito</th></tr>";
	foreach ($arquivo as $perguntas) {
		$dados = explode(";", $perguntas);
		echo "<tr>";
		echo "<td>" . $dados[0] . "</td>";
		echo "<td>" . $dados[1] . "</td>";
		echo "<td>" . $dados[2] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>
</html>