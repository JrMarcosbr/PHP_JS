<?php
include("param.php");
if (isset($_GET['id'])) {
$id = $_GET['id'];
$pes = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d FROM professores
    INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof
    INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma
    INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof
    INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc WHERE professores.id_prof = $id";
$sql_pes = mysqli_query($conexao,$pes);
 while ($value = mysqli_fetch_assoc($sql_pes)) {
 	$nome = $value['nome'];
 	$base = $value['base'];
 	$carga = $value['carga_h'];
 	$disc = $value['id_disc'];
 	$dias = $value['dias_off'];

}
}
else{
	$nome = null;
	$disc = null;
	$base = null;
	$carga_h = null;
	$disc = null;
	$dias = null;
}
header('location:inicio.php?pg=cad_prof&&nome='.$nome.'&&carga='.$carga.'&&dias='.$dias.'&&id='.$id.'');
?>