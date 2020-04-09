<?php
if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
	$id = $_GET['id'];
	$ser = "atu";
	$ano = $_GET['ano'];
}else{
	$nome = null;
	$id = null;
	$ser = "inse";
	$ano = null;
}
$cad_tur= '
<div class = "">
<form class="form" method="POST" action="crud/cad_tur.php?ser='.$ser.'">
	<label class="ca slideDown">Turma</label>
	<div>
	<input class="cad slideLeft" type="text"  name="ano" placeholder="Ano" value="'.$ano.'">
	<span class="focus-input100"></span>
	</div>
	<div>
	<input class="cad slideRight" type="text" name="nome" placeholder="Curso/Letra" value="'.$nome.'">
	<span class="focus-input100"></span>
	</div>
	<input type="hidden" name="id" value="'.$id.'">
	<button class="btn turma bigEntrance">Enviar</button>
</form>
</div>';
?>