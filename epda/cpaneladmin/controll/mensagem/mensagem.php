<?php 
	 		   if(isset($_SESSION['msg'])){
				echo '<div class="alert alert-danger style="color:red;text-align: center">' .$_SESSION['msg']. '</div>';
				   
				unset($_SESSION['msg']);
			}
					   if(isset($_SESSION['msg2'])){
				echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' .$_SESSION['msg2']. '</div>';
				   
				unset($_SESSION['msg2']);
			}
			 
				if(isset($_SESSION['msg3'])){
				echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' .$_SESSION['msg3']. '</div>';
				   
				unset($_SESSION['msg3']);
					
			}if(isset($_SESSION['msg4'])){
				echo '<div class="alert alert-success style="color:"#228B22" ;text-align: center">' .$_SESSION['msg4']. '</div>';
				   
				unset($_SESSION['msg4']);
			}
?>