<?php
include('../param.php');
$id = $_POST['id'];
$curso = $_POST['nome'];
$ano = $_POST['ano'];
if (isset($_GET['ser'])&& $_GET['ser'] == "inse") {
$query = "INSERT INTO `turma`(`curso`, `ano`) VALUES ('$curso','$ano')";
$sql = mysqli_query($conexao,$query);
}

if (isset($_GET['ser'])&& $_GET['ser'] == "atu") {
$atu = "UPDATE `turma` SET `curso`='$curso',`ano`='$ano' WHERE id_turma = $id";
$sql_atu = mysqli_query($conexao,$atu);
}
header("location:../inicio.php?pg=cad_tur&&ver=cad_tur");
?>