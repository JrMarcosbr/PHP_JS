<?php
include("param.php");
if (isset($_GET['id_disc'])) {
$id = $_GET['id_disc'];
$id_t = $_GET['id_turma'];
$pes = "SELECT  turma.ano,turma.curso,disciplina.nome_d,disciplina.base,disciplina.id_disc,turma.id_turma FROM `disciplina`
INNER JOIN disciplina_has_turma on disciplina.id_disc = disciplina_has_turma.disciplina_id_disc
INNER JOIN turma on disciplina_has_turma.turma_id_turma = turma.id_turma WHERE id_disc = $id and id_turma = $id_t";
$sql_pes = mysqli_query($conexao,$pes);
 while ($value = mysqli_fetch_assoc($sql_pes)) {
 	$nome = $value['nome_d'];
 	$id_t = $value['id_turma'];
 	$base = $value['base'];
 }
}else{
	$nome = null;
	$id_t = null;
 	$base =  null;
 }
	header('location:inicio.php?pg=cad_di&&ver=cad_di&&base='.$base.'&&id_t='.$id_t.'&&nome='.$nome.'&&id='.$id.'');
?>