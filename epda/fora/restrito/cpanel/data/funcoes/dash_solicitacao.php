<?php



 foreach($pdo->query($sql)as $row)
                        {
 echo '<tr >';
                           // echo '<td style="text-align: center;">'					. $row['id'] 			 . '</td>';
                            echo '<td>'																. $row['numprotocolo'] 			 . '</td>';
                            echo '<td style="text-align: center;">'									. $row['data_intercorrencia']			 . '</td>';
						    echo '<td style="text-align: center;">'									. $row['id_cod_inter'] 		 . '</td>';
						    echo '<td style="text-align: center;">'									. $row['situacao']		 . '</td>';
                       		
                           	
							
						                          echo '<tr>';
						}
Banco::desconectar();

?>

