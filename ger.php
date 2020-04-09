<?php
include("param.php");
$dia = 1;
$aula = 1;

	while ($aula < 12) {
		$query = "INSERT INTO `horario`(`dia`, `aula`) VALUES ('".$dia."','".$aula."')";
		$sql = mysqli_query($conexao,$query);
		$aula++;
			if ($aula == 11) {
				$aula = 1;
				$dia++;
			}
			if ($dia == 6) {
				$aula = 13;
			}
		}
?>