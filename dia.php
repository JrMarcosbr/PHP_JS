<?php
echo '<div class = "mw-100 mx-auto mb-4 ">
<form class="form" method="POST" action="horario.php">
	<label class="ca slideDown">dia da semana</label>
	<select name="dia" class="cad slideRight">
		<option value="1">segunda</option>
		<option value="2">terça</option>
		<option value="3">quarta</option>
		<option value="4">quinta</option>
		<option value="5">sexta</option>
	</select>
	<select  class="cad slideLeft" required name="semestre">
	<option value="1">1º Semestre</option>
	<option value="2">2º Semestre</option>
	</select>
	<button class="btn turma bigEntrance">Enviar</button>
</form>
</div>';
?>
