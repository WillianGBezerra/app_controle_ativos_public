<?php
	
	$acao8 = 'recuperar';  
	require "../controller/remessa_controller.php";
  $acao6 = 'recuperar2';
  require "../controller/empresa_controller.php";
?>
<?
  $acao4 = 'recuperar';
	require '../controller/opfiscal_controller.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - Home</title>

		
	  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	    <style>
	    	body {
       font-size: 0.65em;
     }
	      .bd-placeholder-img {
	        font-size: 1.125rem;
	        text-anchor: middle;
	        -webkit-user-select: none;
	        -moz-user-select: none;
	        -ms-user-select: none;
	        user-select: none;
	      }

	      @media (min-width: 768px) {
	        .bd-placeholder-img-lg {
	          font-size: 3.5rem;
	        }
	      }
	    </style>

	</head>
	<body>
		<?php
      require_once '../menu_rodape/menu.php'
  	?>
		<main role="main" style="margin-bottom: 1px;padding: 0.005em;">
				<div class="card" style="margin-bottom: 0.005em;">
					
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<form class="form-inline">
						<div class="input-group">
							<form class="form-inline" method="post" action="remessa.php?acao8=atualizar">
							  <select class="custom-select" id="inputGroupSelect04" aria-label="Selecione Origem ou destino" style="font-size: 0.9em">
							    <option value="1">Origem</option>
							    <option value="2">Destino</option>
							  </select>
							    
						    <select name="empresa_id" class="custom-select" id="empresa_id" value="<?= $empresa_id?>"aria-label="Selecione uma empresa" style="font-size: 0.9em" required>
						    	<option selected>Empresa</option>
						      <?php foreach($empresas as $key => $empresa):  ?>
										<option name="" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
						    	<?php endforeach; ?>
								</select>
								
								<select name="empresa_id" class="custom-select" id="empresa_id" value="<?= $empresa_id?>"aria-label="Selecione uma empresa" style="font-size: 0.9em" required>
						    	<option selected>Operação</option>
						      <?php foreach($opfiscais as $key => $opfiscal):  ?>
										<option name="" value="<?= $opfiscal->id?>"><?= $opfiscal->opdescricao ?></option>
						    	<?php endforeach; ?>
								</select>

							  <div class="input-group-append">
							    <button class="btn btn-outline-primary" type="submit" style="font-size: 0.9em">Ok</button>
							  </div>
							</form>
						   <input type="text" class="form-control" placeholder="" aria-label="" style="font-size: 0.9em">
						   <select class="custom-select" id="inputGroupSelect04" aria-label="Selecione uma opção de pesquisa" style="font-size: 0.9em">
						    <option value="0"></option>
						    <option value="1" aria-label="Pesquisar por NFe">NFe</option>
						    <option value="2" aria-label="Pesquisar por item">Item</option>
						    <option value="3" aria-label="Pesquisar por Descrição do Ativo">Descrição</option>
						    <option value="4" aria-label="Pesquisar pelo número do EAM">EAM</option>
						    <option value="5" aria-label="Pesquisar pelo número do chassi">Chassi</option>
						    <option value="6" aria-label="Pesquisar pelo número do ativo">Nº FA</option>
						    <option value="7" aria-label="Pesquisar pela placa do ativo">Placa</option>
						  </select>
						  <div class="input-group-append">
						    <button class="btn btn-outline-primary" type="button" style="font-size: 0.9em">Ok</button>
						  </div>
						</div>
						</form>
						<div class="card  ml-auto">
				        	<button class="btn btn-danger" type="button" style="font-size: 0.9em">This Week</button>
				        </div>
			        </nav>
				</div>
				<br>

				
		    <div class="card card-columns" style="height: 45em; padding: 0px 0px 0px 0px; border:;">
		      <div class="card bg-light border-light md-2 font-weight-light">
		      <div class="card-body">
		      	<h5 class="card-title text-left">Remessas Pendentes</h5>
		       	<div class="table-responsive">
				         <table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;font-size: 0.85em;">
				          <thead>
				            <tr>
				              <th class="text" scope="col" style="width: 3em;">Id</th>
				              <th class="text-" scope="col" style="width: 5em;">NFe</th>
				              <th class="text-" scope="col" style="width: 6em;">Emissão</th>
                      <th class="text-" scope="col" style="width: 6em;">Entrada</th>
                      <th class="text-" scope="col" style="width: 11em;">Origem</th>
                      <th class="text-" scope="col" style="width: 11em;">Destino</th>
                      <th class="text-" scope="col" style="width: 70em;">Ativo</th>
                      <th class="text" scope="col" style="width: 12em;">Operação</th>
                      <th class="text-" scope="col" style="width: 6em;">Prazo</th> 
                      <th class="text-" scope="col" style="width: 6em;">Status</th>   
                      <th class="" scope="col" colspan="2" style="width: 2em;">U/D</th>
				            </tr>
				          </thead>
				          <tbody>
				            <?php foreach($remessas as $key => $remessa): ?>
                              <tr>
                                <div class="col-sm-9" id="<?= $remessa->id ?>">
                                  <form method="post" action="remessa.php?acao8=atualizar">
                                    <td><input type="hidden" name="id" value="<?= $remessa->id ?>"><?= $remessa->id ?></td>
                                    <td><input type="hidden" name="notafiscal" value="<?= $remessa->notafiscal ?>"><?= $remessa->notafiscal ?></td>
                                     <td><input type="hidden" name="emissao" value="<?= $remessa->emissao?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->emissao)))?></td>
                                    <td><input type="hidden" name="entrada" value="<?= $remessa->entrada?>"><?=date('d/m/Y', strtotime('+0 days', strtotime($remessa->entrada))) ?></td>
                                    <td><input type="hidden" name="origem_id" value="<?= $remessa->origem_id ?>"><?= $remessa->origem ?></td>
                                    <input type="hidden" name="origem" value="<?= $remessa->origem ?>"></input>
                                    <td><input type="hidden" name="destino_id" value="<?= $remessa->destino_id ?>"><?= $remessa->destino ?></td>
                                    <td><input type="hidden" name="ativo_id" value="<?= $remessa->ativo_id ?>"><?= $remessa->ativo ?> - <?= $remessa->descricao ?> - <?= $remessa->placa ?> - <?= $remessa->eam ?> - <?= $remessa->chassi ?></td>
                                      <input type="hidden" name="ativo" value="<?= $remessa->ativo ?>-<?= $remessa->descricao ?>-<?= $remessa->placa ?>-<?= $remessa->eam ?>-<?= $remessa->chassi ?>"></input>
                                    <td><input type="hidden" name="opfiscal_id" value="<?= $remessa->opfiscal_id ?>"><?= $remessa->opdescricao ?></td>
                                      <input type="hidden" name="opfiscal" value="<?= $remessa->prazo?>-<?= $remessa->sigla_op_fiscal ?>"></input>
                                    <td><input type="hidden" name="retorno" value="<?= $remessa->retorno?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->retorno)))?></td>
                                    <td><input type="hidden" name="opfiscal_id" value="<?= $remessa->opfiscal_id ?>"><?= $remessa->status ?></td>
                                    <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button>
                                    <i class="fas fa-trash-alt fa-lg text-danger" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="excluir(<?= $remessa->id?>)"></i></td>
                                    <!--td><i class="fas fa-edit fa-lg text-info" type="submit" onclick="editar(<?= $estado->id ?>, '<?= $estado->estado ?>','<?= $estado->sigla ?>', '<?= $estado->pais_id ?>')"></i></td>
                                    <!--td><i class="fas fa-check-square fa-lg text-success"></i></td-->
                                  </form>
                                </div>
                              </tr> 
                          <?php endforeach; ?>	
				          </tbody>
				        </table>
				      </div>
			      	</div>
			    </div>
		    </div>
		    <!-- fim cartao -->
		    <!--?php require_once '../menu_rodape/footer.php'?-->
		</main>
		<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="../js/bootstrap.min.js"></script> 
	</body>
</html>