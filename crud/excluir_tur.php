<?php
include("../param.php");
$id = $_GET['id_turma'];
$query = "DELETE FROM `turma` WHERE id_turma = $id";
$sql = mysqli_query($conexao,$query);
header('location:../inicio.php?pg=cad_tur&&ver=cad_tur')


?>