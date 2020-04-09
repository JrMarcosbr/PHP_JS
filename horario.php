<script> 
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
<!DOCTYPE html>
<html>
<head>

  <title></title>
  <meta charset="utf-8"/>
  <script src="https://kit.fontawesome.com/187ed1bdd8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="b/bootstrap/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
$semestre =$_POST['semestre'];
if ($semestre == 1) {
	$semestre = 2;
}elseif ($semestre == 2) {
	$semestre = 1;
}
include('param.php');
$query = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d FROM professores
    INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof
    INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma
    INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof
    INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc  where disciplina.base != 'Base Técnica' and disciplina.semestre != $semestre";
$sql = mysqli_query($conexao,$query);
//pdt
$query_pdt = "SELECT * FROM `pdt` INNER JOIN turma on pdt.turma_id_turma = turma.id_turma";
$sql_pdt = mysqli_query($conexao,$query_pdt);


//
// tecnico

$query_tec = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d FROM professores
    INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof
    INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma
    INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof
    INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc where disciplina.base = 'Base Técnica'";
$sql_tec = mysqli_query($conexao,$query_tec);

//fim tecnico

$query_t = "SELECT * FROM `turma`where curso != 'todos' ORDER BY ano ASC, curso ASC";
$sql_t = mysqli_query($conexao,$query_t);
//
$query_tu = "SELECT * FROM `turma` ORDER BY ano ASC, curso ASC";
$sql_tu = mysqli_query($conexao,$query_tu);
//
$turm =mysqli_num_rows($sql_t);
$id = 1;
echo '<body class="back">
<div id="myNav" class="overlay">
  <div class="overlay-content">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <img class="logo_res" src="login/images/logo.png">
  <a href="inicio.php?pg=inicio">Inicio <i class="fas fa-home"></i></a>

    <a  class="a_b"  href="inicio.php?pg=cad_tur&&ver=cad_tur">Cadastrar turmas</a>

    <a class="a_b"  href="inicio.php?pg=cad_di&&ver=cad_di">Cadastrar diciplinas</a>

        <a class="a_b"  href="inicio.php?pg=cad_prof">Cadastrar professores</a>
    <a class="a_b"  href="inicio.php?ver=ver_prof">Ver  professores</a>
    <a class="a_b"  href="inicio.php?pg=cad_dt">Cadastrar diretor de turma</a>
    <a class="a_b"  href="inicio.php?pg=cad_pdt&&ver=cad_pdt">Ver  professores diretores de turma</a>






    <a class="a_b" href="inicio.php?ver=dia">Gerar horário</a>
    <a class="a_b" href="inicio.php?ver=ver_ho">Ver horário</a>

  <a href="sair.php">Sair  <i class="fas fa-sign-out-alt"></i></a>
  </div>
</div>
<div class="menu_fund">
<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776MENU</span>
</div>
<div class="tab_ho ">
<form action="#">
<table class="t">
<tr>
';
		$d = mysqli_num_rows($sql_tec);
		$cont = 0;
while ($valor = mysqli_fetch_assoc($sql_tec)) {
		$tec = $valor['nome']." -".$valor['nome_d'];
		for ($i = 0; $i < $d ; $i++) { 
			$array_tec[$cont] = $tec."-".$valor['id_turma'];
		}
		$cont++;
}
		$r= mysqli_num_rows($sql_pdt);
		$cont = 0;
while ($valor = mysqli_fetch_assoc($sql_pdt)) {
		$pdt = $valor['nome_pdt']."-".$valor['ano']."/".$valor['curso'];
		for ($i = 0; $i < $r; $i++) { 
			$array_pdt[$cont] = $pdt."-".$valor['id_turma'];
		}
		$cont++;
}

		$cont = 0;
		$row_s = mysqli_num_rows($sql_t);
while ($value = mysqli_fetch_assoc($sql_t)) {
	$sala = $value['ano']."-".$value['curso'];
			for ($h = 0; $h < $row_s ; $h++) { 
			$array_sala[$cont] = $sala;
		}
		$cont++;
			echo "
	<th>".$sala."</th>";
}
//
		$cont = 0;
		$row_su = mysqli_num_rows($sql_tu);
while ($value = mysqli_fetch_assoc($sql_tu)) {
	$sala = $value['ano']."-".$value['curso'];
			for ($h = 0; $h < $row_su ; $h++) { 
			$array_sal[$cont] = $sala;
		}
		$cont++;
}
//
echo "</tr>";
		$c = mysqli_num_rows($sql);
		$cont = 0;
