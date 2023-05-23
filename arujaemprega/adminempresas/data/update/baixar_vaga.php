<?php
            
            include('../banco.php');
            $pdo  = Banco::conectar();

            $vaga = $_POST['id'];
            $empresa = $_POST['idempresa'];
            $data = date('Y-m-d');

            $motivo = $_POST['motivo'];

           if($motivo == 'arujaemprega'){

                $checkbox = empty($_POST['candidato'])? 'nenhum' : $_POST['candidato'];
                $quantidade = empty($_POST['quantidadecand'])? 'vazio' : $_POST['quantidadecand'];

                if($checkbox == 'nenhum' || $quantidade == 'vazio' ){

                    header('Location: ../../index.php?p=listarvagas&baixado=0');

                }else{

                    $qtdcandidato=count($_POST['quantidadecand']);
                    for($i=0;$i< $qtdcandidato;$i++)
                    {
                       
                        $query_solicitacao =  "INSERT INTO `bd_emprega_aruja`.`tb_candidato_contratado` (`id_candidato`, `id_vaga`, `id_empresa`, `data`) VALUES ('$checkbox[$i]', '$vaga', '$empresa', '$data') ";
                        
                        $resultado_cadastro = $pdo->query($query_solicitacao);
                                
                    }
                    
                    if( $pdo->lastInsertId()){
                        $sql1  = "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET `status`='2', `vagapreenchida`='1' WHERE `id_vaga`='$vaga'";
                        $exec1 = $pdo->query($sql1);
                        if($exec1){
                            $sqlup = "UPDATE `bd_emprega_aruja`.`tb_candidatura_vaga` SET `status_candidatura`='2' WHERE `id_vaga`='$vaga' and status_candidatura = 0 ";
                            $execSqlUp = $pdo->query($sqlup);

                            header('Location: ../../index.php?p=listarvagas&baixado=1');
                        }else{
                            header('Location: ../../index.php?p=listarvagas&baixado=0');
                        }
                
                    }
                    else{
                      
                      header('Location: ../../index.php?p=listarvagas&baixado=0');
                    }

                }
                
               
           }else{

            $site = empty($_POST['site'])? 'vazio' : $_POST['site'];
                if($site == 'vazio'){
                    header('Location: ../../index.php?p=listarvagas&baixado=0');

                } else{
                $sql2  = "UPDATE `bd_emprega_aruja`.`tb_cadastro_vaga` SET `status`='2', `vagapreenchida`='2', `site_utilzado`='$site' WHERE `id_vaga`='$vaga'";

                $exec2 = $pdo->query($sql2);
        
                if($exec2){
                    $sqlup = "UPDATE `bd_emprega_aruja`.`tb_candidatura_vaga` SET `status_candidatura`='2' WHERE `id_vaga`='$vaga' and status_candidatura = 0 ";
                    $execSqlUp = $pdo->query($sqlup);

                    header('Location: ../../index.php?p=listarvagas&baixado=1');
                }
                else{
                    header('Location: ../../index.php?p=listarvagas&baixado=0');
                }

            }
        }
       
           


 
?>