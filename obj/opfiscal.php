<?php
	$view = 'opfiscal';
	$acao7 = 'recuperar2';
	require '../controller/cfop_controller.php';

	/*echo '<pre>';
	print_r($paises);
	echo '</pre>';*/
	/*echo '<pre>';
	print_r($_POST);*/
?>
	
<?php 
	$acao4 = isset($_GET['acao4']) ? $_GET['acao4'] : 'inserir';
?>

<!DOCTYPE html>
<html>
	<head>
		<?php if (isset($_GET['acao4']) && $_GET['acao4'] == 'atualizar') { ?>
		<?php $title = 'Atualizar Operação Fiscal'?>
		<?php }	else if (isset($_GET['acao4']) && $_GET['acao4'] == 'inserir') {?>
		<?php $title = 'Nova Operação Fiscal'?>
		<?php }	else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {?>
		<?php $title = 'Nova Operação Fiscal'?>
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
		<?php if (isset($_GET['acao4']) && $_GET['acao4'] == 'atualizar') { ?>
		<?php $id = $_POST['id']?>
		<?php $opdescricao = $_POST['opdescricao']?>
		<?php $sigla_op_fiscal = $_POST['sigla_op_fiscal']?>
		<?php $cfop = $_POST['cfop']?>
		<?php $cfop_id = $_POST['cfop_id']?>
		<?php $prazo = $_POST['prazo']?>
		<?php $botao = 'Atualizar'?>
		<?php $botaoV = 'Cancelar'?>
		<?php $titleForm = 'Atualizar Operação Fiscal'?>
	<?php }	else if (isset($_GET['acao4']) && $_GET['acao4'] == 'inserir') {?>
		<?php $id = ''?>
		<?php $opdescricao = ''?>
		<?php $sigla_op_fiscal = ''?>
		<?php $cfop = ''?>
		<?php $cfop_id = ''?>
		<?php $prazo = ''?>
		<?php $botao = 'Salvar'?>
		<?php $botaoV = 'Voltar'?>
		<?php $titleForm = 'Nova Operação Fiscal'?>
	<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<?php $id = ''?>
		<?php $opdescricao = ''?>
		<?php $sigla_op_fiscal = ''?>
		<?php $cfop = ''?>
		<?php $cfop_id = ''?>
		<?php $prazo = ''?>
		<?php $botao = 'Salvar'?>
		<?php $botaoV = 'Voltar'?>
		<?php $titleForm = 'Nova Operação Fiscal'?>
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
									
									<form method="post" action="../controller/opfiscal_controller.php?acao4=<?php echo $acao4 ?>"> 
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Código</label>
													<input class="form-control" type="hidden" name="id" id="id" value="<?= $id?>" aria-label="Código da operação fiscal">
													<input class="form-control" type="text" name="sigla_op_fiscal" id="sigla_op_fiscal" value="<?= $sigla_op_fiscal?>" aria-label="Código da operação fiscal">
												</div>
											</div>
											<div class="col-sm-10">
												<div class="form-group">
													<label>Descrição</label>
													<input class="form-control" type="text" name="opdescricao" id="opdescricao" value="<?= $opdescricao?>" aria-label="Descrição da operação">
												</div>
											</div>                  
										</div>
										<div class="row">
											<div class="col-sm-10">
												<div class="form-group">
													<label>CFOP</label>
													<select name="cfop_id" class="custom-select" id="cfop_id" value="<?= $cfop_id?>" aria-label="Selecione um CFOP">
													    <option selected="true" id="<?= $cfop_id?>" value="<?= $cfop_id?>"><?= $cfop?></option>
													    <?php foreach($cfops as $indice => $cfop):  ?>
												    	<option name="" value="<?= $cfop->id?>"><?= $cfop->cfop?></option>
												    	<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>Prazo</label>
													<input class="form-control" type="text" name="prazo" id="prazo" value="<?= $prazo?>" aria-label="Prazo em dias">
												</div>
											</div>                  
										</div>
										<div class="row mt-5">
											<div class="col-6">
												<a href="todas.opfiscais.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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