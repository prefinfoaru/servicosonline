 <?php 

    $valorToken = $ata.$user.$hashdate.$id.$hashdate ;    
    $options = [
    'cost' => 12,];
     $hash = password_hash("$valorToken", PASSWORD_BCRYPT, $options);


    