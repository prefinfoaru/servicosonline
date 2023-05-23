 <?php 

    $valorToken = $ata.$user.$hashdate.$id.$hashdate ;    
    $options = [
    'cost' => 12,];
     $hash = password_hash("$valorToken", PASSWORD_BCRYPT, $options);


    $valorTokendoc = $ata.$hashdate.$hash ;    
    $options = [
    'cost' => 12,];
     $hashdoc = password_hash("$valorTokendoc", PASSWORD_BCRYPT, $options);