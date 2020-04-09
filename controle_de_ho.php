<?php
    include "param.php";
    session_start();
    $professor = $_POST['professor'];
    $prof = explode(" - ",$professor);
    $sala = utf8_encode($_POST['sala']);
    $aula = utf8_encode($_POST['aula']);
    $dia = utf8_encode($_POST['dia']);

    $sql = "UPDATE horario SET $sala ='$professor' WHERE aula='$aula' AND dia = '$dia' ";
    $query = mysqli_query($conexao, $sql);

    $teste = "SHOW COLUMNS FROM horario";
    $sql_ts = mysqli_query($conexao, $teste);

    $array = array();
    while ($row = mysqli_fetch_assoc($sql_ts)) {
        $array[] = $row;
    }

    $pesquisa = "SELECT * FROM horario WHERE aula = '$aula' AND dia = $dia" ;
    $query = mysqli_query($conexao, $pesquisa);
    while($result = mysqli_fetch_assoc($query)){
        foreach ($array as $resu){
            $aux = $resu['Field'];
            $aaux = $result[$aux];


            if ($aaux != null AND $aux != "dia"  AND $aux != "aula" AND $aux != "id") {

                $x = explode(" - ", $result[$aux]);

                if($x[0] == $prof[0] && $aux != $sala){
                    echo "1";
                }
            }
        }
    }
    $query_c = "";
?>