<?php
	$view = 'estado';
	$acao = 'recuperar2';
	require '../controller/pais_controller.php';

	/*echo '<pre>';
	print_r($paises);
	echo '</pre>';*/
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';*/
?>
<?php
	$acao2 = isset($_GET['acao2']) ? $_GET['acao2'] : 'inserir';
	/*echo '<pre>';
	print_r($acao2);
	echo '</pre>';*/
?>

<!DOCTYPE html>
<html>
	<head>
		<?php if (isset($_GET['acao2']) && $_GET['acao2'] == 'atualizar') { ?>
			<?php $title = 'Atualizar Estado'?>
			<?php }	else if (isset($_GET['acao2']) && $_GET['acao2'] == 'inserir') {?>
			<?php $title = 'Novo Estado'?>
			<?php } ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?=$title?></title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">

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
	</head>
	<body>
		<?php
			require_once '../menu_rodape/menu.php'
		?>
		<!--nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">

			<!--Logo -->
			<!--a href="" class="navbar-brand display-1 text-hide img-responsive" style="background-image: url('imagens/logo-2.png'); width: 76px; height: 20px;">SLC Agrícola</a>
			<a href="home.php"><img class="img-responsive img-fluid img-thumbnai"src="imagens/logo-slcagricola.png" style="width: 170px; height: 45px"></a>

			<!-- Menu Hamburguer >
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- navegacao >
			<div class="collapse navbar-collapse" id="navegacao">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Remessa</a>
						<dir class="dropdown-menu">
							<a href="nova-remessa.html" class="dropdown-item">Nova Remessa</a>
							<div class="dropdown-divider"></div>
							<a href="" class="dropdown-item">Todas as Remessas</a>
						</dir>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Retorno</a>
						<dir class="dropdown-menu">
							<a href="" class="dropdown-item">Novo Retorno</a>
							<div class="dropdown-divider"></div>
							<a href="" class="dropdown-item">Todos os Retornos</a>
						</dir>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle"
						data-toggle="dropdown" >Cadastro</a>
						<div class="dropdown-menu">
							<a href="ativo.php" class="dropdown-item">Ativo</a>
							<div class="dropdown-divider"></div>
							<a href="empresa.php" class="dropdown-item">Empresa</a>
							<a href="op.fiscal.php" class="dropdown-item">Operação Fiscal</a>
							<div class="dropdown-divider"></div>
							<a href="cidade.php" class="dropdown-item">Cidade</a>
							<a href="estado.php" class="dropdown-item">Estado</a>
							<a href="pais.php" class="dropdown-item">Pais</a>
						</div>
					</li>
					<button type="button" class="btn btn-dark btn-sm text-dark disabled="true">Priii</button>
				</ul>
				<!-- Formulário >
				<form class="form-inline">
					<!--input class="form-control" type="text" name="" placeholder="Search" aria-label="Search">
						<button class="btn btn-primary active">ok</button>
				</form>
			</div>
		</nav-->

		<?php if (isset($_GET['acao2']) && $_GET['acao2'] == 'atualizar') { ?>
			<?php $id = $_POST['id']?>
			<?php $estado = $_POST['estado']?>
			<?php $sigla = $_POST['sigla']?>
			<?php $pais = $_POST['pais']?>
			<?php $pais_id = $_POST['pais_id']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $titleForm = 'Atualizar Estado'?>
		<?php }	else if (isset($_GET['acao2']) && $_GET['acao2'] == 'inserir') {?>
			<?php $id = ''?>
			<?php $estado = ''?>
			<?php $sigla = ''?>
			<?php $pais = ''?>
			<?php $pais_id = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Novo Estado'?>
		<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<?php $id = ''?>
			<?php $estado = ''?>
			<?php $sigla = ''?>
			<?php $pais = ''?>
			<?php $pais_id = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Novo Estado'?>
		<?php } ?>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
				<div class="bg-success pt-2text-white d-flex justify-content-center">
					<h5 class="lead">Registro salvo com sucesso!</h5>
				</div>
		<?php } ?>


			<main role="main" style="margin-bottom: 0px;padding: 60px;">
				<div class="card-abrir-chamado">
					<div class="card">
						<div class="card-header">
							<?php echo $titleForm ?>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form method="post" action="../controller/estado_controller.php?acao2=<?php echo $acao2 ?>">
										<div class="row">
											<div class="col-sm-7">
												<div class="form-group">
													<label>Estado</label>
													<input class="form-control" type="hidden" name="id" value="<?= $id?>" id="id" aria-label="id">
													<input class="form-control" type="text" name="estado" value="<?= $estado?>" id="estado" aria-label="Unidade Federativa">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>Sigla</label>
													<input class="form-control" type="text" name="sigla" value="<?= $sigla?>" id="sigla" aria-label="Sigla">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Pais</label>
													<select name="pais_id" class="custom-select" id="pais_id" value="<?= pais_id?>" aria-label="Selecione um país">
												    <option selected="true" id="<?= $pais_id?>" value="<?= $pais_id?>"><?= $pais?></option>
												    <?php foreach($paises as $indice => $pais):  ?>
											    	<option name="" value="<?= $pais->id?>"><?= $pais->pais?></option>
											    	<?php endforeach; ?>
													</select>
												</div>
											</div>
											</div>
											<div class="row mt-5">
												<div class="col-6">
													<a href="todos.estados.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
												</div>
												<div class="col-6">
													<button class="btn btn-lg btn-info btn-block" type="submit"><?= $botao?></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="../js/bootstrap.min.js"></script>
		</body>
</html>
