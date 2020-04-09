<?php
include('param.php');
$dia = $_POST['dia'];
$query = "UPDATE `horario` SET `sala1`='',`sala2`='',`sala3`='',`sala4`='',`sala5`='',`sala6`='',`sala7`='',`sala8`='',`sala9`='',`sala10`='',`sala11`='',`sala12`='',`sala13`=''  WHERE dia = '$dia'";
$sql = mysqli_query($conexao, $query);
echo "ok";
?>