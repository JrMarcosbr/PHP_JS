<?php
include("../param.php");
$id = $_GET['id'];
$disc = $_GET['disc'];
$turma= $_GET['turma'];
$query = "DELETE FROM `professores_has_turma` WHERE professores_id_prof = $id and turma_id_turma= $turma";
$sql = mysqli_query($conexao,$query);
$query_d ="DELETE FROM `professores_has_disciplina` WHERE professores_id_prof = $id and disciplina_id_disc = $disc";
$sql_2 = mysqli_query($conexao,$query_d);
header('location:../inicio.php?ver=ver_prof');


?>