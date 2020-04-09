<?php
include("../param.php");
$id = $_GET['id_disc'];
$id_t = $_GET['id_turma'];
$query = "DELETE FROM `disciplina_has_turma` WHERE disciplina_id_disc = $id and turma_id_turma = $id_t";
$sql = mysqli_query($conexao,$query);
header('location:../inicio.php?pg=cad_di&&ver=cad_di')


?>