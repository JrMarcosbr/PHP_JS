
<?php
include('param.php');
if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
	$id = $_GET['id'];
	$base = $_GET['base'];
	$turma_id = $_GET['id_t'];
	$ser = "atu";
}else{
	$nome = null;
	$id = null;
	$ser = "inse";
}
echo '
<div class = "mw-100 mx-auto mb-4 ">
<form class="form" method="POST" action="crud/cad_di.php?ser='.$ser.'">
	<label class="ca slideDown">Disciplina</label>
	<div>
	<input class="cad slideLeft" type="text" name="nome" placeholder="Disciplina" value="'.$nome.'" required>
	<span class="focus-input100"></span>
	<select id="base" class="cad slideRight" name="base" required>
	<option value="Base Comum">Base Comum</option>
	<option value="Base Técnica">Base Técnica</option>
	</select>
	<select id="turma" class="cad slideRight" name="turma_id" required>
	<option value="0">Turma</option>';
	$query = "SELECT * FROM turma  ORDER BY ano ASC, curso ASC";
	$sql = mysqli_query($conexao,$query);
	while ($valor = mysqli_fetch_assoc($sql)) {
		echo "<option value='".$valor['id_turma']."'>".$valor['ano']."-".$valor['curso']."</option>";
	}
	echo '</select>
	</div>
	<select  class="cad slideLeft" name="semestre" required>
	<option value="0">Semestres</option>
	<option value="1">1º Semestre</option>
	<option value="2">2º Semestre</option>
	<option value="3">Ano inteiro</option>
	</select>
	<input type="hidden" name="id" value="'.$id.'">
	<button class="btn turma bigEntrance">Enviar</button>
</form>
</div>';
?>