<?php
	$view = 'todos.estados';
	$acao2 = 'recuperar';
	require "../controller/estado_controller.php";
	/*echo '<pre>';
	print_r($total_registros);
	echo '</pre>';*/
?>
<?
	$acao = 'recuperar2';
	require "../controller/pais_controller.php";
?>
<?php
	//$total_registros = 0;
	//$registros_por_pagina = 12;
	//$number_paginas = ceil($total_registros/$registros_por_pagina);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - Estado</title>

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
				form.action = '../controller/estado_controller.php?acao2=atualizar'
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
				location.href = 'todos.estados.php?acao2=remover&id='+id
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
							    <button class="btn btn-outline-primary btn-sm" onclick="pesquisar()" type="button" arial-label="Botão pesquisar por número de nota fiscal" style="font-size: 0.9em">Pesquisar</button>
							  </div>
							</div>
						</form>
			        <!--/div-->
					<div class="card  ml-auto">
			        	<a href="estado.php?acao2=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button" style="font-size: 0.9em">Novo</button></a>
			        </div>
		        </nav>
			</div>
		    <div class="card card-columns" style="height: 44em; padding: 0px; border:;">
		      	<div class="card bg-light border-light md-2 font-weight-light">
			      	<div class="card-body">
			      		<h5 class="card-title text-left">Unidade Federativa</h5>
				       	<div class="">
				       		<div style="" id="estados">
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;">
			          					<thead>
				          					<tr>
					          					<th class="text" scope="col" style="width: 3em;">Id</th>
					          					<th class="text" scope="col" style="width: 60em;">Estado</th>
					          					<th class="text" scope="col" style="width: 12em;">Sigla</th>
					          					<th class="text" scope="col" style="width: 25em;">Pais</th>
					          					<th class="text" scope="col" style="width: 3em;">Update</th> 
                          						<th class="text" scope="col" style="width: 3em;">Delete</th>
					          					<!--th class="text" scope="col"  colspan="2" style="width:2em"></th-->
					          					<!--th class="" style="width: 3em;">Atualizar</th>
					          					<th class="" style="width: 2em;">Excluir</th-->
				          					</tr>
			          					</thead>
			          					<tbody>
						          		<?php foreach($estados as $key => $estado): ?>
					          					<tr>
					          						<div class="col-sm-9" id="<?= $estado->id ?>">
					          							<form method="post" id="f<?=$estado->id?>" action="estado.php?acao2=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $estado->id ?>"><?= $estado->id ?></td>
								          					<td class="text-uppercase"><input type="hidden" name="estado" value="<?= $estado->estado ?>"><?= $estado->estado ?></td>
								          					<td class="text-uppercase"><input type="hidden" name="sigla" value="<?= $estado->sigla ?>"><?= $estado->sigla ?></td>
								          					<td class="text-uppercase"><input type="hidden" name="pais" value="<?= $estado->pais?>"><?= $estado->pais?></td>
								          					<input type="hidden" name="pais_id" value="<?= $estado->pais_id?>"></input>
								          					
								          					<!--td><i class=" fas fa-edit fa-lg text-info" onclick="document.getElementById(f<?=$estado->id?>).submit()"></i></td-->
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class="fas fa-edit fa-lg text-info"></i></button></td>
							          						<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $estado->id?>)"></i></td>
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
		
		<!---div class="navbar justify-content-center">
		    	<nav aria-label="Navegação de página">
				  <ul class="pagination justify-content-center">
				  	<li class="page-item">
				      <a class="page-link" href="?pagina=1" tabindex="-1">Primeira</a>
				    </li>
				  	<!?php for ($i=0; $i<$numero_paginas; $i++) {
				  		$estilo = "";
				  		if ($pagina == $i+1)
				  			$estilo ='class="page-item active"'?>
				  		<li <!--?php echo $estilo; ?> class=""><a class="page-link" href="?pagina=<!?php echo $i+1; ?>"><!?php echo $i+1 ?></a></li>
				  	<!--?php } ?>
				    <li class="page-item"><a class="page-link" href="?pagina=<!?php echo $numero_paginas?>">Última</a> </li>
				  </ul>
				</nav>
		        <!--a class="btn btn-outline-primary"  href="chamar.php">Exportar</a>
		    </div-->
	 	<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
		<!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
