<?php 
	$view = 'todos.status'
	$acao8 = 'recuperar';
	require "../controller/status_controller.php";
	/*echo '<pre>';
  	print_r($t);
  	echo '</pre>';*/
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - CFOP</title>

		<!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	    <style>
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
			function editar(id, txt_status) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = '../controller/status_controller.php?acao8=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto para coluna status
				let inputStatus = document.createElement('input')
				inputStatus.type = 'text'
				inputStatus.name = 'status'
				inputStatus.className = 'col-4 form-control  ml-3'
				inputStatus.value = txt_status

				//criar um input hidden para guardar o id do status
				let inputId = document.createElement('input')
				inputId.type ='hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info btn-sm  mx-1'
				button.innerHTML = 'Atualizar'

				//incluir inputStatus no form
				form.appendChild(inputStatus)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//selecionar a div status
				let status = document.getElementById(id)

				//limpar o texto da div estado para inclusão do form
				status.innerHTML = ''

				//incluir form na página
				status.insertBefore(form, status[0])

			}

			function excluir(id) {
				location.href = 'todos.status.php?acao8=remover&id='+id
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
		<main role="main" style="margin-bottom: -1px;padding: 8px;">	
			<div class="card">
				
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<form class="form-inline">
					<div class="input-group">
					   <input type="text" class="form-control" placeholder="" aria-label="" id="inputPesquisa">
					  <div class="input-group-append">
					    <button class="btn btn-outline-primary btn-sm" onclick="pesquisar()" type="button">Pesquisar</button>
					  </div>
					</div>
					</form>
					<div class="card  ml-auto">
			        	<a href="status.php?acao8=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button">Novo</button></a>
			        </div>
		        </nav>
			</div>
			<br>
		    <div class="card card-columns">
		      	<div class="card bg-light border-light md-2 font-weight-light">
			      	<div class="card-body">
			      		<h5 class="card-title text-left">Status</h5>
				       	<div class="">
				       		<div style="" id="status">
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
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 2em;font-size: 1.00em;">
			          				<thead>
			          					<tr>
				          					<th class="text" scope="col"  style="width:23em">Id</th>
				          					<th class="text" scope="col"  style="width:50em">Status</th>
				          					<th class="text" scope="col"  colspan="2" style="width:2em"></th>
			          					</tr>
		          					</thead>
		          					<!--tbody>
						          		<!--?php
							          		foreach($t as $key => $status): ?>
					          					<tr>
					          						<div class="col-sm-9" id="<?= $status->id ?>">
					          						<td><?= $status->id ?></td>
					          						<td><?= $status->status ?></td>
						          					<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $status->id?>)"></i></td>
						          					<td><i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $status->id ?>, '<?= $status->status ?>')"></i></td>
					          						<!--td><i class="fas fa-check-square fa-lg text-success"></i></td-->
					          						</div>
					          					</tr>
						          		<!--?php endforeach; ?>
		          					</tbody-->
		          					<tbody>
						          		<?php foreach($t as $key => $status): ?>
					          					<tr>
					          						<div class="col-sm-9" id="<?= $status->id ?>">
					          							<form method="post" id="<?= $status->id ?>" action="status.php?acao8=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $status->id ?>"><?= $status->id ?></td>
								          					<td><input type="hidden" name="status" value="<?= $status->status ?>"><?= $status->status ?></td>
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button>
								          					<i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $status->id?>)"></i></td>
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
			  	 <div style="position-fixed">
			<div class="navbar justify-content-center">
		    	<nav aria-label="Navegação de página">
				  <ul class="pagination justify-content-center">
				  	<li>
				  		<a class="page-link" href="?pagina=1" tabindex="-1">
				  			<span aria-hidden="true">&laquo;</span>
        					<span class="sr-only">Primeira</span>
				  		</a>
			  		</li>
				  	<li class="page-item">
				  		<?php $pagina_atual= $_GET['pagina']?>
				  		<?php $i= $pagina_atual?>

				  		<?php if ($i >= 2){
				  				$pagina_anterior = $pagina_atual-1;
                                //$pagina_anterior = 1;
                            } else if($i < 2)
                                $pagina_anterior = $pagina_atual;
                                for ($i=$pagina_atual; $i<$numero_paginas; $i++) {
				  			?>
				  		<?php } ?>
				  		<a class="page-link" href="?pagina=<?php echo $pagina_anterior?>" tabindex="-1">
				  			<span aria-hidden="true">&laquo;</span>
        					<span class="sr-only">Anterior</span>
				  		</a>
				  	</li>
			  		<?php require "../menu_rodape/paginacao.php";?>
				  	<!--?php for ($i=$pagina_atual-($pagina_atual); $i<$pagina_atual+($numero_paginas-$pagina_atual); $i++) {
				  		$estilo = "";
				  		if ($pagina == $i+1)
				  			$estilo ='class="page-item active"'?>
				  		<li <?php echo $estilo; ?> class=""><a class="page-link" href="?pagina=<?php echo $i+1; ?>"><?php echo $i+1 ?></a></li>
				  	<!--?php } ?-->
				  	<?php $p= $pagina_atual?>
				  	<?php if ($p < $numero_paginas){
			  				$pagina_posterir = $pagina_atual+1;
                            //$pagina_anterior = 1;
                        } else if($p = $numero_paginas)
                            $pagina_posterir = $pagina_atual;
                            for ($p=$pagina_posterir; $p<$numero_paginas; $p++) {
			  			?>
			  		<?php } ?>
				    <li class="page-item">
				    	<a class="page-link" href="?pagina=<?php echo $pagina_posterir?>">
				    		<span aria-hidden="true">&raquo;</span>
      						<span class="sr-only">Próximo</span>
				   		 </a>
					</li>
					<li class="page-item">
				    	<a class="page-link" href="?pagina=<?php echo $numero_paginas?>">
				    		<span aria-hidden="true">&raquo;</span>
      						<span class="sr-only">Últíma</span>
				    	</a>
				    </li>
				  </ul>
				</nav>
			    <!--a class="btn btn-outline-primary"  href="chamar.php">Exportar</a-->
		    </div>
		    <!-- fim cartao -->
		</main>
	 	<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
		<!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>