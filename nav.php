<?php
$nav = '<header class="sidenav">
<div id="im">
<img class="logo" src="login/images/logo.png">
</div>
  <a class="i lon" href="inicio.php?pg=inicio">Inicio <i class="fas fa-home"></i></a>

    <button class="dropdown-btn">Gerir Turmas
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a  class="a_b"  href="inicio.php?pg=cad_tur&&ver=cad_tur">Cadastrar turmas</a>
  </div>
  <button class="dropdown-btn">Disciplinas 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a class="a_b"  href="inicio.php?pg=cad_di&&ver=cad_di">Cadastrar diciplinas</a>
  </div>
    <button class="dropdown-btn">Professores 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a class="a_b"  href="inicio.php?pg=cad_prof">Cadastrar professores</a><hr>
    <a class="a_b"  href="inicio.php?ver=ver_prof">Ver  professores</a><hr>
    <a class="a_b"  href="inicio.php?pg=cad_dt">Cadastrar diretor de turma</a><hr>
    <a class="a_b"  href="inicio.php?pg=cad_pdt&&ver=cad_pdt">Ver  professores diretores de turma</a>
  </div>


  <button class="dropdown-btn">Horário
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a class="a_b" href="inicio.php?ver=dia">Gerar horário</a><hr>
    <a class="a_b" href="inicio.php?ver=ver_ho">Ver horário</a>
  </div>
  <a class="i" href="sair.php">Sair<i class="fas fa-sign-out-alt"></i></a>
</div>
  </header>';
?>
