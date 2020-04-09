<?php
require_once('param.php');
$query = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d,disciplina.id_disc FROM professores
    INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof
    INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma
    INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof
    INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc";
$sql = mysqli_query($conexao,$query);
echo "
<div class='tab_prof expandOpen'>
<table id='tabela'>
<tr>

<th>Nome</th>
<th>Disciplina</th>
<th>Base Curricular</th>
<th>Carga Horária</th>
<th>Turma</th>
<th>Folga</th>
<th>Editar</th>
<th>Excluir</th>
</tr>
 <tr>
    <th><input type='text' class='ps' id='txtColuna1'/></th>
    <th><input type='text' class='ps' id='txtColuna2'/></th>
    <th><input type='text' class='ps' id='txtColuna3'/></th>
    <th><input type='text' class='ps' id='txtColuna4'/></th>
    <th><input type='text' class='ps' id='txtColuna5'/></th>
    <th><input type='text' class='ps' id='txtColuna6'/></th>
    <th></th>
     <th></th>
</tr>";

while ($value = mysqli_fetch_assoc($sql)) {
    $di = $value['id_prof'];
        if ($value['base'] == 1){
        $base = "Base Técnica";
        }elseif ($value['base'] == 2) {
            $base = "Base Comum";
}
	echo "<tr>";
            echo "<td>".$value['nome'] ."</td>";
            echo "<td>".$value['nome_d'] ."</td>";
            echo "<td>".$base."</td>";
            echo "<td>".$value['carga_h']."</td>";
            echo "<td>".$value['ano']."-".$value['curso']."</td>";
            echo "<td>".$value['dias_off'] ."</td>";
            echo "<td><a class='btn' href='editar_prof.php?disc=".$value['id_disc']."&&turma=".$value['id_turma']."&&id=".$value['id_prof']."'><i class='cuidado fas fa-edit fa-1x '></i></a></td><td><a class='btn' href='crud/excluir_prof.php?disc=".$value['id_disc']."&&turma=".$value['id_turma']."&&id=".$value['id_prof']."'><i class='cuidado fas fa-1x far fa-times-circle'></i></a></td>";
            echo "</tr>";
}
	if (!isset($di)) {
		echo "<tr>";
		echo '<td colspan="8" style="text-aling:center;">Nenhuma professor cadastrado</td>';
		echo "</tr>";
	}

echo "</table></div></div>";
?>