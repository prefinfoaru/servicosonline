	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>  
		<?php echo $idurl; ?>
		<script language="JavaScript">
		$(document).ready(function() {
		$("#enviar").click(function( e ){
		e.preventDefault();

		var width = 550;
		var height = 550;

		var left = 99;
		var top = 99;

		window.open(enviar,'janela', 'width='+width+', height='+height+',top='+top+'left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

		});
		}); </script>
		<br>