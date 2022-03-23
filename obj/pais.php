<?php
	$view = 'pais'; 
	$acao = isset($_GET['acao']) ? $_GET['acao'] : 'inserir';
	/*echo '<pre>';
	print_r($acao);
	echo '</pre>';*/	
?>
	
<!DOCTYPE html>
<html>
<head>
	<?php if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') { ?>
		<?php $title = 'Atualizar País'?>
		<?php }	else if (isset($_GET['acao']) && $_GET['acao'] == 'inserir') {?>
		<?php $title = 'Novo País'?>
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
			<?php if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') { ?>
			<?php $id = $_POST['id']?>
			<?php $pais = $_POST['pais']?>
			<?php $sigla = $_POST['sigla']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $titleForm = 'Atualizar Registro'?>
			<script>
				document.getElementById('pais_nome').nodeValue = '<?= $_POST['pais_nome']?>'
			</script>
		<?php }	else if (isset($_GET['acao']) && $_GET['acao'] == 'inserir') {?>
			<?php $id = ''?>
			<?php $pais = ''?>
			<?php $sigla = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Novo Registro'?>

		<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<?php $id = ''?>
			<?php $pais = ''?>
			<?php $sigla = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Novo Registro'?>
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
									<form method="post" action="../controller/pais_controller.php?acao=<?php echo $acao ?>"> 
										<div class="row">
											<div class="col-sm-10">
												<div class="form-group">
													<label>País</label>
													<input class="form-control" type="hidden" name="id" id="id" value="<?= $id?>" aria-label="Unidade Federativa">
													<input class="form-control" type="text" name="pais" id="pais" value="<?= $pais?>" aria-label="Unidade Federativa">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>Sigla</label>
													<input class="form-control" type="text" name="sigla" id="sigla" value="<?= $sigla?>" aria-label="Unidade Federativa">
												</div>
											</div>                 
										</div>
										<div class="row mt-5">
											<div class="col-6">
												<a href="todos.paises.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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