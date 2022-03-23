	<?php
	$pagina = 1;
	//$view = 'retorno'
	$acao9 = isset($_GET['acao9']) ? $_GET['acao9'] : 'inserir';
	
	/*echo '<pre>';
	print_r($acao9 );
	echo '</pre>';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';*/
	?>
	<?php

	$acao6 = 'recuperar2';
	require_once '../controller/empresa_controller.php';
	?>

	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App Remessa -> Devolução</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<style>
			body {
				font-size: 0.65em;
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
		<?php if (isset($_GET['acao9']) && $_GET['acao9'] == 'inserir') { ?>
			<?php $id = $_POST['id']?>
			<?php $remessa_id = $_POST['remessa_id']?>
			<?php $opfiscal_id = $_POST['opfiscal_id']?>
			<?php $opfiscal = $_POST['opfiscal']?>
			<?php $notafiscal = $_POST['notafiscal']?>
			<?php $valor = $_POST['valor']?>
			<?php $emissao = $_POST['emissao']?>
			<?php $entrada = $_POST['entrada']?>
			<?php $ativo_id = $_POST['ativo_id']?>
			<?php $ativo = $_POST['ativo']?>
			<?php $nfretorno = ''?>
			<?php $dataRetorno = ''?>
			<?php $emissaoret = ''?>
			<?php $origem_id = $_POST['origem_id']?>
			<?php $origem = $_POST['origem']?>
			<?php $destino_id = $_POST['destino_id']?>
			<?php $destino = $_POST['destino']?>
			<?php $observacao = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Cancelar'?>
			<?php $href = 'todas.remessas.php?pagina=1'?>
			<?php $titleForm = 'Devolver'?>

		<?php }	else if (isset($_GET['acao9']) && $_GET['acao9'] == 'atualizar') {?>
			<?php $id = $_POST['id']?>
			<?php $remessa_id = $_POST['remessa_id']?>
			<?php $opfiscal_id = $_POST['opfiscal_id']?>
			<?php $opfiscal = $_POST['opfiscal']?>
			<?php $notafiscal = $_POST['notafiscal']?>
			<?php $valor = $_POST['valor']?>
			<?php $emissao = $_POST['emissao']?>
			<?php $entrada = $_POST['entrada']?>
			<?php $ativo_id = $_POST['ativo_id']?>
			<?php $ativo = $_POST['ativo']?>
			<?php $origem_id = $_POST['origem_id']?>
			<?php $origem = $_POST['origem']?>
			<?php $destino_id = $_POST['destino_id']?>
			<?php $destino = $_POST['destino']?>
			<?php $nfretorno = $_POST['nfretorno']?>
			<?php $emissaoret = $_POST['emissaoret']?>
			<?php $dataRetorno = $_POST['dataRetorno']?>
			<?php $observacao = $_POST['observacao']?>
			<?php $botao = 'Atualizar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $href = 'todos.retornos.php?pagina=1'?>
			<?php $titleForm = 'Editar Devolução #'.$id?>

		<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<?php $id = ''?>
			<?php $remessa_id = ''?>
			<?php $opfiscal_id = ''?>
			<?php $opfiscal = ''?>
			<?php $notafiscal = ''?>
			<?php $valor = ''?>
			<?php $entradaret = ''?>
			<?php $emissao = ''?>
			<?php $entrada = ''?>
			<?php $ativo_id = ''?>
			<?php $ativo = ''?>
			<?php $dataRetorno = ''?>
			<?php $origem_id = ''?>
			<?php $origem = ''?>
			<?php $destino_id = ''?>
			<?php $destino = ''?>
			<?php $botao = 'Salvar'?>
			<?php $botaoV = 'Voltar'?>
			<?php $titleForm = 'Devolver'?>
		<?php } ?>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<div class="bg-success pt-2text-white d-flex justify-content-center">
				<h5 class="lead">Registro salvo com sucesso!</h5>
			</div>
		<?php } ?>
		<main role="main" style="margin-bottom: 0px;padding: 20px 50px 0px 50px;"> 

			<div class="card-abrir-chamado" style="border:;">
				<div class="card">
					<div class="card-header">
						<?php echo $titleForm?>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">         
								<form method="post" action="../controller/retorno_controller.php?acao9=<?php echo $acao9 ?>"> 
									<div class="row">		 
										<div class="col-sm-2">
											<div class="form-group">
												<label>NFe</label>
												<input style="font-size: 1em;" class="form-control text-left" type="text" name="nfretorno" id="nfretorno" value="<?=$nfretorno?>" placeholder="NF-e de devolução" required>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Emissão</label>
												<input style="font-size: 1em;" class="form-control text-center" type="date" id="emissaoret" name="emissaoret"  value="<?=$emissaoret?>" placeholder="dd/mm/aaaa" required>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Data Retorno</label>
												<input style="font-size: 1em;" class="form-control text-center" type="date" id="dataRetorno" name="dataRetorno"  value="<?=$dataRetorno?>" placeholder="dd/mm/aaaa" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label>Id</label>
												<input style="font-size: 1em;" class="form-control text-left" type="text" id="remessa_id" name="remessa_id" value="<?= $remessa_id?>" placeholder="R$" disabled>
											</div>
										</div>
										<!--/div-->	
										<!--div class="row"><!--Inicio Origem/destino-->		 
										<div class="col-sm-5">
											<div class="form-group">
												<label>Origem</label>
												<select style="font-size: 1em;" name="origem_id" class="custom-select" id="origem_id" value="<?= $origem_id?>"aria-label="Selecione uma empresa"  required disabled>
													<option selected="true" id="<?= $origem_id?>" value="<?= $origem_id?>"><?= $origem?></option>
													<?php foreach($empresas as $key => $empresa):  ?>
														<option name="" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group">
												<label>Destino</label>
												<select style="font-size: 1em;" name="destino_id" class="custom-select" id="destino_id" value="<?= $destino_id?>"aria-label="Selecione uma empresa" required disabled>
													<option selected="true" id="<?= $destino_id?>" value="<?= $destino_id?>"><?= $destino?></option>
													<?php foreach($empresas as $key => $empresa):  ?>
														<option name="" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div><!-- Final de origem/destino-->
									<div class="row"><!--Inicio div nfe, emissão, valor, entrada, retorno-->
										<div class="col-sm-4">
											<div class="form-group">
												<label>Operação Fiscal</label>
												<input style="font-size: 1em;" class="form-control" type="hidden" name="id" id="id"  value="<?= $id?>" placeholder="" > 
												<input style="font-size: 1em;" class="form-control" type="hidden" name="remessa_id" id="remessa_id"  value="<?= $remessa_id?>" placeholder="" >
												<input style="font-size: 1em;" class="form-control" type="hidden" name="ativo_id" id="ativo_id"  value="<?= $ativo_id?>" placeholder="" >
												<select style="font-size: 1em;" name="opfiscal_id" class="custom-select" id="opfiscal_id" value="<?= $opfiscal_id?>"aria-label="Selecione uma operação"  required disabled>
													<option selected="true" id="<?= $opfiscal_id?>" value="<?= $opfiscal_id?>"><?= $opfiscal ?></option>
													<?php foreach($opfiscais as $key => $opfiscal):  ?>
														<option name="opfiscal_id" id="<?= $opfiscal->prazo?>" value="<?= $opfiscal->id?>"><?= $opfiscal->prazo.'-'.$opfiscal->sigla_op_fiscal ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Nota Fiscal</label>
												<input style="font-size: 1em;" class="form-control" type="text" name="notafiscal" id="notafiscal" value="<?= $notafiscal?>" placeholder="Nota Fiscal" disabled>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Valor</label>
												<input style="font-size: 1em;" class="form-control text-left" type="text" id="valor" name="valor" value="<?= $valor?>" placeholder="R$" disabled>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Emissão</label>
												<input style="font-size: 1em;" class="form-control text-center" type="date" id="emissao" name="emissao"  value="<?= $emissao?>"onchange="calcularRetorno()" placeholder="dd/mm/aaaa" disabled>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>Entrada</label>
												<input style="font-size: 1em;" style="font-size: 1em;"class="form-control text-center" type="date" id="entrada" name="entrada" value="<?= $entrada?>" onblur="calcular()" placeholder="dd/mm/aaaa" disabled>
											</div>
										</div>
										<div class="col-sm-12 mg-auto">
											<div class="form-group">
												<label>Ativo</label>
												<input style="font-size: 1em;" class="form-control text-left" type="text" id="<?= $ativo_id?>" id="ativo_id" value="<?= $ativo?>" placeholder="" disabled>
											</div>
										</div>

									</div><!--Fim div nfe, emissão, valor, entrada, retorno-->

									<div class="row mt-1">
										<div class="col-12">
											<textarea style="font-size: 1.5em;" class="form-control text-left"  name="observacao" value="<?=$observacao?>" placeholder="Observações" required><?=$observacao?></textarea>
										</div>

									</div>

									<div class="row mt-1">
										<div class="col-6">
											<a href="<?=$href?>" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
										</div>
										<div class="col-6">
											<button class="btn btn-lg btn-info btn-block" type="submit" onclick="return enviarform()"><?= $botao?></button>
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
			Date.prototype.addHoras = function(horas){
				this.setHours(this.getHours() + horas)
			};
			Date.prototype.addMinutos = function(minutos){
				this.setMinutes(this.getMinutes() + minutos)
			};
			Date.prototype.addSegundos = function(segundos){
				this.setSeconds(this.getSeconds() + segundos)
			};
			Date.prototype.addDias = function(dias){
				this.setDate(this.getDate() + dias)
			};
			Date.prototype.addMeses = function(meses){
				this.setMonth(this.getMonth() + meses)
			};
			Date.prototype.addAnos = function(anos){
				this.setYear(this.getFullYear() + anos)
			};
			function calcular() {
				var input = document.querySelector("#opfiscal_id").value;
				var texto = input.value;
				var e = new Date(document.getElementById('emissao').value);
				var retorno = new Date();
				var op = document.getElementById('opfiscal_id').text;
				var n1 = document.getElementById('emissao').value;
				var n2 = document.getElementById('entrada').value;
		  //document.getElementById('resultado').innerHTML = n1 + n2;
		  //alert(document.getElementById("opfiscal_id").value);
		  retorno.addDias(180);
		  console.log("op "+op);
		  console.log("n1 "+n1);
		  console.log("n2 "+n2);
		  console.log("e "+e);
		  console.log("retorno "+retorno);
		}
	</script>
	<script>
		function calcularRetorno() {
			var prazo = document.getElementById("opfiscal_id").value;
			var emissao = document.getElementById("emissao").value;
			document.getElementById("retorno").innerHTML = prazo + emissao;
	  //console.log('');
	  //echo '<pre>';
		//print_r(prazo);
		//echo '</pre>';
	}

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