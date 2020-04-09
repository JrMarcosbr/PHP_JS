<?php
include "param.php";
$nome = $_POST['name'];
$senha = $_POST['pass'];

$query = "SELECT `id`, `nome`, `senha` FROM `admin`";
$sql = mysqli_query($conexao,$query);
while ($linha = mysqli_fetch_assoc($sql)) {
			$id = $linha['id'];
            $nome_v = $linha['nome'];
            $senha_v = $linha['senha'];
                     }
if ($nome == $nome_v && $senha == $senha_v) {
		session_start();
		$SESSION['log'] = 1;
		header('Location:inicio.php?log=ok&&pg=inicio&&id='.$id.'');
	}
else{
	header('location:index.html');
}
  ?>
