<?php
include("../param.php");
$id = $_GET['id_pdt'];
$query = "DELETE FROM `pdt` WHERE id_pdt = $id";
$sql = mysqli_query($conexao,$query);
header('location:../inicio.php?pg=cad_pdt&&ver=cad_pdt')


?>