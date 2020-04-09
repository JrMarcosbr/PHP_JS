<?php
include('../param.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$base = $_POST['base'];
$turma_id = $_POST['turma_id'];
$semestre = $_POST['semestre'];
if (isset($_GET['ser'])&& $_GET['ser'] == "inse") {
$query = "INSERT INTO `disciplina`(`nome_d`,`base`,`semestre`) VALUES ('$nome','$base','$semestre')";
$sql = mysqli_query($conexao,$query);

$q = "SELECT * FROM `disciplina` WHERE nome_d = '$nome'";
$sql_q = mysqli_query($conexao,$q);
while ($res = mysqli_fetch_assoc($sql_q)) {
	$n = $res['id_disc'];
	$q1 = "INSERT INTO `disciplina_has_turma`(`disciplina_id_disc`, `turma_id_turma`) VALUES ('$n','$turma_id')";
	$sql = mysqli_query($conexao,$q1);
	}
}


if (isset($_GET['ser'])&& $_GET['ser'] == "atu") {
	$atu = "UPDATE `disciplina` SET `nome_d`= '$nome',`base`='$base' WHERE id_disc = $id";
	$sql_atu = mysqli_query($conexao,$atu);
	$atu2 = "UPDATE `disciplina_has_turma` SET `disciplina_id_disc`=$id,`turma_id_turma`= $turma_id WHERE disciplina_id_disc = $id";
	$sql2 = mysqli_query($conexao,$atu2);
}
header("location:../inicio.php?pg=cad_di&&ver=cad_di");
?>	