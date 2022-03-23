<?php
	$view = 'todas.empresas';
	$acao6 = 'recuperar';
	require "../controller/empresa_controller.php";
	/*echo '<pre>';
	print_r($empresas);
	echo '</pre>';*/
	/*echo '<pre>';
	print_r($numero_paginas);
	echo '</pre>';*/
?>
<?
	$acao3 = 'recuperar2';
	require "../controller/cidade_controller.php";

	$acao2 = 'recuperar2';
	require "../controller/estado_controller.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - Empresa</title>

		<!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	    <style>
	     body {
	         font-size: 0.75em;
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
	    <script>
	    	function pesquisar(){

	    		let paisPesquisa = document.getElementById('paises')

	    		paisPesquisa = innerHTML = ''

	    		let campo = document.getElementById('inputPesquisa')

	    		let select = document.getElementById('iGSelect01')


	    	}
			function editar(id, txt_estado, txt_sigla, txt_pais_id) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = '../controller/estado_controller.php?acao6=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto para coluna estado
				let inputEstado = document.createElement('input')
				inputEstado.type = 'text'
				inputEstado.name = 'estado'
				inputEstado.className = 'col-4 form-control btn-sm ml-3'
				inputEstado.value = txt_estado

				//criar um input para entrada do texto para coluna sigla
				let inputSigla = document.createElement('input')
				inputSigla.type = 'text'
				inputSigla.name = 'sigla'
				inputSigla.className = 'col-2 form-control btn-sm mx-1'
				inputSigla.value = txt_sigla

				//criar um input para entrada do texto para coluna id de pais
				let inputPais = document.createElement('input')
				inputPais.type = 'text'
				inputPais.name = 'pais_id'
				inputPais.className = 'col-1 form-control btn-sm mx-1'
				inputPais.value = txt_pais_id


				//criar um input hidden para guardar o id do estado
				let inputId = document.createElement('input')
				inputId.type ='hidden'
				inputId.name = 'id'
				inputId.value = id


				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-2 btn btn-info btn-sm mx-1'
				button.innerHTML = 'Atualizar'
				button.click

				//criar um button para envio do form
				let button2 = document.createElement('button')
				button2.type = 'submit'
				button2.className = 'col-2 btn btn-warning btn-sm mx-1'
				button2.innerHTML = 'Cancelar'
				button2.click = function(){estado.destroy}

				//incluir inputEstado no form
				form.appendChild(inputEstado)

				//incluir inputSigla no form
				form.appendChild(inputSigla)

				//incluir inputPais no form
				form.appendChild(inputPais)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//incluir button no form
				form.appendChild(button2)

				//selecionar a div estado
				let estado = document.getElementById(id)

				//limpar o texto da tarefa para inclusão do form
				estado.innerHTML = ''

				//incluir form na página
				estado.insertBefore(form, estado[0])

			}

			function excluir(id) {
				location.href = 'todas.empresas.php?acao6=remover&id='+id
			}
		</script>

	</head>
	<body>
		<?php
			require_once '../menu_rodape/menu.php'
		?>
		<?php
    		require_once '../common/delete.php'
  		?>
		<main role="main" style="margin-bottom: -1px;padding: 0.2em;">
			<div class="card" style="margin-bottom: 1em;">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<!--div class="row mt-9"-->
						<form class="form-inline">
							<div class="input-group">
							   <input type="text" class="form-control" placeholder="" aria-label="Informe número da nota fiscal" id="inputPesquisa" style="font-size: 0.9em">
							  <div class="input-group-append">
							    <button class="btn btn-outline-primary btn-sm" onclick="pesquisar()" type="button" arial-label="Botão pesquisar por número de nota fiscal"  style="font-size: 0.9em">Pesquisar</button>
							  </div>
							</div>
						</form>
			        <!--/div-->
					<div class="card  ml-auto">
			        	<a href="empresa.php?acao6=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button" style="font-size: 0.9em">Novo</button></a>
			        </div>
		        </nav>
			</div>
		    <div class="card card-columns" style="height: 44em; padding: 0px; border:;">
		      	<div class="card bg-light border-light md-2 font-weight-light">
			      	<div class="card-body">
			      		<h5 class="card-title text-left">Empresas</h5>
				       	<div class="">
				       		<div style="" id="estados">
					          	<!--?php
					          		foreach($estados as $key => $estado): ?>
				              			<div class="row mb-3 d-flex align-items-center">
										<div class="col-sm-9" id="<?= $estado->id?>">
											<?= $estado->id?> - <?= $estado->estado ?> (<?= $estado->sigla?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $estado->id?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $estado->id ?>, '<?= $estado->estado ?>','<?= $estado->sigla ?>','<?= $estado->pais_id ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success"></i>
										</div>
										</div>
				          		<!--?php endforeach; ?-->
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover"  style="margin-top: 0em;">
			          					<thead>
				          					<tr>
					          					<th class="text" scope="col" style="width: 3em;">Id</th>
					          					<th class="text" scope="col" style="width: 33em;">Razão Social</th>
					          					<th class="text" scope="col" style="width: 15em;">Nome Fantasia</th>
					          					<th class="text" scope="col" style="width: 10em;">CNPJ</th>
					          					<th class="text"scope="col" style="width: 7em;">I.E.</th>
					          					<th class="text" scope="col" style="width: 44em;">Endereço</th>
					          					<th class="text" scope="col" style="width: 20em;">Cidade</th>
					          					<th class="text" scope="col" style="width: 8em;">Cep</th>
					          					<th class="text-" scope="col" style="width: 2em;">Update</th> 
                              					<th class="text-" scope="col" style="width: 2em;">Delete</th>
					          					<!--th class="" scope="col" colspan="2" style="width: 2em;"></th-->
					          					<!--th class="" style="width: 2em;">Excluir</th-->
				          					</tr>
			          					</thead>
			          					<tbody>
						          		<?php foreach($empresas as $key => $empresa): ?>
					          					<tr>
					          						<div class="col-sm-9" id="<?= $empresa->id ?>">
					          							<form method="post" action="empresa.php?acao6=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $empresa->id ?>"><?= $empresa->id ?></td>
								          					<td><input type="hidden" name="razao_social" value="<?= $empresa->razao_social ?>"><?= $empresa->razao_social ?></td>
								          					<td><input type="hidden" name="nome_fantasia" value="<?= $empresa->nome_fantasia ?>"><?= $empresa->nome_fantasia ?></td>
								          					<td><input type="hidden" name="cnpj" value="<?= $empresa->cnpj ?>"><?= $empresa->cnpj ?></td>
								          					<td><input type="hidden" name="ie" value="<?= $empresa->ie?>"><?= $empresa->ie?></td>
								          					<td><input type="hidden" name="endereco" value="<?= $empresa->endereco?>"><?= $empresa->endereco?></td>
								          					<td><input type="hidden" name="cidade" value="<?= $empresa->cidade?>"><?= $empresa->cidade?></td>
								          					<td><input type="hidden" name="cep" value="<?= $empresa->cep?>"><?= $empresa->cep?></td>
								          					<input type="hidden" name="cidade_id" value="<?= $empresa->cidade_id?>"></input>
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
								          					<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $empresa->id?>)"></i></td>
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
		    </div>
		    <!-- fim cartao -->
		   <?php require_once '../menu_rodape/footer.php'?> 
			</main>
	 	<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
		<!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