while ($valor = mysqli_fetch_assoc($sql)) {
		$pd = $valor['nome']."-".$valor['nome_d'];
		// $carga_h = $valor['carga_h'];
		// 	$tal = $carga_h/4;
		// 	$carga_h = $carga_h - $tal;
		// $qtd_a = array('nome' => $pd,
		// 'qtd' => $carga_h );
		for ($i = 0; $i < $c ; $i++) { 
			$array[$cont] = $pd;
		}
		$cont++;
}
$dia = $_POST['dia'];
$dis = mysqli_num_rows($sql_t);

if($dia == 1){
	$aud = "segunda-feira";
}if($dia == 2){
	$aud = "terça-feira";
}if($dia == 3){
	$aud = "quarta-feira";
}if($dia == 4){
	$aud = "quinta-feira";
}if($dia == 5){
	$aud = "sexta-feira";
}
	for ($linha = 1 ; $linha < 10 ; $linha++ ) { 
		echo '<tr>';
		for ($coluna=1; $coluna < $dis+1; $coluna++) { 

			echo '<td class="hoi">
			<select class="t comboCidades" id ="'.$id.'" name="'.$linha.'" searchable="Pesquise aqui.."  onchange="teste('.$id.','.$linha.','.$coluna.','.$dia.')" >
			<option>aula</option>
			<optgroup label="Diretor de turma">';
			$aux = 0;
					for ($bt = 0 ; $bt < $r; $bt++) { 
						$p_pdt = explode("-" , $array_pdt[$bt]);
						$id_turma = $p_pdt[$aux+2];
												$query_t = "SELECT * FROM `turma` where id_turma = $id_turma ";
						$sql_t = mysqli_query($conexao,$query_t);

						//horas aula
						$prof_h = explode("-" ,$array_tec[$bt]);
						$disc_prof = $prof_h[$aux+1];
						$per = "SELECT * FROM `disciplina` WHERE nome_d = '$disc_prof'";
						$pesq = mysqli_query($conexao,$per);

						while ($v = mysqli_fetch_assoc($pesq)) {
							$id_d = $v['id_disc'];
						}

						$nome_prof =  $prof_h[$aux];

						$query_d = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d FROM professores INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc WHERE professores.base = '1' and professores.nome = '$nome_prof' and disciplina.id_disc = $id_d ";
						$sql_d = mysqli_query($conexao,$query_d);
						while ($valor = mysqli_fetch_assoc($sql_d)) {
							$pp = $valor['nome']."-".$valor['nome_d'];
							$carga_h = $valor['carga_h'];
						}
						$tal = $carga_h/4;
						$carga_h = $carga_h - $tal;
						$SESSION[$pp] = array($pp => $carga_h);
						//
						while ($value = mysqli_fetch_assoc($sql_t)){
						$local = $value['ano']."-".$value['curso'];
						$achei = array_search($local,$array_sala);

						// $ano = $value['ano'];
						// if ($achei == 10) {
						// 	$achei = array_search($ano,$array_sala);
						// 	echo $achei;
						// }
							if($coluna == $achei + 1){
							echo "<option>".$p_pdt[$aux]."-formação cidadã</option>";
							}
						}
					}

			echo '</optgroup>
			<optgroup label="Base comum">
			';
			$id++;
			for ($j = 0 ; $j < $c; $j++) { 
					echo "<option value=$array[$j]>".$array[$j]."</option>";
				}
				echo "</optgroup><optgroup label='Base técnica'>";
					$aux = 0;
					for ($bt = 0 ; $bt < $d; $bt++) { 
						$prof = explode("-" , $array_tec[$bt]);
						$id_turma = $prof[$aux+2];

						$query_t = "SELECT * FROM `turma` where id_turma = $id_turma ";
						$sql_t = mysqli_query($conexao,$query_t);

						//horas aula
						$prof_h = explode("-" ,$array_tec[$bt]);
						
						$disc_prof = $prof_h[$aux+1];
						$per = "SELECT * FROM `disciplina` WHERE nome_d = '$disc_prof'";
						$pesq = mysqli_query($conexao,$per);

						while ($v = mysqli_fetch_assoc($pesq)) {
							$id_d = $v['id_disc'];
						}

						$nome_prof =  $prof_h[$aux];

						$query_d = "SELECT professores.id_prof,professores.nome,professores.carga_h,professores.base,professores.dias_off,turma.ano,turma.curso,turma.id_turma,disciplina.nome_d FROM professores INNER JOIN professores_has_turma on professores.id_prof = professores_has_turma.professores_id_prof INNER JOIN turma on professores_has_turma.turma_id_turma = turma.id_turma INNER JOIN professores_has_disciplina on professores.id_prof = professores_has_disciplina.professores_id_prof INNER JOIN disciplina on professores_has_disciplina.disciplina_id_disc = disciplina.id_disc WHERE professores.base = '1' and professores.nome = '$nome_prof' and disciplina.id_disc = $id_d ";
						$sql_d = mysqli_query($conexao,$query_d);
						while ($valor = mysqli_fetch_assoc($sql_d)) {
							$pp = $valor['nome']."-".$valor['nome_d'];
							$carga_h = $valor['carga_h'];
						}
						$tal = $carga_h/4;
						$carga_h = $carga_h - $tal;
						$SESSION[$pp] = array($pp => $carga_h);
						//
						while ($value = mysqli_fetch_assoc($sql_t)){
						$local = $value['ano']."-".$value['curso'];
						$achei = array_search($local,$array_sala);

						// $ano = $value['ano'];
						// if ($achei == 10) {
						// 	$achei = array_search($ano,$array_sala);
						// 	echo $achei;
						// }
							if($coluna == $achei + 1){
							echo "<option>".$prof[$aux]." - ".$prof[$aux+1]."</option>";
							}
						}
					}
				echo '</optgroup>
			</select></td>';
			}
	}
	echo '<tr  class="dia" ><th colspan="12" style="font-size: 18px;">'.$aud.'</th></tr>';

