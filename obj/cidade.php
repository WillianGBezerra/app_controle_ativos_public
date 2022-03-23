<?php
	$viw = 'cidade';
	$acao2 = 'recuperar2';
	require '../controller/estado_controller.php';

	/*echo '<pre>';
	print_r($paises);
	echo '</pre>';*/
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';*/
?>
<?php
	$acao3 = isset($_GET['acao3']) ? $_GET['acao3'] : 'inserir';
	/*echo '<pre>';
	print_r($acao2);
	echo '</pre>';*/
?>
<!DOCTYPE html>
<html>
	<head>
		<?php if (isset($_GET['acao3']) && $_GET['acao3'] == 'atualizar') { ?>
		<?php $title = 'Atualizar Cidade'?>
		<?php }	else if (isset($_GET['acao3']) && $_GET['acao3'] == 'inserir') {?>
		<?php $title = 'Nova Cidade'?>
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

		<?php if (isset($_GET['acao3']) && $_GET['acao3'] == 'atualizar') { ?>
			<?php $id = $_POST['id']?>
			<?php $cidade = $_POST['cidade']?>
			<?php $estado = $_POST['estado']?>
			<?php $estado_id = $_POST['estado_id']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $titleForm = 'Atualizar Cidade'?>

		<?php }	else if (isset($_GET['acao3']) && $_GET['acao3'] == 'inserir') {?>
			<?php $id = ''?>
			<?php $cidade = ''?>
			<?php $estado = ''?>
			<?php $estado_id = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Nova Cidade'?>

			<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
				<?php $id = ''?>
				<?php $cidade = ''?>
				<?php $estado = ''?>
				<?php $estado_id = ''?>
				<?php $botao = 'Salvar'?>
				<?php $botaoV = 'Voltar'?>
				<?php $titleForm = 'Nova Cidade'?>
		<?php } ?>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<div class="bg-success pt-2text-white d-flex justify-content-center">
				<h5 class="lead">Registro salvo com sucesso!</h5>
			</div>
		<?php } ?>
		<main role="main" style="margin-bottom: 0px;padding: 60px;"-->
			<div class="card-abrir-chamado">
				<div class="card">
					<div class="card-header">
						<?php echo $titleForm?>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<form method="post" action="../controller/cidade_controller.php?acao3=<?php echo $acao3 ?>">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Cidade</label>
												<input class="form-control" type="hidden" name="id" value="<?= $id?>" id="id" aria-label="id">
												<input class="form-control" type="text" name="cidade" id="cidade" value="<?= $cidade?>" aria-label="Número do item">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>UF</label>
												<select name="estado_id" class="custom-select" id="estado_id" value="<?= $estado_id?>"aria-label="Selecione um estado">
													<option selected="true" id="<?= $estado_id?>" value="<?= $estado_id?>"><?= $estado?></option>
												     <?php foreach($estados as $indice => $estado):  ?>
												    	<option name="" value="<?= $estado->id?>"><?= $estado->estado?></option>
											    	<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col-6">
												<a href="todas.cidades.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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
		</main>

		<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
