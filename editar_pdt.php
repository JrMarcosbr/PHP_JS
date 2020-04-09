<?php
include("param.php");
if (isset($_GET['id_pdt'])) {
$id = $_GET['id_pdt'];

$pes = "SELECT * FROM `pdt` INNER JOIN turma on pdt.turma_id_turma = turma.id_turma where id_pdt = $id";
$sql_pes = mysqli_query($conexao,$pes);
 while ($value = mysqli_fetch_assoc($sql_pes)) {
 	$nome = $value['nome_pdt'];
 }
}else{
	$nome = null;
 }
 echo $pes;
	header('location:inicio.php?pg=cad_dt&&ver=cad_dt&&nome='.$nome.'&&id='.$id.'');
?>