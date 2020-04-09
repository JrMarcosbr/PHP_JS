<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8"/>
<script src="jquery-3.3.1.min.js"></script>
<script src="jsPDF/dist/jspdf.min.js"></script>
</head>
<body>
<?php
include_once ('head.php');
include_once("param.php");
	$html = '<div id="hor"><table>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Aula</th>';
	for ($aux=1; $aux < 13; $aux++) { 
        $html .= "<th>sala".$aux."</th>";
    }
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	$result_transacoes = "SELECT * FROM `horario` Where dia = '2'";
	$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
	while($value = mysqli_fetch_assoc($resultado_trasacoes)){

		$html .= '<td>'.$value['aula'] . "</td>";
	for ($aux=1; $aux < 13; $aux++) { 
      $html .= "<td>".$value['sala'.$aux.''] ."</td>";
    }
	$html .= "</tr>";		
	}
	$html .= '</tbody>';
	$html .= '</table></div>';
	$a = '<div id="elementH"></div>';
	echo $html;
?>
</body>
</html>
<script type="text/javascript">
	var elementHTML = $('#hor').html();
	html2canvas($('#hor')[0], {
		onrendered: function(canvas){

			var img = canvas.toDataURL("image/png");
			var doc = new jsPDF();
			doc.addImage(img,'PNG',10,20);
			doc.save('horario.pdf');
		}
	});

</script>
