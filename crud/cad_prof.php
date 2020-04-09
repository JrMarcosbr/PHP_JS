<?php
include('../param.php');

$nome = $_POST['nome'];
$carga_h =  $_POST['carga'];
$base = $_POST['base'];

$dias = $_POST['dias'];

if (isset($_GET['ser'])&& $_GET['ser'] == "inse") {

$query = "INSERT INTO `professores`(`nome`, `carga_h`, `base`, `dias_off`) VALUES ('$nome','$carga_h','$base','$dias')";
$sql = mysqli_query($conexao,$query);

			$query_p = "SELECT * FROM  `professores` WHERE nome = '$nome'";
			$sql_p = mysqli_query($conexao,$query_p);
			while ($value = mysqli_fetch_assoc($sql_p)) {
				$id_prof = $value['id_prof'];
			}

	$sql2 = "SELECT * FROM  turma";
		$q2 = mysqli_query($conexao, $sql2);
		$aux = 1;
		while ($value = mysqli_fetch_assoc($q2)) {
			if (isset($_POST[$aux])) {
				if ($_POST[$aux] == $value['id_turma']) {
					$id_turma = $_POST[$aux];
					$query_i = "INSERT INTO `professores_has_turma`(`professores_id_prof`, `turma_id_turma`) VALUES ('$id_prof','$id_turma')";
					$sql8 = mysqli_query($conexao,$query_i);
				}
			}
	     	$aux++;
		}
		$sql3 = "SELECT * FROM  disciplina";
		$q3 = mysqli_query($conexao, $sql3);
		$cn = 1;
		while ($value = mysqli_fetch_assoc($q3)) {
			if (isset($_POST[$cn.'a'])) {
				if ($_POST[$cn.'a'] == $value['id_disc']) {
					$id_disc = $_POST[$cn.'a'];
					$query_r = "INSERT INTO `professores_has_disciplina`(`professores_id_prof`, `disciplina_id_disc`) VALUES ('$id_prof','$id_disc')";
					$sql4 = mysqli_query($conexao,$query_r);
				}
			}
	     	$cn++;
		}

}


if (isset($_GET['ser'])&& $_GET['ser'] == "atu") {
	$id = $_GET['id'];
		$sql2 = "SELECT * FROM  turma";
		$q2 = mysqli_query($conexao, $sql2);
		$aux = 1;
		while ($value = mysqli_fetch_assoc($q2)) {
			if (isset($_POST[$aux])) {
				$turma = $value['id_turma'];
			}
	     	$aux++;
		}
		$sql3 = "SELECT * FROM  disciplina";
		$q3 = mysqli_query($conexao, $sql3);
		$cn = 1;
		while ($value = mysqli_fetch_assoc($q3)) {
			if (isset($_POST[$cn.'a'])) {

			}
	     	$cn++;
		}
$query = "UPDATE `professores` SET `nome`='$nome',`carga_h`='$carga_h',`base`='$base',`disciplina_id`='$disc',`turma_id`='$turma',`dias_off`='$dias' WHERE id_prof = $id";
$sql = mysqli_query($conexao,$query);
 echo $query;
$query_t = "UPDATE `turma_has_professores` SET `turma_id_turma`='$turma',`professores_id_prof`='$id' WHERE professores_id_prof = $id ";
$sql_t = mysqli_query($conexao,$query_t);
 }

header("location:../inicio.php?ver=ver_prof");
?>