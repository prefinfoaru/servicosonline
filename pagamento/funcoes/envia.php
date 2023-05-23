<?php
    include '../include/conexao.php' ;
    echo $codbarras=$_POST['codbarras'];
    $data = date("Y-m-d H:i:s");
    $cod = uniqid(rand());
    $status=0;
    if(isset($_POST['acessarcred'])){
        if(!empty($codbarras)){
            $ver= "SELECT * FROM pagamentos where codbarras = '$codbarras' AND status =1";
            $resultado_ver = mysqli_query($pdo, $ver);
            if(mysqli_num_rows($resultado_ver)>=1){
                header('Location: https://prefaruja.credpay.com.br/pagamento/boleto/'.$codbarras.'/'.$cod.'');
            }
            else
            {
                $sql= "INSERT INTO pagamentos(codbarras, dataacesso, codunico,empresa, status) VALUES ('$codbarras',' $data', '$cod','CredPay', $status)";
                $resultado_cadastro = mysqli_query($pdo, $sql);
                 if($resultado_cadastro >0){
                   header('Location: https://prefaruja.credpay.com.br/pagamento/boleto/'.$codbarras.'/'.$cod.'');
                }
                else{
                    header('Location: http://prefeituradearuja.sp.gov.br/pagamentos/');
                }
            }
        } 
    }
    else if(isset($_POST['acessarself'])){
        if(!empty($codbarras)){
            $sql= "INSERT INTO pagamentos(codbarras, dataacesso, codunico,empresa, status) VALUES ('$codbarras',' $data', '$cod','SelfPay', $status)";
            $resultado_cadastro = mysqli_query($pdo, $sql);
             if($resultado_cadastro >0){
               //header('Location: https://gw2-homolog.credpay.com.br/pagamento/boleto/'.$codbarras.'/'.$cod.'');
            }
            else{
                header('Location: http://prefeituradearuja.sp.gov.br/pagamentos/');
            }
        } 
    }
   


?>