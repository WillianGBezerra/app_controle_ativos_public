<?php
//$view = 'remessa';
//$acao5  = 'recuperar2';
//require_once '../controller/ativo_controller.php';
// $start = isset($_GET['start']) ? $_GET['start'] : 0;
$acao4 = 'recuperar2';
require_once '../controller/opfiscal_controller.php';

$acao6 = 'recuperar2';
require_once '../controller/empresa_controller.php';
?>
<?php
$acao8 = isset($_GET['acao8']) ? $_GET['acao8'] : 'inserir';
$start = isset($_GET['start']) ? $_GET['start'] : 0;
// echo '<pre>';
// print_r($start);
// echo '</pre>';
?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php if (isset($_GET['acao8']) && $_GET['acao8'] == 'atualizar') { ?>
		<?php $title = 'App Remessa -> Remessa -> Editar Remessa'?>
	<?php }	else if (isset($_GET['acao8']) && $_GET['acao8'] == 'inserir') {?>
		<?php $title = 'App Remessa -> Remessa -> Nova Remessa'?>
	<?php } ?> 
	<title><?=$title?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="../js/mascaraMoeda.js"></script>  
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
	<?php if (isset($_GET['acao8']) && $_GET['acao8'] == 'atualizar') { ?>
		<?php $id = $_POST['id']?>
		<?php $opfiscal_id = $_POST['opfiscal_id']?>
		<?php $opfiscal = $_POST['opfiscal']?>
		<?php $notafiscal = $_POST['notafiscal']?>
		<?php $chave_nfe_remessa = $_POST['chave_nfe_remessa']?>
		<?php $valor = $_POST['valor']?>
		<?php $emissao = $_POST['emissao']?>
		<?php $entrada = $_POST['entrada']?>
		<?php $ativo_id = $_POST['ativo_id']?>
		<?php $ativo = $_POST['ativo']?>
		<?php $descricao = $_POST['descricao']?>
		<?php $placa = $_POST['placa']?>
		<?php $eam =  $_POST['eam']?>
		<?php $chassi = $_POST['chassi']?>
		<?php $retorno = $_POST['retorno']?>
		<?php $origem_id = $_POST['origem_id']?>
		<?php $origem = $_POST['origem']?>
		<?php $destino_id = $_POST['destino_id']?>
		<?php $destino = $_POST['destino']?>
		<?php $status_id = $_POST['status_id']?>
		<?php $status = $_POST['status']?>
		<?php $botao = 'Atualizar'?>
		<?php $botaoV = 'Cancelar'?>
		<?php $href = 'todas.remessas.php?acao8=recuperar&pagina=1'?>
		<?php $titleForm = 'Editar Remessa #'.$id?>

	<?php } else if (isset($_GET['acao8']) && $_GET['acao8'] == 'inserir' && $start == 2) {?>
		<?php $id = ''?>
		<?php $opfiscal_id = ''?>
		<?php $opfiscal = ''?>
		<?php $notafiscal = ''?>
		<?php $chave_nfe_remessa = ''?>
		<?php $valor = ''?>
		<?php $emissao = ''?>
		<?php $entrada = ''?>
		<?php $ativo_id = $_POST['id']?>
		<?php $ativo = $_POST['ativo']?>
		<?php $descricao = $_POST['descricao']?>
		<?php $placa = $_POST['placa']?>
		<?php $eam =  $_POST['eam']?>
		<?php $chassi = $_POST['chassi']?>
		<?php $retorno = ''?>
		<?php $origem_id = $_POST['empresa_id']?>
		<?php $origem = $_POST['nome_fantasia']?>
		<?php $destino_id = ''?>
		<?php $destino = ''?>
		<?php $status_id = 1?>
		<?php $status = 'Pendente'?>
		<?php $botao = 'Salvar'?>
		<?php $botaoV = 'Voltar'?>
		<?php $href = 'todos.ativos.php?pagina=1'?>
		<?php $titleForm = 'Nova Remessa'?>

	<?php } else if (isset($_GET['acao8']) && $_GET['acao8'] == 'inserir') {?>
		<?php $id = ''?>
		<?php $opfiscal_id = ''?>
		<?php $opfiscal = ''?>
		<?php $notafiscal = ''?>
		<?php $chave_nfe_remessa = ''?>
		<?php $valor = ''?>
		<?php $emissao = ''?>
		<?php $entrada = ''?>
		<?php $ativo_id = ''?>
		<?php $ativo = ''?>
		<?php $descricao = ''?>
		<?php $placa = ''?>
		<?php $eam =  ''?>
		<?php $chassi = ''?>
		<?php $retorno = ''?>
		<?php $origem_id = ''?>
		<?php $origem = ''?>
		<?php $destino_id = ''?>
		<?php $destino = ''?>
		<?php $status_id = ''?>
		<?php $status = 'Pendente'?>
		<?php $botao = 'Salvar'?>
		<?php $botaoV = 'Voltar'?>
		<?php $href = 'todas.remessas.php?pagina=1'?>
		<?php $titleForm = 'Nova Remessa'?>

	<?php } else if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<?php $id = ''?>
		<?php $opfiscal_id = ''?>
		<?php $opfiscal = ''?>
		<?php $notafiscal = ''?>
		<?php $chave_nfe_remessa = ''?>
		<?php $valor = ''?>
		<?php $emissao = ''?>
		<?php $entrada = ''?>
		<?php $ativo_id = ''?>
		<?php $ativo = ''?>
		<?php $descricao = ''?>
		<?php $placa = ''?>
		<?php $eam =  ''?>
		<?php $chassi = ''?>
		<?php $retorno = ''?>
		<?php $origem_id = ''?>
		<?php $origem = ''?>
		<?php $destino_id = ''?>
		<?php $destino = ''?>
		<?php $status_id = ''?>
		<?php $status = ''?>
		<?php $botao = 'Salvar'?>
		<?php $botaoV = 'Voltar'?>
		<?php $href = 'todas.remessas.php?pagina=1'?>
		<?php $titleForm = 'Nova Remessa'?>

		<?php } if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
		<?php $id = ''?>
		<?php $opfiscal_id = ''?>
		<?php $opfiscal = ''?>
		<?php $notafiscal = ''?>
		<?php $chave_nfe_remessa = ''?>
		<?php $valor = ''?>
		<?php $emissao = ''?>
		<?php $entrada = ''?>
		<?php $ativo_id = ''?>
		<?php $ativo = ''?>
		<?php $descricao = ''?>
		<?php $placa = ''?>
		<?php $eam =  ''?>
		<?php $chassi = ''?>
		<?php $retorno = ''?>
		<?php $origem_id = ''?>
		<?php $origem = ''?>
		<?php $destino_id = ''?>
		<?php $destino = ''?>
		<?php $status_id = ''?>
		<?php $botao = 'Atualizar'?>
		<?php $botaoV = 'Cancelar'?>
		<?php $href = 'todas.remessas.php?acao8=recuperar&pagina=1'?>
		<?php $titleForm = 'Editar Remessa'?>
	<?php } ?>


	<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class="bg-success pt-2text-white d-flex justify-content-center">
			<h5 class="lead">Registro salvo com sucesso!</h5>
		</div>
	<?php } ?>
	<?php if( isset($_GET['error']) && $_GET['error'] == 1) { ?>
		<div class="bg-success pt-2text-white d-flex justify-content-center">
			<h5 class="lead">Erro: Origem e Destino devem ser diferentes!</h5>
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
							<form method="post" action="../controller/remessa_controller.php?acao8=<?php echo $acao8 ?>"> 
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
											<label>Operação Fiscal</label>
											<input class="form-control" type="hidden" name="id" id="id"  value="<?= $id?>" placeholder="" > 
											<select style="font-size: 1em;" name="opfiscal_id" class="custom-select" id="<?= $opfiscal_id?>" value="<?= $opfiscal_id?>"aria-label="Selecione uma operação" required>
												<option selected="true" id="<?= $opfiscal_id?>" value="<?= $opfiscal_id?>"><?= $opfiscal ?></option>
												<?php foreach($opfiscais as $key => $opfiscal):  ?>
													<option name="opfiscal_id" id="<?= $opfiscal->prazo?>" value="<?= $opfiscal->id?>"><?= $opfiscal->prazo.'-'.$opfiscal->sigla_op_fiscal ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<!--/div-->	
									<!--div class="row"><!--Inicio Origem/destino-->		 
									<div class="col-sm-5">
										<div class="form-group">
											<label>Origem</label>
											<select style="font-size: 1em;" name="origem_id" class="custom-select" id="origem_id" value="<?= $origem_id?>"aria-label="Selecione uma empresa" onblur="AlertaIdempresaDuplicado()" placeholder="Empresa de Origem da Remessa" required>
												<option selected="true" id="<?= $origem_id?>" value="<?= $origem_id?>"><?= $origem?></option>
												<?php foreach($empresas as $key => $empresa):  ?>
													<option name="" value="<?= $empresa->id?>"><?= $empresa->cnpj?> - <?= $empresa->nome_fantasia?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
											<label>Destino</label>
											<select style="font-size: 1em;" name="destino_id" class="custom-select" id="destino_id" value="<?= $destino_id?>"aria-label="Selecione uma empresa" onblur="AlertaIdempresaDuplicado()" required>
												<option selected="true" id="<?= $destino_id?>" value="<?= $destino_id?>"><?= $destino?></option>
												<?php foreach($empresas as $key => $empresa):  ?>
													<option name="" value="<?= $empresa->id?>"><?= $empresa->cnpj?> - <?= $empresa->nome_fantasia?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div><!-- Final de origem/destino-->
								<div class="row"><!--Inicio div nfe, emissão, valor, entrada, retorno-->
									<div class="col-sm-2">
										<div class="form-group">
											<label>Nota Fiscal</label>
											<input style="font-size: 1em;" class="form-control" type="text" name="notafiscal" id="notafiscal" value="<?= $notafiscal?>" placeholder="Nota Fiscal" >
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label>Valor</label>
											<input style="font-size: 1em;" class="form-control text-left" type="number" min="1" step="any" id="valor" name="valor" value="<?= $valor?>" placeholder="R$" >
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label>Emissão</label>
											<input style="font-size: 1em;" class="form-control text-center" type="date" id="emissao" name="emissao"  value="<?= $emissao?>"onchange="calcularRetorno()" placeholder="dd/mm/aaaa">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label>Saída</label>
											<input style="font-size: 1em;" class="form-control text-center" type="date" id="entrada" name="entrada" value="<?= $entrada?>" onblur="calcular()" placeholder="dd/mm/aaaa" >
										</div>
									</div>
									<div></div>
									<input style="font-size: 1em;" class="form-control text-center" type="hidden" name="status_id" id="<?= $status_id?>" value="<?= $status_id?>">
									<!-- <div class="col-sm-2">
										<div class="form-group">
											<label>Status</label>
											<select name="status_id" class="custom-select" size="1" id="status_id" value="<?= $status_id?>" disabled aria-label="Selecione um status" style="font-size: 1em;">
												<option selected="true" id="<?= $status_id?>" value="<?= $status_id?>"><?= $status ?></option>
											</select>
										</div>
									</div> -->
									<div class="col-sm-4">
										<div class="form-group">
											<label>Chave</label>
											<input style="font-size: 1em;" class="form-control text-center" type="text" size="44" maxlength="44" minlength="44" id="chave_nfe_remessa" name="chave_nfe_remessa" onblur="AlertaCheckkey()" value="<?=$chave_nfe_remessa?>" placeholder="Chave de acesso" >
										</div>
									</div>
									<div class="col-sm-12 mg-auto">
										<div class="form-group">
											<label>Ativo</label>
											<select style="font-size: 1em;" name="ativo_id" class="custom-select" size="6" id="ativo_id" value="<?= $ativo?>"> aria-label="Selecione um ativo" >
												<option selected="true" id="<?= $ativo_id?>" value="<?= $ativo_id?>"><?= $ativo ?> <?= $descricao ?> <?= $placa ?> <?= $eam ?> <?= $chassi ?></option>
												<?php 
												$acao5 = 'recuperar2';
												require_once '../controller/ativo_controller.php';
												foreach($ativos as $key => $ativo):  ?>
													<option name="" value="<?= $ativo->id?>"><?= $ativo->ativo ?> - <?= $ativo->descricao ?> - <?= $ativo->placa ?> - <?= $ativo->eam ?> - <?= $ativo->chassi ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div><!--Fim div nfe, emissão, valor, entrada, retorno-->

								<div class="row mt-5">
									<div class="col-6">
										<a href="<?= $href ?>" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button"><?= $botaoV?></button></a>
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
			var input = document.querySelector("opfiscal_id").value;
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
	</script>
	<script>
		function AlertaIdempresaDuplicado() {
			var origem = document.getElementById('origem_id').value;
			var destino = document.getElementById('destino_id').value;
			if (origem == destino) {
				alert("Origem e Destino devem ser diferentes!");
				document.getElementById("destino_id").value = "";	
			}
		}
		function AlertaCheckkey() {
			var chave = document.getElementById('chave_nfe_remessa').value;
			if (chave.length < 44 || chave.length > 44) {
				alert("Informar uma chave valida "+chave+"!");
					
			}
		}
		function enviarform() {
			return confirm('Tem certeza que deseja enviar o form?')
		}
	</script>
	<!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
	
</body>
</html>