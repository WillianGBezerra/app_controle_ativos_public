<?php 
	$view = 'todos.paises';
	$acao = 'recuperar';
	require "../controller/pais_controller.php";

	/*echo '<pre>';
	print_r($paises);
	echo '</pre>';*/ 

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - País</title>

		<!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	    <style>
	    	body {
		     font-size: 0.6em;
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
			function editar(pais_id, txt_nome, txt_sigla) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = '../controller/pais_controller.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto para coluna descrição
				let inputDescricao = document.createElement('input')
				inputDescricao.type = 'text'
				inputDescricao.name = 'pais_nome'
				inputDescricao.className = 'col-4 form-control  ml-3'
				inputDescricao.value = txt_nome

				//criar um input para entrada do texto para coluna sigla
				let inputSigla = document.createElement('input')
				inputSigla.type = 'text'
				inputSigla.name = 'pais_sigla'
				inputSigla.className = 'col-3 form-control  mx-1'
				inputSigla.value = txt_sigla

				//criar um input hidden para guardar o id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'pais_id'
				inputId.value = pais_id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info  mx-1'
				button.innerHTML = 'Atualizar'

				//incluir inputTarefa no form
				form.appendChild(inputDescricao)

				//incluir inputTarefa no form
				form.appendChild(inputSigla)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//teste
				//console.log(form)

				//selecionar a div tarefa
				let pais = document.getElementById('pais_'+pais_id)

				//limpar o texto da tarefa para inclusão do form
				pais.innerHTML = ''

				//incluir form na página
				pais.insertBefore(form, pais[0])

			}

			function excluir(id) {
				location.href = 'todos.paises.php?acao=remover&id='+id
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
		<main role="main" style="margin-bottom: 1px;padding: 1.5em;">	
			<div class="card" style="margin-bottom: 1em;">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<form class="form-inline">
					<div class="input-group">
					   <input type="text" class="form-control" placeholder="" aria-label="" id="inputPesquisa" style="font-size: 0.9em">
					  <div class="input-group-append" >
					    <button class="btn btn-outline-primary btn-sm" onclick="pesquisar()" type="button" style="font-size: 0.9em">Pesquisar</button>
					  </div>
					</div>
					</form>
					<div class="card  ml-auto">
			        	<a href="pais.php?acao=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button" style="font-size: 0.9em">Novo</button></a>
			        </div>
		        </nav>
			</div>
		    <div class="card card-columns" style="height: 44.5em; padding: 0px; border:;">
		      	<div class="card bg-light border-light md-2 font-weight-light" style="border: ;">
			      	<div class="card-body" style="border: ;">
			      		<h5 class="card-title text-left" style="">Países</h5>
				       	<div class="" style="border:;">
				       		<div style="" id="paises" style="border:;">
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;font-size: 0.9em;">
			          				<thead>
			          					<tr>
				          					<th class="text" scope="col"  style="width:5em">Id</th>
				          					<th class="text" scope="col"  style="width:80em">País</th>
				          					<th class="text" scope="col"  style="width:50em">Sigla</th>
				          					<th class="text" scope="col" style="width: 3em;">Update</th> 
                      						<th class="text" scope="col" style="width: 3em;">Delete</th>
				          					<!--th class="text" scope="col"  colspan="2" style="width:2em"></th-->
				          					<!--th class="text-uppercase" scope="col"  style="width:6em">Excluir</th-->
			          					</tr>
			          				</thead>
		          					<tbody>
						          		<?php
							          		foreach($paises as $key => $pais): ?>
					          					<tr>
					          						<div class="col-sm-9" id="<?= $pais->id ?>">
					          							<form method="post" action="pais.php?acao=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $pais->id ?>"><?= $pais->id ?></td>
								          					<td class="text-uppercase"><input type="hidden" name="pais" value="<?= $pais->pais ?>"><?= $pais->pais ?></td>
								          					<td class="text-uppercase"><input type="hidden" name="sigla" value="<?= $pais->sigla ?>"><?= $pais->sigla ?></td>
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
								          					<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $pais->id?>)"></i></td>
								          					<!--td><i class="fas fa-trash-alt fa-lg text-info" type="submit" onclick="editar(<?= $estado->id ?>, '<?= $estado->estado ?>','<?= $estado->sigla ?>', '<?= $estado->pais_id ?>')"></i></td>
							          						<!--td><i class="fas fa-check-square fa-lg text-success"></i></td-->
					          							</form>
					          					</tr>
						          		<?php endforeach; ?>
		          					</tbody>
			          			</table>
					        </div>
				        </div>
				    </div>
			    </div>

		    </div><!-- fim cartao --> 
		    <!--div style="margin-top: -1em;">
			    <div class="pagination m-0 p-0 justify-content-end" style="border:;">
	              <div class="btn-group btn-group-toggle" data-toggle="buttons">
	                <label class="btn btn-outline-primary btn-sm active">
	                  <input type="radio" name="options" id="option1" autocomplete="off"> Gerar Excel
	                </label>
	                <label class="btn btn-outline-primary btn-sm">
	                  <a href="UpLoadExcel.php"><input type="radio" name="options" id="option2" autocomplete="off" style="text-decoration: none;"> Importar Excel</a>
	                </label>
	              </div>  
	           </div> 
           		</div-->
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