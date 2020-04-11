<?php
session_start();
include "param.php";
$nome = $_POST['name'];
$senha = $_POST['pass'];

$query = "SELECT `id`, `nome`, `senha` FROM `admin` WHERE nome LIKE '%".$nome."%' ";
$sql = mysqli_query($conexao,$query);
while ($linha = mysqli_fetch_assoc($sql)) {
			$id = $linha['id'];
            $nome_v = $linha['nome'];
            $senha_v = $linha['senha'];
			if ($nome == $nome_v && $senha == $senha_v) {
					$ok = "ok";
					$SESSION[$ok] = $ok;
					header('Location:inicio.php?log=ok&&pg=inicio&&id='.$id.'');
				}
			else{
				header('location:index.html');
			}
    }
  ?>
