  <?php

  session_start();

  $_SESSION['nome'];
  $_SESSION['matricula'];
  $_SESSION['funcao'];
  $_SESSION['email'];
  $_SESSION['cargahoraria'];
  $_SESSION['regime'];
  $_SESSION['email'];
  $_SESSION['id_cad_user'];
  $_SESSION['secretaria'];

  // variaveis de utilização

  $id_usuario = $_SESSION['id_cad_user'];
  $today = date("Y-m-d H:i:s");



  $servidor = "pmaruja14.pma.local";
  $usuario = "desenvolvimento";
  $senha = "prefeitura@banco2019";
  $dbname = "bd_sol_hr";

  //Criar a conexao
  $conn = new mysqli($servidor, $usuario, $senha, $dbname);

  if (mysqli_connect_errno()) {
    echo "Falha na conexão: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
  }


  //else echo sucesso;
  ?>