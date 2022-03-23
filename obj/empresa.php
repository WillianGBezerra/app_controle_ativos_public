<?php
	$view = 'empresa';
	$acao3 = 'recuperar2';
	require "../controller/cidade_controller.php";
?>
<?php
	$acao6 = isset($_GET['acao6']) ? $_GET['acao6'] : 'inserir';
	/*echo '<pre>';
	print_r($acao6);
	echo '</pre>';
	echo '<pre>';
	print_r($_GET['id']);
	echo '</pre>';*/
?>
<!DOCTYPE html>
<html>
<head>
	<?php if (isset($_GET['acao6']) && $_GET['acao6'] == 'atualizar') { ?>
		<?php $title = 'Atualizar Empresa'?>
		<?php }	else if (isset($_GET['acao6']) && $_GET['acao6'] == 'inserir') {?>
			<?php $title = 'Nova Empresa'?>
		<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {?>
			<?php $title = 'Nova Empresa'?>
		<?php }?>
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
	<?php require_once '../menu_rodape/menu.php'?>
	<?php if (isset($_GET['acao6']) && $_GET['acao6'] == 'atualizar') { ?>
			<?php $id = $_POST['id']?>
			<?php $razao_social = $_POST['razao_social']?>
			<?php $nome_fantasia = $_POST['nome_fantasia']?>
			<?php $ie = $_POST['ie']?>
			<?php $cnpj = $_POST['cnpj']?>
			<?php $endereco = $_POST['endereco']?>
			<?php $cidade = $_POST['cidade']?>
			<?php $cep = $_POST['cep']?>
			<?php $cidade_id = $_POST['cidade_id']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $titleForm = 'Atualizar País'?>
		<?php }	else if (isset($_GET['acao6']) && $_GET['acao6'] == 'inserir') {?>
			<?php $id = ''?>
			<?php $razao_social = ''?>
			<?php $nome_fantasia = ''?>
			<?php $ie = ''?>
			<?php $cnpj = ''?>
			<?php $endereco = ''?>
			<?php $cidade = ''?>
			<?php $cep = ''?>
			<?php $cidade_id = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Novo País'?>

		<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<?php $id = ''?>
			<?php $razao_social = ''?>
			<?php $nome_fantasia = ''?>
			<?php $ie = ''?>
			<?php $cnpj = ''?>
			<?php $endereco = ''?>
			<?php $cidade = ''?>
			<?php $cep = ''?>
			<?php $cidade_id = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Nova Empresa'?>
		<?php } ?>
			
		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<div class="bg-success pt-2text-white d-flex justify-content-center">
				<h5 class="lead">Registro salvo com sucesso!</h5>
			</div>
		<?php } ?>
	<main role="main" style="margin-bottom: 0px;padding: 40px 90px 0px 90px;">
		<div class="card-abrir-chamado">
			<div class="card">
				<div class="card-header">
					<?=$titleForm?>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<form method="post" action="../controller/empresa_controller.php?acao6=<?php echo $acao6 ?>">
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<label>Razão Social</label>
											<input class="form-control" type="hidden" name="id" value="<?= $id?>" id="id" aria-label="id">
											<input class="form-control" type="text" name="razao_social" id="razao_social" value="<?= $razao_social?>" aria-label="Informe a descrição do ativo">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Nome Fantasia</label>
											<input class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" value="<?= $nome_fantasia?>" aria-label="Informe a descrição do ativo">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label>CNPJ</label>
											<input class="form-control" type="text" name="cnpj" id="cnpj" value="<?= $cnpj?>" aria-label="Número do item">
										</div>
									</div>
									<div class="col-sm-1">
										<div class="form-group">
											<label>I.E.</label>
											<input class="form-control" type="text" name="ie" id="ie" value="<?= $ie?>" aria-label="Número do item">
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
											<label>Cidade</label>
											<select class="custom-select" id="cidade_id" name="cidade_id" aria-label="Exemplo de select com botão addon">
												<option selected="true" name="cidade_id" value="<?= $cidade_id ?>" selected><?= $cidade ?></option>
												<?php
												foreach($cidades as $key => $cidade): ?>
												<option value="<?= $cidade->id ?>"><?= $cidade->cidade ?> - <?= $cidade->estado ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
											<label>Endereço</label>
											<input class="form-control" type="text" name="endereco" id="endereco" value="<?= $endereco?>" aria-label="Informe o endereço completo">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label>CEP</label>
											<div class="input-group mb-5">
												<input class="form-control" type="text" name="cep" id="cep" value="<?= $cep?>" aria-label="Informe o cep">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
							</div>
							<div class="row mt-5">
								<div class="col-6">
									<a href="todas.empresas.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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
