<?php 
	$view = 'todas.cidades';
	$acao3 = 'recuperar';
	require "../controller/cidade_controller.php";
?>
<?
	$acao2 = 'recuperar';
	require "../controller/estado_controller.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - Cidade</title>

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
			function editar(id, txt_cidade, txt_estado_id) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = '../controller/cidade_controller.php?acao3=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto para coluna estado
				let inputCidade = document.createElement('input')
				inputCidade.type = 'text'
				inputCidade.name = 'cidade'
				inputCidade.className = 'col-4 form-control  ml-3'
				inputCidade.value = txt_cidade

				//criar um input para entrada do texto para coluna Estado
				let inputEstado = document.createElement('input')
				inputEstado.type = 'text'
				inputEstado.name = 'estado_id'
				inputEstado.className = 'col-1 form-control  mx-1'
				inputEstado.value = txt_estado_id

				//criar um input hidden para guardar o id do estado
				let inputId = document.createElement('input')
				inputId.type ='hidden'
				inputId.name = 'id'
				inputId.value = id


				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info  mx-1'
				button.innerHTML = 'Atualizar'

				//incluir inputEstado no form
				form.appendChild(inputCidade)

				//incluir inputPais no form
				form.appendChild(inputEstado)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//selecionar a div estado
				let cidade = document.getElementById(id)

				//limpar o texto da div estado para inclusão do form
				cidade.innerHTML = ''

				//incluir form na página
				cidade.insertBefore(form, cidade[0])

			}

			function excluir(id) {
				location.href = 'todas.cidades.php?acao3=remover&id='+id
			}
			function atualizar(id, txt_cidade, txt_estado_id) {
				//criar um form de edição
				let form = document.createElement('form')
				form.name = 'form'
				form.action = "cidade.php?acao3=atualizar"
				form.method = 'post'
				form.className = 'row'
				form.id = 'id'

				//criar um input para entrada do texto para coluna estado
				let inputCidade = document.createElement('input')
				inputCidade.type = 'text'
				inputCidade.name = 'cidade'
				inputCidade.className = 'col-4 form-control  ml-3'
				inputCidade.value = txt_cidade

				//criar um input para entrada do texto para coluna Estado
				let inputEstado = document.createElement('input')
				inputEstado.type = 'text'
				inputEstado.name = 'estado_id'
				inputEstado.className = 'col-1 form-control  mx-1'
				inputEstado.value = txt_estado_id

				//criar um input hidden para guardar o id do estado
				let inputId = document.createElement('input')
				inputId.type ='text'
				inputId.name = 'id'
				inputId.value = id


				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info  mx-1'
				button.innerHTML = 'Atualizar'
				button.id = id

				//incluir inputEstado no form
				form.appendChild(inputCidade)

				//incluir inputPais no form
				form.appendChild(inputEstado)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//selecionar a div estado
				let cidade = document.getElementById(id)

				//limpar o texto da div estado para inclusão do form
				cidade.innerHTML = ''

				//incluir form na página
				cidade.insertBefore(form, cidade[0])
				document.getElementById(id).onclick();
				//button.submit();
				//document.getElementById('form').submit();
				//document.getElementByName('form').submit();
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
					<form class="form-inline">
					<div class="input-group">
					   <input type="text" class="form-control" placeholder="" aria-label="" id="inputPesquisa" style="font-size: 0.9em">
					  <div class="input-group-append">
					    <button class="btn btn-outline-primary btn-sm" onclick="pesquisar()" type="button" style="font-size: 0.9em">Pesquisar</button>
					  </div>
					</div>
					</form>
					<div class="card  ml-auto">
			        	<a href="cidade.php?acao3=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button" style="font-size: 0.9em">Novo</button></a>
			        </div>
		        </nav>
			</div>
		    <div class="card card-columns" style="height: 34em; padding: 0px; border:;">
		      	<div class="card bg-light border-light md-2 font-weight-light">
			      	<div class="card-body">
			      		<h5 class="card-title text-left">Cidades</h5>
				       	<div class="">
				       		<div style="" id="estados">
					          	<!--?php
					          		foreach($cidades as $key => $cidade): ?>
				              			<div class="row mb-3 d-flex align-items-center">
										<div class="col-sm-9" id="<?= $cidade->id?>">
											<?= $cidade->id?> - <?= $cidade->cidade ?> (<?= $cidade->estado_id?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $cidade->id?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $cidade->id ?>, '<?= $cidade->cidade ?>','<?= $cidade->estado_id ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success"></i>
										</div>
										</div>
				          		<!--?php endforeach; ?-->
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;">
			          					<thead>
			          					<tr>
				          					<th class="text" style="width:5em">Id</th>
				          					<th class="text" style="width:67em">Cidade</th>
				          					<th class="text" style="width:35em">Estado</th>
				          					<th class="text-" scope="col" style="width: 2em;">Update</th> 
                              				<th class="text-" scope="col" style="width: 2em;">Delete</th>
				          					<!--th class="text" scope="col"  colspan="2" style="width:2em"></th-->
			          					</tr>
			          					</thead>
			          					<tbody>
						          		<?php
							          		foreach($cidades as $key => $cidade): ?>
					          					<tr>
					          						<div class="col-sm-2" id="<?= $cidade->id ?>">
					          							<form method="post" action="cidade.php?acao3=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $cidade->id ?>"><?= $cidade->id ?></td>
							          						<td class="text-uppercase"><input type="hidden" name="cidade" value="<?= $cidade->cidade ?>"><?= $cidade->cidade ?></td>
							          						<td class="text-uppercase"><input type="hidden" name="estado" value="<?= $cidade->estado ?>"><?= $cidade->estado ?></td>
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit" id="<?= $cidade->id ?>"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
								          						<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $cidade->id?>)"></i></td>
								          					<input type="hidden" name="estado_id" value="<?= $cidade->estado_id?>"></input>
								          					<!--td><i class="fas fa-edit fa-lg text-info" onclick="atualizar(<?= $cidade->id ?>, '<?= $cidade->cidade ?>','<?= $cidade->estado_id ?>')"></i></td>
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
