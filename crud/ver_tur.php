<?php
require_once('param.php');
$query = "SELECT * FROM `turma` ORDER BY ano ASC, curso ASC";
$sql = mysqli_query($conexao,$query);
echo "
<div class='tab_tu expandOpen'>
<table id='tabela'>
<tr>
<th>Ano</th>
<th>Curso/Letra</th>
<th>Editar</th>
<th>Excluir</th>
</tr>
 <tr>
    <th><input type='text' class='ps' id='txtColuna1'/></th>
    <th><input type='text' class='ps' id='txtColuna2'/></th>
    <th></th>
     <th></th>
</tr>";
while ($value = mysqli_fetch_assoc($sql)) {
	$di = $value['id_turma'];
	echo "<tr>";
            echo "<td>".$value['ano'] ."</td>";
            echo "<td>".$value['curso'] ."</td>";
            echo "<td><a class='btn' href='editar_tur.php?id_turma=".$value['id_turma']."'><i class='cuidado fas fa-edit fa-1x'></i></a></td><td><a class='btn' href='crud/excluir_tur.php?id_turma=".$value['id_turma']."'><i class='cuidado fas fa-1x far fa-times-circle'></i></a></td>";
            echo "</tr>";
}
	if (!isset($di)) {
		echo "<tr>";
		echo '<td colspan="7" style="text-aling:center;">Nenhuma turma cadastrada</td>';
		echo "</tr>";
	}

echo "</table></div>";
?>