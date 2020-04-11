<?php
session_start();

require_once('head.php');
require_once('nav.php');
?>
<script>
  function ajuda(op){

    var element = document.getElementById('ajuda');
    element.innerHTML = '<div id="ajud"><h5 class="al">Ajuda <a href="#" class="btnfec" onclick='+"ajudafe('fechar')"+'>X</a></h5><ul><li>1º:Cadastrar todas as turmas.</li><li>2º:Cadastrar todas as disciplinas.</li><li>3º:Cadastrar todos os Professores.</li><li>4º:Gerar horário.</li><li>5º:Ver horário e salvar como pdf se desejado.</li></ul></div>';
}
function ajudafe(){
    document.getElementById('ajuda').remove();
}
</script>
<!DOCTYPE html>

<html>
<?php echo $head;?>
<style type="text/css">
  tbody {
    background: #757678;
    color: white;
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
th {
    background-color: #03304f;
    color: white;
    text-align: center;
}

th, td {
    text-align: center;
    padding: 2px;
    font-size: 12px;
}
</style>

<!-- <div id="fn"><div class="lds-grid" id="lds-grid"></div></div> -->
<body onload="myFunction()"  id="myDiv">
<?php echo $nav?>
<div class="main ">
  <div class="fun">
    <div class="conteudo" id="hh"> 
      <div onclick="ajuda()" class="ajuda slideLeft">
        <button class="aju"><i class="fas fa-question-circle aj fa-3x"></i></button>
      </div>
        <div id="ajuda">
          
        </div>

<?php 
if (isset($_GET['pg']) && $_GET['pg'] == 'inicio') {
    echo  '<div class="inicio expandOpen">
        <div class="ins"><h2 >Instruções <i class="fas fa-1x fa-book-open"></i></h2></div>
        <div class="inst"><br/>
        <h5>Passos:</h5>
          <ul>
          <li>
            1º:Cadastrar todas as turmas.
          </li>
          <li>
            2º:Cadastrar todas as disciplinas.
          </li>
          <li>
            3º:Cadastrar todos os Professores.
          </li>
          <li>
            4º:Gerar horário.
          </li>
          <li>
            5º:Ver horário e salvar como pdf se desejado.
          </li>
          </ul>
        </div>
      </div>';
  }
  //pdt
   if (isset($_GET['pg']) && $_GET['pg'] == 'cad_dt') {
        if (isset($_GET['nome'])) {
      $nome = $_GET['nome'];
      $id = $_GET['id'];
      $ser = "atu";
    }else{
      $nome = null;
      $id = null;
      $ser = "inse";
      $carga = null;
      $dias = null;
    }
    require_once('param.php');
    echo '
    <div class = "caixa_pro mb-4 expandOpen ">
        <label class="ca_p slideDown">Cadastrar Professores Diretor de Turma</label>
    <form class="form" method="post" action="crud/cad_pdt.php?ser='.$ser.'&&id='.$id.'">
      <input class="input_prof slideLeft " value="'.$nome.'" type="text" placeholder="Nome" name="nome" required><br>
      
      <div  class="lb_p"><label>Turma</label></div>
    <div class="cx_prof slideLeft " name="turma">
     ';
          $query_tur = "SELECT * FROM `turma`";
          $sql_tur = mysqli_query($conexao,$query_tur);
          while ($value = mysqli_fetch_assoc($sql_tur)) {
            $id = $value['id_turma'];
            $ano = $value['ano'];
            $nome = $value['curso'];
            echo '<tr><th>
                  <label class="switch">
                  <input type="checkbox" name="turma" value="'.$id.'">
                  <span class="slider round"></span>
                  '.$ano.'º'.$nome.'
                  </label>';
            echo "</th><tr>";
          }
      echo'</div>
      <button class="btn prof p">Cadastrar</button>
    </form>

    </div>';

   }

  if (isset($_GET['pg']) && $_GET['pg'] == 'cad_pdt') {
    if (isset($_GET['ver']) && $_GET['ver'] == 'cad_pdt') {
      include("crud/ver_pdt.php");
    }
  }
  //
  if (isset($_GET['pg']) && $_GET['pg'] == 'cad_prof') {
        if (isset($_GET['nome'])) {
      $nome = $_GET['nome'];
      $id = $_GET['id'];
      $ser = "atu";
      $carga = $_GET['carga'];
      $dias = $_GET['dias'];
    }else{
      $nome = null;
      $id = null;
      $ser = "inse";
      $carga = null;
      $dias = null;
    }
    require_once('param.php');
    $query = "SELECT * FROM `disciplina`";
    $sql = mysqli_query($conexao,$query);
    echo '
    <div class = "caixa_pro mb-4 expandOpen ">
        <label class="ca_p slideDown">Cadastrar Professores</label>
    <form class="form" method="POST" action="crud/cad_prof.php?ser='.$ser.'&&id='.$id.'">
      <input class="input_prof slideLeft " value="'.$nome.'" type="text" placeholder="Nome" name="nome" required><br>
      
      <input class="input_prof slideRight" value="'.$carga.'"  type="text" placeholder="Carga Horária" name="carga" required>
      
       <div class="sele" >
      <select class="input_prof slideLeft selectpicker" name="base">
        <option class="option" value="0" >Base curricular</option>
        <option class="option" value="1" >Técnico</option>
        <option class="option" value="2" >Comum</option>
      </select></div>
            <input placeholder="Folga" class="input_prof slideRight" value="'.$dias.'" type="text" name="dias" required><br>
            <div  class="lb_p"><label>Disciplina</label></div>
       <div class="cx_prof slideLeft " name="disci">
       ';
       $cn = 1;
    while ($value = mysqli_fetch_assoc($sql)) {
      $id_di = $value['id_disc'];
      $nome = $value['nome_d'];
                  echo '<tr><th>
                  
                  <label class="switch">
                  <input type="checkbox" name="'.$cn.'a" id="'.$cn.'" value="'.$id_di.'">
                  <span class="slider round"></span>
                  '.$nome.'
                  </label>';
            echo "</th><tr>";
             $cn++;
    }

      echo'
      </select></div>
      <div class="lb_p">
          <label>Turma</label></div>
    <div class="cx_prof slideLeft " name="turma">';
          $query_tur = "SELECT * FROM `turma`";
          $sql_tur = mysqli_query($conexao,$query_tur);
          $aux = 1;
          while ($value = mysqli_fetch_assoc($sql_tur)) {
            $id = $value['id_turma'];
            $ano = $value['ano'];
            $nome = $value['curso'];
            echo '<tr><th>
                  <label class="switch">
                  <input type="checkbox" name="'.$aux.'" id="'.$aux.'" value="'.$id.'">
                  <span class="slider round"></span>
                  '.$ano.'º'.$nome.'
                  </label>';
            echo "</th><tr>";
                      $aux++;
          }
      echo'</div>
      
      <button class="btn prof p">Cadastrar</button>
    </form>

    </div>';
  }

  if (isset($_GET['pg']) && $_GET['pg'] == 'cad_di') {
    include('cad.di.php');
    if (isset($_GET['ver']) && $_GET['ver'] == 'cad_di') {
      include("crud/ver_di.php");
    }
  }


  if (isset($_GET['pg']) && $_GET['pg'] == 'cad_tur') {
    require_once('cad_tur.php');
    echo $cad_tur;
          if (isset($_GET['ver']) && $_GET['ver'] == 'cad_tur') {
      include("crud/ver_tur.php");
    }
  }

          if (isset($_GET['ver']) && $_GET['ver'] == 'ver_prof') {
      include("crud/ver_prof.php");
    }


          if (isset($_GET['ver']) && $_GET['ver'] == 'horario') {
          $dia = $_POST['dia'];
      include("horario.php");
    }
         if (isset($_GET['ver']) && $_GET['ver'] == 'dia') {
      include("dia.php");
    }
             if (isset($_GET['ver']) && $_GET['ver'] == 'ver_ho') {
      include("dia_v.php");
    }
             if (isset($_GET['ver']) && $_GET['ver'] == 'dia_h') {

            include("param.php");
            $dia = $_POST['dia'];
            if ($dia == 1) {
              $a = "segunda-feira";
            }
            if ($dia == 2) {
              $a = "terça-feira";
            }
            if ($dia == 3) {
              $a = "quarta-feira";
            }
            if ($dia == 4) {
              $a = "quinta-feira";
            }
            if ($dia == 5) {
              $a = "sexta-feira";
            }
            $query = "SELECT * FROM `horario` WHERE dia = $dia";
            $sql = mysqli_query($conexao,$query);
            echo "
            <div class='esp'></div>
            <div id='tab_ho' class='expandOpen'>
            <table>
            <tr>
            <th>Aula</th>
            ";
              for ($aux=1; $aux < 13; $aux++) { 
                    echo "<th>sala".$aux."</th>";
              }
            echo
             "</tr>";
            while ($value = mysqli_fetch_assoc($sql)){
                $di = $value['id'];
              echo "<tr>";
                        echo "<td>".$value['aula']."</td>";
                for ($aux=1; $aux < 13; $aux++) { 
                          echo "<td>".$value['sala'.$aux.''] ."</td>";
                }
                        echo "</tr>";
            }
              if (!isset($di)) {
                echo "<tr>";
                echo '<td colspan="13" style="text-aling:center;">Nenhuma horario cadastrado</td>';
                echo "</tr>";
              }

            echo "<tr><th colspan='13'>".$a."</th></tr></table>
            <div id='elementH'></div>
            <button onclick='limpar(".$dia.")' class='btn turma_v bigEntrance'>Limpar</button>
            <button onclick='gerar()' class='btn turma_v bigEntrance'>Gerar pdf</button>
            <a href='inicio.php?ver=ver_ho'><button class='btn turma_v bigEntrance'>Voltar</button></a></div>
            ";}


?>
</div>
</div>
</div>
</body>
</html>

<script>
  //pdf   
 function gerar(){
    var doc = new jsPDF('p', 'pt', 'letter');
    source = $('#tab_ho')[0];
    specialElementHandlers = {
        'elementH': function (element, renderer) {
            return true
        }
    };
        margins = {
        top: 20,
        bottom: 20,
        left: 30,
        width: 622
    };
  doc.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.letf, // x coord
        margins.top, {// y coord
            'width': margins.width, // max width of content on doc
            'elementHandlers': specialElementHandlers
        },
        function (dispose) {
            // dispose: object with X, Y of the last line add to the doc 
            //          this allow the insertion of new lines after html
            doc.save('Test.pdf');

        }
        , margins);


        }
  

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
    if (r==true)
      {
      alert('Horário limpo,atualize a página');
                      $.ajax({
                        url: 'limpar_ho.php',
                        method: 'post',
                        data: dados, 
                        processData: false,
                        contentType: false,
                     }).done(function(resposta){
                      console.log(resposta)
                    });
      }
    else
      {
    alert('Tá certo.');
          }
         }
