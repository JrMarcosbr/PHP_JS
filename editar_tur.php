<?php
include("param.php");
if (isset($_GET['id_turma'])) {
$id = $_GET['id_turma'];
$pes = "SELECT * FROM turma WHERE id_turma = $id";
$sql_pes = mysqli_query($conexao,$pes);
 while ($value = mysqli_fetch_assoc($sql_pes)) {
 	$nome = $value['curso'];
 	$ano = $value['ano'];
}
}
else{
	$nome = null;
	$ano = null;
}
 header('location:inicio.php?pg=cad_tur&&ver=cad_tur&&nome='.$nome.'&&ano='.$ano.'&&id='.$id.'');
?>