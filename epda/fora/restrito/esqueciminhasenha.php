
<?php session_start(); ?>
<meta charset="utf-8">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
    
    	<div align="center"> 
<h2  style="color:#114A6F ; font-size: 15px;"><img src="cpanel/img/brasao/brasão.png" width="50px" height="70px"><br>SGDER<br> <i style="font-size: 10px">(SISTEMA DE GERENCIAMENTO  DE DOCUMENTOS ENTRE A EDUCAÇÃO E O RH)</i></h2>
</div> 
        
        
        <div class="panel-group" id="accordion">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDadosGerais">
                          Esqueci Minha Senha
                        </a>
                    </h4>
                </div>
                
                <div id="collapseDadosGerais" class="panel-collapse collapse in">
                    <div class="panel-body">
    
                          <div class="row">
                          
                        <form action="upload_senha_provissoria.php" method="post">
                           <div class="col-xs-5">
                                <label>Digite seu CPF:</label>
                                <input type="text" class="form-control" name= "usuario" placeholder="Digite seu CPf sem / ou -">
                            
                           
                             <?php
	 		   if(isset($_SESSION['msg'])){
				echo '<div style="color:red;text-align: center">' .$_SESSION['msg']. '</div>';
				unset($_SESSION['msg']);
			}
		      __CLASS__?> 
                           
						
								</div>				
						
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
              		
		<!-- panel-group -->               
        </div>
        
		<br/>
        <button type="submit" class="btn btn-default">Solicitar</button>
		 <a href="index.php"  class="btn btn-danger " role="button">voltar</a>
        </form>
        
	</div>
</div>