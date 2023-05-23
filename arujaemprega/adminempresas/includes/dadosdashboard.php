<?php
    include	"./data/conexao.php";
    
    $vagaspre="SELECT COUNT(status) FROM tb_cadastro_vaga where status =0;";
    $vagaspreexec=mysqli_query($conn,$vagaspre);
    $vagaspretotal=mysqli_fetch_assoc($vagaspreexec);

    $vagaslibe="SELECT COUNT(status) FROM tb_cadastro_vaga where status =1;";
    $vagaslibexec=mysqli_query($conn,$vagaslibe);
    $vagaslibetotal=mysqli_fetch_assoc($vagaslibexec);

    $vagasexc="SELECT COUNT(status) FROM tb_cadastro_vaga where status =2;";
    $vagasexecexec=mysqli_query($conn,$vagasexece);
    $vagasexecetotal=mysqli_fetch_assoc($vagasexecexec);

    $vagasaguar="SELECT COUNT(status) FROM tb_cadastro_vaga where status =3;";
    $vagasaguarexec=mysqli_query($conn,$vagasaguare);
    $vagasaguaretotal=mysqli_fetch_assoc($vagasaguarexec);

?>