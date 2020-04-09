<?php
require_once('param.php');
$query = "SELECT * FROM `pdt` INNER JOIN turma on pdt.turma_id_turma = turma.id_turma";
$sql = mysqli_query($conexao,$query);
echo "
<div class='tab_tu expandOpen'>
<table id='tabela'>
<tr>
<th>Professor</th>
<th>Ano</th>
<th>Curso/Letra</th>
<th>Editar</th>
<th>Excluir</th>
</tr>
 <tr>
    <th><input type='text' class='ps' id='txtColuna1'/></th>
    <th><input type='text' class='ps' id='txtColuna2'/></th>
    <th><input type='text' class='ps' id='txtColuna3'/></th>
    <th></th>
     <th></th>
</tr>";
while ($value = mysqli_fetch_assoc($sql)) {
	$di = $value['id_turma'];
	echo "<tr>";
            echo "<td>".$value['nome_pdt'] ."</td>";
            echo "<td>".$value['ano'] ."</td>";
            echo "<td>".$value['curso'] ."</td>";
            echo "<td><a class='btn' href='editar_pdt.php?id_pdt=".$value['id_pdt']."'><i class='cuidado fas fa-edit fa-1x'></i></a></td><td><a class='btn' href='crud/excluir_pdt.php?id_pdt=".$value['id_pdt']."'><i class='cuidado fas fa-1x far fa-times-circle'></i></a></td>";
            echo "</tr>";
}
	if (!isset($di)) {
		echo "<tr>";
		echo '<td colspan="7" style="text-aling:center;">Nenhuma turma cadastrada</td>';
		echo "</tr>";
	}

echo "</table></div>";
?>