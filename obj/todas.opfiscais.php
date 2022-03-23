<?php 
	$view = 'todas.opfiscais';
	$acao4 = 'recuperar';
	require "../controller/opfiscal_controller.php";
?>
<?
	$acao7 = 'recuperar';
	require "../controller/cfop_controller.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App CFA - Operações</title>

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
			function editar(id, txt_cfop, txt_descricao) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = '../controller/opfiscal_controller.php?acao4=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto para coluna cfop
				let inputCfop = document.createElement('input')
				inputCfop.type = 'text'
				inputCfop.name = 'cfop'
				inputCfop.className = 'col-4 form-control btn-sm ml-3'
				inputCfop.value = txt_cfop

				//criar um input para entrada do texto para coluna descrição
				let inputDescricao = document.createElement('input')
				inputDescricao.type = 'text'
				inputDescricao.name = 'descricao'
				inputDescricao.className = 'col-4 form-control btn-sm ml-3'
				inputDescricao.value = txt_descricao

				//criar um input hidden para guardar o id do cfop
				let inputId = document.createElement('input')
				inputId.type ='hidden'
				inputId.name = 'id'
				inputId.value = id
				
				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info btn-sm mx-1'
				button.innerHTML = 'Atualizar'

				//incluir inputCfop no form
				form.appendChild(inputCfop)

				//incluir inputDescricao no form
				form.appendChild(inputDescricao)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//selecionar a div estado
				let cfop = document.getElementById(id)

				//limpar o texto da div estado para inclusão do form
				cfop.innerHTML = ''

				//incluir form na página
				cfop.insertBefore(form, cfop[0])

			}

			function excluir(id) {
				location.href = 'todas.opfiscais.php?acao4=remover&id='+id
			}
			function marcardesabilitado(id) {
				location.href = 'todas.opfiscais.php?acao4=marcarDesabilitado&id='+id;
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
			        	<a href="opfiscal.php?acao4=inserir" target="_parent"><button class="btn btn-primary btn-sm" type="button" style="font-size: 0.9em">Novo</button></a>
			        </div>
		        </nav>
			</div>
		    <div class="card card-columns"style="height: 44em; padding: 0px; border:;">
		      	<div class="card bg-light border-light md-2 font-weight-light">
			      	<div class="card-body">
			      		<h5 class="card-title text-left">Operação Fiscal</h5>
				       	<div class="">
				       		<div style="" id="estados">
				          		<table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;">
			          				<thead>
			          					<tr>
				          					<th class="text" style="width:3em">Id</th>
				          					<th class="text" style="width:23em">Sigla</th>
				          					<th class="text" style="width:56em">Descrição</th>
				          					<th class="text" style="width:10em">CFOP</th>
				          					<th class="text" style="width:10em">Prazo</th>
				          					<th class="text-" scope="col" style="width: 3em;">Update</th> 
                          					<th class="text-" scope="col" style="width: 3em;">Delete</th>
				          					<!--th class="text" scope="col"  colspan="2" style="width:4em"></th-->
			          					</tr>
		          					</thead>
		          					<tbody> 
						          		<?php
							          		foreach($opfiscais as $key => $opfiscal): ?>
					          					<tr>
					          						<div class="col-sm-2" id="<?= $opfiscal->id ?>">
					          							<form method="post" id="<?= $opfiscal->id ?>" action="opfiscal.php?acao4=atualizar">
							          						<td><input type="hidden" name="id" value="<?= $opfiscal->id ?>"><?= $opfiscal->id ?></td>
							          						<td><input type="hidden" name="sigla_op_fiscal" value="<?= $opfiscal->sigla_op_fiscal ?>"><?= $opfiscal->sigla_op_fiscal ?></td>
							          						<td><input type="hidden" name="opdescricao" value="<?= $opfiscal->opdescricao ?>"><?= $opfiscal->opdescricao ?></td>
							          						<td><input type="hidden" name="cfop" value="<?= $opfiscal->cfop ?>"><?= $opfiscal->cfop ?></td>
							          						<input type="hidden" name="cfop_id" value="<?= $opfiscal->cfop_id ?>">
							          						<td><input type="hidden" name="prazo" value="<?= $opfiscal->prazo ?>"><?= $opfiscal->prazo ?></td>
								          					<td><button class="btn btn-sm btn-info btn-outline" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit" id="<?= $opfiscal->id ?>"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
								          					<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="excluir(<?= $opfiscal->id ?>)"></i></td>
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