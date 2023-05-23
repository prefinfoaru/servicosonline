


<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
    
    	<h2>Cadastrar Empresa</h2>
        <form role="form">
        
        <div class="panel-group" id="accordion">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDadosGerais">
                            Dados Gerais
                        </a>
                    </h4>
                </div>
                
                <div id="collapseDadosGerais" class="panel-collapse collapse in">
                    <div class="panel-body">
    
                          <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="nome empresa">
                          </div>
                          
                          <div class="form-group">
                            <label>Apresentacao</label>
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseLocalizacao">
                            Localização
                        </a>
                    </h4>
                </div>
                
                <div id="collapseLocalizacao" class="panel-collapse collapse in">
                    <div class="panel-body">   
                          
                        <div class="row">
                        
                            <div class="col-xs-10">
                                <label>Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" placeholder="nome do logradouro">
                                <span class="help-block">nome da Rua \ Avenida</span>
                            </div>
                            
                            <div class="col-xs-2">
                                <label>Número</label>
                                <input type="text" class="form-control">
                            </div>
                            
                            <div class="col-xs-6">
                                <label>Complemento</label>
                                <input type="text" class="form-control" id="complemento">                               
                            </div>
                            
                            <div class="col-xs-6">
                                <label>Bairro</label>
                                <input type="text" class="form-control" id="bairro">                               
                            </div>
                            
                            <div class="col-xs-6">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="cidade">                               
                            </div>
                            
                            <div class="col-xs-6">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="bairro">                               
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                                
          
            </div>
        
		    <div class="panel panel-default">			
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseSocial">
							Rede Social
						</a>
					</h4>
				</div>
                <div id="collapseSocial" class="panel-collapse collapse in">
				   	<div class="panel-body">		
						<div class="row">
			
						<div class="col-xs-10">			
							<label>Site</label>
							<input type="text" class="form-control" id="site">		
						</div>
						
						<div class="col-xs-8">			
							<label>facebook</label>
							<input type="text" class="form-control" id="facebook">		
						</div>
						
						<div class="col-xs-8">			
							<label>twitter</label>
							<input type="text" class="form-control" id="twitter">		
						</div>
						
						<div class="col-xs-8">			
							<label>linkedin</label>
							<input type="text" class="form-control" id="linkedin">		
						</div>
						
						</div>	
                	</div>
                </div>
            </div>
              		
		<!-- panel-group -->               
        </div>
        
		<br/>
        <button type="submit" class="btn btn-default">Salvar</button>
		
        </form>
        
	</div>
</div>