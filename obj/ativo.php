	<?php
		//$view = 'ativo';
	$acao6 = 'recuperar2';
	require '../controller/empresa_controller.php';

		/*echo '<pre>';
		print_r($empresa);
		echo '</pre>';*/
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';*/
		?>
		<?php
		$acao5 = isset($_GET['acao5']) ? $_GET['acao5'] : 'inserir';
		/*echo '<pre>';
		print_r($acao5);
		echo '</pre>';*/
		?>
		<DOCTYPE html>
			<html>
			<head>
				<?php if (isset($_GET['acao5']) && $_GET['acao5'] == 'atualizar') { ?>
					<?php $title = 'App Remessa -> Ativos -> Editar Ativo'?>
				<?php }	else if (isset($_GET['acao5']) && $_GET['acao5'] == 'inserir') {?>
					<?php $title = 'App Remessa -> Ativos -> Novo Ativo'?>
				<?php } ?> 
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title><?=$title?></title>

				<!-- Bootstrap core CSS -->
				<link rel="stylesheet" href="../css/bootstrap.min.css">

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
			</head>
			<body>
				<?php
				require_once '../menu_rodape/menu.php'
				?>
				<?php if (isset($_GET['acao5']) && $_GET['acao5'] == 'atualizar') { ?>
					<?php $id = $_POST['id']?>
					<?php $ativo = $_POST['ativo']?>
					<?php $descricao = $_POST['descricao']?>
					<?php $eam = $_POST['eam']?>
					<?php $placa = $_POST['placa']?>
					<?php $chassi = $_POST['chassi']?>
					<?php $nome_fantasia = $_POST['nome_fantasia']?>
					<?php $empresa_id = $_POST['empresa_id']?>
					<?php $bloqueio = $_POST['bloqueio']?>
					<?php $botao = 'Atualizar'?>
					<?php $botaoV = 'Cancelar'?>
					<?php $titleForm = 'Editar Ativo'?>

				<?php }	else if (isset($_GET['acao5']) && $_GET['acao5'] == 'inserir') {?>
					<?php $id = ''?>
					<?php $ativo = ''?>
					<?php $descricao = ''?>
					<?php $eam = ''?>
					<?php $placa = ''?>
					<?php $chassi = ''?>
					<?php $nome_fantasia = ''?>
					<?php $bloqueio = 1?>
					<?php $empresa_id = ''?>
					<?php $botao = 'Salvar'?>
					<?php $botaoV = 'Voltar'?>
					<?php $titleForm = 'Novo Ativo'?>

				<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
					<?php $id = ''?>
					<?php $ativo = ''?>
					<?php $descricao = ''?>
					<?php $eam = ''?>
					<?php $placa = ''?>
					<?php $chassi = ''?>
					<?php $nome_fantasia = ''?>
					<?php $bloqueio = 1?>
					<?php $empresa_id = ''?>
					<?php $botao = 'Salvar'?>
					<?php $botaoV = 'Voltar'?>
					<?php $titleForm = 'Novo Ativo'?>
				<?php } ?>

				<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
					<div class="bg-success pt-2text-white d-flex justify-content-center">
						<h5 class="lead">Registro salvo com sucesso!</h5>
					</div>
				<?php } ?>
				<main role="main" style="margin-bottom: 0px;padding: 20px 50px 0px 50px;">
					<div class="card-abrir-chamado">
						<div class="card">
							<div class="card-header">
								<?php echo $titleForm?>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col"> 
										<form method="post" action="../controller/ativo_controller.php?acao5=<?php echo $acao5 ?>"> 
											<div class="row">
												<div class="col-sm-2">
													<div class="form-group">
														<label>Ativo</label>
														<input style="font-size: 1em;" class="form-control" type="hidden" name="id" id="id" value="<?= $id?>" aria-label="Número do item">
														<input style="font-size: 1em;" class="form-control" type="hidden" name="bloqueio" id="bloqueio" value="<?= $bloqueio?>" aria-label="">
														<input class="form-control" type="text" name="ativo" id="ativo" value="<?= $ativo?>" aria-label="Número do item" required>
													</div>
												</div>
												<div class="col-sm-10">
													<div class="form-group">
														<label>Descrição</label>
														<input style="font-size: 1em;" class="form-control" type="text" name="descricao" id="descricao" value="<?= $descricao?>" aria-label="Informe a descrição do ativo" required>	
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<label>EAM</label>
														<input style="font-size: 1em;" class="form-control" type="text" name="eam" id="eam" value="<?= $eam?>" aria-label="Informe o número do EAM" required>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<label>Chassi</label>
														<input style="font-size: 1em;" class="form-control text-center" type="text" id="chassi" value="<?= $chassi?>" name="chassi" aria-label="Informe o número do chassi" required>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group">
														<label>Placa</label>
														<input style="font-size: 1em;" class="form-control text-center" type="text" id="placa" value="<?= $placa?>" name="placa" aria-label="Informe a placa" required>
													</div>
												</div>	  
												<div class="col-sm-6">
												<!--div class="form-group">
													<label>Proprietário</label>
													<label name="ativo_proprietario"></label>
													<input class="form-control text-center" type="text" id="empresa" name="ativo_proprietario" placeholder="">
												</div-->
												<div class="form-group">
													<label>Proprietário</label>
													<select style="font-size: 1em;" name="empresa_id" class="custom-select" id="empresa_id" value="<?= $empresa_id?>"aria-label="Selecione uma empresa"  required>
														<option selected="true" id="<?= $empresa_id?>" value="<?= $empresa_id?>"><?= $nome_fantasia ?></option>
														<?php foreach($empresas as $key => $empresa):  ?>
															<option name="" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<!--div class="col-sm-3">
												<div class="form-group">
													<label>CNPJ</label>
													<div class="input-group mb-5">
														<input type="text" class="form-control" placeholder="" aria-label="">
														<div class="input-group-append">
															<button class="btn btn-primary" type="button">Pesquisar</button>
														</div>
													</div>
												</div>
											</div-->
										</div>
										<div class="row mt-5">
											<div class="col-6">
												<a href="todos.ativos.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
											</div>
											<div class="col-6">
												<button class="btn btn-lg btn-info btn-block" type="submit" onclick="return enviarform()"> <?= $botao?></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<script>
				function enviarform() {
					return confirm('Tem certeza que deseja enviar o form?')
				}
			</script>	

			<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="../js/bootstrap.min.js"></script>
		</body>
		</html>