<?php
require_once('param.php');
$query = "SELECT  turma.ano,turma.curso,disciplina.nome_d,disciplina.base,disciplina.id_disc,turma.id_turma,disciplina.semestre FROM `disciplina`
INNER JOIN disciplina_has_turma on disciplina.id_disc = disciplina_has_turma.disciplina_id_disc
INNER JOIN turma on disciplina_has_turma.turma_id_turma = turma.id_turma order by id_disc DESC";
$sql = mysqli_query($conexao,$query);
echo "
<div class='tab expandOpen'>
<table id='tabela'>
<tr>
<th>Disciplina</th>
<th>Base</th>
<th>Turma</th>
<th>Semestre</th>
<th>Editar</th>
<th>Excluir</th>
</tr>
 <tr>
    <th><input type='text' class='ps' id='txtColuna1'/></th>
    <th><input type='text' class='ps' id='txtColuna2'/></th>
    <th><input type='text' class='ps' id='txtColuna3'/></th>
    <th><input type='text' class='ps' id='txtColuna4'/></th>
    <th></th>
     <th></th>
</tr>";
while ($value = mysqli_fetch_assoc($sql)) {
	$di = $value['id_disc'];
	if ($value['semestre'] == 1) {
		$semestre = "1º Semestre";
		
	}elseif ($value['semestre'] == 2) {
		$semestre = "2º Semestre";
		
	}elseif ($value['semestre'] == 3) {
		$semestre = "Ano inteiro";
		
	}
	echo "<tr>";
            echo "<td>".$value['nome_d'] ."</td>";
            echo "<td>".$value['base']."</td>";
            echo "<td>".$value['ano']."-".$value['curso']."</td>";
             echo "<td>".$semestre."</td>";
            echo "<td><a class='btn' href='editar_di.php?id_disc=".$value['id_disc']."&&id_turma=".$value['id_turma']."'><i class='cuidado fas fa-edit fa-1x'></i></a></td><td><a class='btn' href='crud/excluir_di.php?id_disc=".$value['id_disc']."&&id_turma=".$value['id_turma']."'><i class='cuidado fas fa-1x far fa-times-circle'></i></a></td>";
            echo "</tr>";
}
	if (!isset($di)) {
		echo "<tr>";
		echo '<td colspan="7" style="text-aling:center;">Nenhuma disciplina cadastrada</td>';
		echo "</tr>";
	}

echo "</table></div>";
?>