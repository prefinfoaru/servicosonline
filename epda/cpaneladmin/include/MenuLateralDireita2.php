  <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds" style="color: #8F2A2B">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Lista de Documentos Enviados</h3><br>
                       
		                                   
                    <?php
             
 $path = "./../cpanel/consultaanexos/epda".$ProtocoloRequerimento."/" ; 
 $diretorio = dir($path);
 $i = 1 ;
 
	        
	   while($arquivo = $diretorio -> read()){
           if($arquivo !="." && $arquivo !="..") 
              
               
	      echo "Acessar Documento nº: ". "<a href='$path"."$arquivo' target ='_blank'>".$i++.""."  Acessar"."</u></a><br><br>" ;
          
	   }
	   $diretorio -> close();
?>
        
                      
		                      
                       <!-- USERS ONLINE SECTION -->
	<h3>Lista De Documentação Pendente</h3><br>
               <?php
             
 $path = "./../cpanel/consultaanexosped/epda".$ProtocoloRequerimento.'/' ; 
 
 
 
                      if(is_dir($path)) {
                        
                 $diretorio = dir($path);   
                          $i = 1 ;
                      
	   while($arquivo = $diretorio -> read()){    
           
           if($arquivo !="." && $arquivo !="..") {
              
               
	      echo "Acessar Documento nº: ". "<a href='$path"."$arquivo' target ='_blank'>".$i++.""."  Acessar"."</u></a><br><br>" ;
           }
           
        
           }
              $diretorio -> close();        
	   }
                     
         if(!is_dir($path)) { 
         echo "Não existe Documento para essa Lista" ;
         }        
                      
	  
?>
                        <!-- CALENDAR-->
              <!--          <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>
