		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"> </script> <!-- Biblioteca para mensagem de erro personalizada  -->
		<?php  header("Content-type: text/html; charset=utf-8");
		session_start();

        
		include  "./includes/variaveissessao.php";
		include  "conexao.php";
        include  "./includes/QueryMovimentacao.php";
        include  "./includes/ScriptMovimentacao.php";
	    include  "./includes/FormularioMovimentacao.php" ; 
		include  "./includes/BtnMovimentacao.php" 	;
        include  "./includes/ModalMovimentacao.php";			
		?>
       
        
	