//fim pdf
//pesquisa
$(function(){
    $("#tabela input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela input").blur(function(){
        $(this).val("");
    }); 
});

//fim pesquisa

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

$(window).scroll(function() {
    $('#examples-cta').each(function(){
        var imagePos = $(this).offset().top;
        
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("slideUp");
        }
    });
});

$('#slideUpBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass(); 
        $('#object').addClass("slideUp");
    });
});

$('#slideDownBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("slideDown");
    });
}); 

$('#slideLeftBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("slideLeft");
    });
});   

$('#slideRightBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("slideRight");
    });
}); 

$('#slideExpandUpBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("slideExpandUp");
    });
}); 

$('#expandUpBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("expandUp");
    });
});

$('#fadeInBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("fadeIn");
    });
});

$('#expandOpenBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("expandOpen");
    });
});   

$('#bigEntranceBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("bigEntrance");
    });
});   

$('#hatchBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("hatch");
    }); 
});   


/*
  MISC
  */

$('#bounceBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("bounce");
    }); 
}); 

$('#pulseBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("pulse");
    }); 
});   

$('#floatBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("floating");
    }); 
});

$('#tossingBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("tossing");
    }); 
});   

$('#pullUpBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("pullUp");
    }); 
});

$('#pullDownBtn').load(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("pullDown");
    }); 
});

$('#stretchLeftBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("stretchLeft");
    }); 
});

$('#stretchRightBtn').click(function() {
    $(this).each(function(){
        $('#object').removeClass();       
        $('#object').addClass("stretchRight");
    }); 
});

var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1200);
}

function showPage() {
  document.getElementById("fn").style.display = "none";
  document.getElementById("lds-grid").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>