<?php
	$view = 'status' 
	$acao8 = isset($_GET['acao8']) ? $_GET['acao8'] : 'inserir';
	/*echo '<pre>';
	print_r($acao8);
	print_r($_POST);
	echo '</pre>';*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Novo CFOP</title>

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

			<?php if (isset($_GET['acao8']) && $_GET['acao8'] == 'atualizar') { ?>
			<?php $id = $_POST['id']?>
			<?php $status = $_POST['status']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $titleForm = 'Atualizar Status'?>

			<?php }	else if (isset($_GET['acao8']) && $_GET['acao8'] == 'inserir') {?>
				<?php $id = ''?>
				<?php $status = ''?>
				<?php $botao = 'Salvar'?>
				<?php $botaoV = 'Voltar'?>
				<?php $titleForm = 'Novo Status'?>

			<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
				<?php $id = ''?>
				<?php $status = ''?>
				<?php $botao = 'Salvar'?>
				<?php $botaoV = 'Voltar'?>
				<?php $titleForm = 'Novo Status'?>
			<?php } ?>
			
			<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
				<div class="bg-success pt-2text-white d-flex justify-content-center">
					<h5 class="lead">Registro salvo com sucesso!</h5>
				</div>
			<?php } ?>
			
			<main role="main" style="margin-bottom: 0px;padding: 60px;">
				<div class="card-abrir-chamado">
					<div class="card">
						<div class="card-header"><?= $titleForm ?></div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form method="post" action="../controller/status_controller.php?acao8=<?php echo $acao8 ?>"> 
										<div class="row">
											<!--div class="col-sm-2">
												<div class="form-group">
													<label>Código</label>
													<input class="form-control" type="text" name="cfop" aria-label="Código CFOP">
												</div>
											</div-->
											<div class="col-sm-12">
												<div class="form-group">
													<label>Descrção</label>
													<input class="form-control" type="hidden" name="id" value="<?= $id?>" id="id" aria-label="id">
													<input class="form-control" type="text" name="status" id="status" value="<?= $status ?>" aria-label="Status">
												</div>
											</div>                 
										</div>
										<div class="row mt-5">
											<div class="col-6">
												<a href="todos.status.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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