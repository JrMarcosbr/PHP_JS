<?php
require_once('../param.php');
$id_turma = $_POST['turma'];
$nome = $_POST['nome'];
if (isset($_GET['ser'])&& $_GET['ser'] == "inse") {
$query = "INSERT INTO `pdt`(`turma_id_turma`, `nome_pdt`) VALUES ($id_turma,'$nome')";
$sql = mysqli_query($conexao,$query);

}

if (isset($_GET['ser'])&& $_GET['ser'] == "atu") {
	$id = $_GET['id'];
	$query = "UPDATE `pdt` SET `turma_id_turma`= $id_turma,`nome_pdt`='$nome' WHERE id_pdt = $id";
	$sql = mysqli_query($conexao,$query);
}
header("location:../inicio.php?pg=cad_pdt&&ver=cad_pdt");
?>