
<?php
 
session_start();

include ('../conexao.php');


$usuario = $_POST['username'];
$senha = $_POST['password'];




$curl = curl_init();
curl_setopt_array($curl,[
CURLOPT_SSL_VERIFYPEER =>0,  

CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify', 
CURLOPT_POSTFIELDS => [
        'secret' => '6LeQASYaAAAAAPejpRtUYEgZf5Gz2-I3u92PKFgG',
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' =>   $_SERVER['REMOTE_ADDR']

]


]);

$response = json_decode(curl_exec($curl)); 
curl_close($curl);

if(!$response->success){
    
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Captcha Incorreto.</div>";
    header("location: ../login.php");
    
}else{
   
    if(!empty($usuario) && !empty($senha)){

        $consulta = "SELECT * FROM transito_transparencia.usuario where usuario = '$usuario';";
        
        $resultado_consulta = mysqli_query($conn2, $consulta);
        
        if($resultado_consulta){
        
            $row_dados = mysqli_fetch_assoc($resultado_consulta);
            if(password_verify($senha, $row_dados['senha'])){
                if($row_dados['setor'] == 'gabinete'){
                    
                    $_SESSION['logado'] = 1;
                    header("location: ../index.php");
        
                    }else{
                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
                        header("location: ../login.php");
                    }
        
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'> Usuário ou Senha Incorreto.</div>";
                header("location: ../login.php");
            }
        }
        else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
            header("location: ../login.php");
        }
        

    } else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' style='font-size:14px; text-align:center;'>Usuário ou Senha Incorreto.</div>";
        header("location: ../login.php");
    }




}































?>