echo "</table>
</form>
</div><div id='ho'>
<button onclick='limpar(".$dia.")' class='btn turma_v bigEntrance'>Limpar</button>
<a href='inicio.php?ver=dia'><button class='btn turma_v bigEntrance'>Voltar</button></a></div>
</body>";
?>
<script src="jquery-3.3.1.min.js"></script>
<script>

	   function limpar(dia){
	   	var dia = dia;
	   	var dt;
	   	if(dia == 1){
	   		dt = "segunda-feira";
	   	}
	   	if(dia == 2){
	   		dt = "terça-feira";
	   	}
	   	if(dia == 3){
	   		dt = "quarta-feira";
	   	}
	   	
	   	if(dia == 4){
	   		dt = "quinta-feira";
	   	}
	   	if(dia == 5){
	   		dt = "sexta-feira";
	   	}
		var r = confirm("Desja realmente limpar,isso apagara o horário de "+dt+".");
		 var dados = new FormData();
	   	 dados.append('dia', dia);
		if (r == true)
		  {
		  	   	    $.ajax({
                        url: 'limpar_ho.php',
                        method: 'post',
                        data: dados, 
                        processData: false,
                        contentType: false,
                    });
		  	   	    alert('Horário limpo com sucesso,atualize a página');

		  }
		else
		  {
		alert('Tá certo.');
				  }
			   }
				function teste(id,linha,coluna,dia){
	                var id = id;
	                // var comboCidades = document.getElementById(id);
	    			//for (i = 0; i < comboCidades.length; i = i + 1) {
					//     console.log(comboCidades.options[i]);
	    			//comboCidades.selectedIndex = Math.floor(Math.random() * comboCidades.length);
					// }
                    var aula = linha;
                    var coluna = coluna;
                    var sala = "sala"+coluna;
                    var dia = dia;
                    var prof = document.getElementById(id).value;
                    var local = document.getElementById(id);
                    var dados = new FormData();
                    local.style.backgroundColor = '#757575';


                    dados.append('professor', prof);
                    dados.append('aula', aula);
                    dados.append('sala', sala);
                    dados.append('dia', dia);

                    $.ajax({
                        url: 'controle_de_ho.php',
                        method: 'post',
                        data: dados, 
                        processData: false,
                        contentType: false,
                     }).done(function(resposta){
                     	console.log(resposta)
                        if(resposta == 1){
                            local.style.backgroundColor = "red";
                            alert("Choque de aulas do professor "+prof+" na "+sala+" na "+aula+"º aula")
                    }
                    });
                    

                }
</script>
</html>
