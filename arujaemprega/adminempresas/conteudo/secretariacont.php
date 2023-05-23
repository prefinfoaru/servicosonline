<?php   session_start(); 
include ("../data/banco.php");

if(empty($_SESSION['prefeitura'])) {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Realizar o Login.</div>";
  echo "<script>window.location.href ='../pages/login.php';</script>"; 
  exit();
}
if(isset($_SESSION['nivel'])){
  $_SESSION['nivel'] = $_SESSION['nivel'];
}else{
  $_SESSION['nivel'] = '';
}

?>
<link href="../assets/css/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



<body style="background-color: lightblue">
    <br><br>
    <div class="wrapper fadeInDown zero-raduis">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="https://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                <h3 class="my-5">Selecione a Secretaria</h3> <br>
            </div>

            <?php // mensagem de erro que pega por sessão no processsamento pelo c_dados.
            if(isset($_SESSION['msg']))
            {
            echo     $_SESSION['msg']   ;
            unset   ($_SESSION['msg'])  ;
            }
          ?>

            <!-- Login Form -->
            <form method="POST" action="../data/valida/validasecretarialogin.php">
                <center>
                    <select name="sec" class="form-control" style="width:85%" required>
                        <option value="">Clique Aqui</option>
                        <?php 
                    $sql = "SELECT * FROM bd_emprega_aruja.tb_secretarias ";
                          foreach($pdo->query($sql) as $row){
                               echo    '<option value="'   .$row['secretarias'].'">'    .$row['secretarias'].'</option>';
                         }
                 ?>
                    </select><br>
                </center>

                <?php if ($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 3){ 

           }else{?>
                <input type="password" id="password" class=" fadeIn second zero-raduis" name="senha"
                    placeholder="Digite a senha." required><br>
                <?php } ?>
                <br>
                <br>

                <br>
                <input type="submit" class="fadeIn fourth zero-raduis" value="acessar">



            </form>


        </div>
    </div>
    <br><br>
</body>