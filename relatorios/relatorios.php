<?php
$acao6 = 'recuperar2';
require '../controller/empresa_controller.php';

$acao8 = 'recuperar';
require "../controller/status_controller.php";

$T = isset($_GET['tipoM']) ? $_GET['tipoM'] : 1; 

/*echo '<pre>';
print_r($T);
echo '</pre>';

echo '<pre>';
print_r($_POST);
echo '</pre>';*/
?>
<?
$acao5  = 'recuperar2';
require '../controller/ativo_controller.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>App Remessa - Relatórios</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<style>


		.pequeno {
		width: 4em;
		height: 2.6em;
		transform:translate(-50%, 91%)
		}
		.medio {
		width: 20%;
		}
		</style>
	</head>
	<body>
		<?php
		require_once 'menu_relatorios.php'
		?>
		<!--h5>Upload Excel Remessa</h15>

		<form method="POST" action="../controller/remessa_controller.php?acao8=uploadExcelRemessa" enctype="multipart/form-data">
		<label>Arquivo</label>
		<input type="file" name="arquivo"><br><br>
		<input type="submit" value="Enviar" name="">
		</form-->

		<main role="main" style="margin-bottom: 0px;padding: 1em 5em 1em 5em;">

		<div class="card-abrir-chamado">
			<div class="card">
				<div class="card-header">PDF</div>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<form method="post" action="relatorio-remessas.php" enctype="multipart/form-data"> 
								<div class="row" style="border:">
									<div class="col-sm-2">
										<div class="form-group">
											<label>Tipo de Movimento</label>
											<select name="tipoMov" class="custom-select" id="tipoMov" value=""aria-label="Selecione um tipo de movimento" onChange="update()" required>
												<option selected="true" id="tipoMov" value="0">Todos</option>
												<option name="tipoMov" id="tipoMov" value="1">Entrada</option>
												<option name="tipoMov" id="tipoMov" value="2">Saída</option>
											</select>
										</div>
									</div>
									<div class="col-sm-7">
										<div class="form-group">
											<label>Empresa</label>
											<select name="empresa_id" class="custom-select" id="empresa_id" value=""aria-label="Selecione uma empresa" onChange="update()" required>
												<option selected="true" id="empresa_id" value="0">Todas</option>
												<?php foreach($empresas as $key => $empresa):  ?>
												<option name="empresa_id" id="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
												<?php endforeach; ?>
											</select>
											<input type="hidden" id="empresa1" name="empresa" value="">
											<input type="hidden" id="empresa" name="empresa" value="">
										</div>
									</div>
									<div class="col-sm-2">
									<div class="form-group">
										<label>Status</label>											
										<select name="status_id" class="custom-select" id="status_id" value=""aria-label="Selecione Status"  required>
											<option selected="true" id="status_id" value="0">Todos</option>
											<?php foreach($t as $key => $status):  ?>
											<option name="status_id" value="<?= $status->id?>"><?= $status->status ?></option>
											<?php endforeach; ?>
										</select>
										</div>
									</div> 
									<div class="col-sm-1">
										<div class="form-group">
										<button class="btn btn-sm btn-info btn-block pequeno" type="submit">Gerar</button>
										</div>
									</div>         
								</div>
									<!--div class="row mt-5">
									<div class="col-6">
									<a href="../obj/todas.remessas.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button">Cancelar</button></a>
									</di>
									<div class="col-12	">
									<button class="btn btn-lg btn-info btn-block" type="submit">Gerar</button>
									</div>
									</div-->
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>	
		<div class="card">
			<div class="card-header">Browser</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<form method="post" action="arquivos/gerar-excel.php?search=filter" enctype="multipart/form-data"> 
			<div class="row" style="border:">
				<div class="col-sm-2">
					<div class="form-group">
						<label>Tipo de Movimento</label>
						<select name="tipoMov" class="custom-select" id="tipoMov" value=""aria-label="Selecione um tipo de movimento" onChange="update()" required>
							<option selected="true" id=">" value=""></option>
							<option name="tipoMov" id="tipoMov" value="1">Entrada</option>
							<option name="tipoMov" id="tipoMov" value="2">Saída</option>
						</select>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="form-group">
						<label>Empresa</label>
						<select name="empresa_id" class="custom-select" id="empresa_id" value=""aria-label="Selecione uma empresa" onChange="update()" required>
							<option selected="true" id=">" value=""></option>
							<?php foreach($empresas as $key => $empresa):  ?>
							<option name="empresa_id" id="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
							<?php endforeach; ?>
						</select>
						<input type="hidden" id="empresa1" name="empresa" value="">
						<input type="hidden" id="empresa" name="empresa" value="">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<label>Status</label>											
						<select name="status_id" class="custom-select" id="status_id" value=""aria-label="Selecione Status" required>
							<option selected="true" id="" value="" required></option>
							<?php foreach($t as $key => $status):  ?>
							<option name="status_id" value="<?= $status->id?>"><?= $status->status ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div> 
				<div class="col-sm-1">
					<div class="form-group">
						<button class="btn btn-sm btn-info btn-block pequeno" type="submit">Gerar</button>
					</div>
				</div>         
			</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<form method="post" action="arquivos/remessa.csv.php?search=all" enctype="multipart/form-data"> 
							<div class="row" style="border:">
								<div class="col-sm-2">
									<div class="form-group">
										<label>Tipo de Movimento</label>
										<select name="tipoMov" class="custom-select" id="tipoMov" value=""aria-label="Selecione um tipo de movimento" onChange="update()" required disabled>
											<option selected="true" id=">" value="0">Todos</option>
											<option name="tipoMov" id="tipoMov" value="1">Entrada</option>
											<option name="tipoMov" id="tipoMov" value="2">Saída</option>
										</select>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group">
										<label>Empresa</label>
										<select name="empresa_id" class="custom-select" id="empresa_id" value=""aria-label="Selecione uma empresa" onChange="update()" required disabled>
											<option selected="true" id=">" value="0">Todas</option>
											<?php foreach($empresas as $key => $empresa):  ?>
											<option name="empresa_id" id="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
											<?php endforeach; ?>
										</select>
										<input type="hidden" id="empresa1" name="empresa" value="">
										<input type="hidden" id="empresa" name="empresa" value="">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label>Status</label>											
										<select name="status_id" class="custom-select" id="status_id" value=""aria-label="Selecione Status"  required disabled>
											<option selected="true" id="" value="0">Todos</option>
											<?php foreach($t as $key => $status):  ?>
											<option name="status_id" value="<?= $status->id?>"><?= $status->status ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div> 
								<div class="col-sm-1">
									<div class="form-group">
										<button class="btn btn-sm btn-info btn-block pequeno" type="submit">Gerar</button>
									</div>
								</div>         
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<!--div class="card-abrir-chamado">
		<div class="card">
		<div class="card-header">
		Filtros Tabela Remessas
		</div>
		<div class="card-body">
		<div class="row">
		<div class="col">
		<form method="post" action="../controller/remessa_controller.php?acao8=recuperarPorMovEeStatus" enctype="multipart/form-data"> 
		<div class="row" style="border:">
		<div class="col-sm-2">
		<div class="form-group">
		<label>Tipo de Movimento</label>
		<select name="tipoMov" class="custom-select" id="tipoMov" value="" aria-label="Selecione um tipo de movimento" onChange="update()" required>
		<option name="tipoMov" id="tipoMov" value="<?= $tipoMov?>"></option>
		<option selected="true" id=">" value=""></option>
		<option name="tipoMov" id="tipoMov" value="1">Entrada</option>
		<option name="tipoMov" id="tipoMov" value="2">Saída</option>
		<input type="hidden" id="tipo1" name="tipo1" value="">
		<input type="hidden" id="tipo2" name="tipo2" value="">
		</select>
		</div>
		</div>
		<div class="col-sm-7">
		<div class="form-group">
		<label>Empresa</label>
		<select name="empresa_id" class="custom-select" id="empresa_id" value=""aria-label="Selecione uma empresa" onChange="update()" required>
		<option selected="true" id="empresa_id" value="<?= $empresa_id?>"></option>
		<?php foreach($empresas as $key => $empresa):  ?>
		<option name="empresa_id" id="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
		<?php endforeach; ?>
		</select>
		<input type="hidden" id="empresa1" name="empresa" value="">
		<input type="hidden" id="empresa" name="empresa" value="">
		</div>
		</div>
		<div class="col-sm-2">
		<div class="form-group">
		<label>Status</label>											
		<select name="status_id" class="custom-select" id="status_id" value=""aria-label="Selecione Status"  required>
		<option selected="true" id="" value="0"></option>
		<?php foreach($t as $key => $status):  ?>
		<option name="status_id" value="<?= $status->id?>"><?= $status->status ?></option>
		<?php endforeach; ?>
		</select>
		</div>
		</div> 
		<div class="col-sm-1">
		<div class="form-group">
		<button class="btn btn-sm btn-info btn-block pequeno" type="submit">Gerar</button>
		</div>
		</div>         
		</div>
		<div class="row mt-5">
		<!--div class="col-6">
		<a href="../obj/todas.remessas.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button">Cancelar</button></a>
		</di>
		<div class="col-12	">
		<button class="btn btn-lg btn-info btn-block" type="submit">Gerar</button>
		</div>
		</div>
		</form>
		<!--br>
		<form method="post" action="relatorio-remessas.php" enctype="multipart/form-data"> 
		<div class="row" style="border:">
		<div class="col-sm-2">
		<div class="form-group">
		<label>Tipo de Movimento</label>
		<select name="tipoMov" class="custom-select" id="tipoMov" value="" aria-label="Selecione um tipo de movimento" onChange="update()" required>
		<option name="tipoMov" id="tipoMov" value="<?= $tipoMov?>"></option>
		<option selected="true" id=">" value=""></option>
		<option name="tipoMov" id="tipoMov" value="1">Entrada</option>
		<option name="tipoMov" id="tipoMov" value="2">Saída</option>
		</select>
		</div>
		</div>
		<div class="col-sm-7">
		<div class="form-group">
		<label>Empresa</label>
		<select name="empresa_id" class="custom-select" id="empresa_id" value=""aria-label="Selecione uma empresa" onChange="update()" required>
		<option selected="true" id="empresa_id" value="<?= $empresa_id?>"></option>
		<?php foreach($empresas as $key => $empresa):  ?>
		<option name="empresa_id" id="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
		<?php endforeach; ?>
		</select>
		<input type="hidden" id="empresa1" name="empresa" value="">
		<input type="hidden" id="empresa" name="empresa" value="">
		</div>
		</div>
		<div class="col-sm-2">
		<div class="form-group">
		<label>Status</label>											
		<select name="status_id" class="custom-select" id="status_id" value=""aria-label="Selecione Status"  required>
		<option selected="true" id="" value="0"></option>
		<?php foreach($t as $key => $status):  ?>
		<option name="status_id" value="<?= $status->id?>"><?= $status->status ?></option>
		<?php endforeach; ?>
		</select>
		</div>
		</div> 
		<div class="col-sm-1">
		<div class="form-group">
		<button class="btn btn-sm btn-info btn-block pequeno" type="submit">Gerar</button>
		</div>
		</div>         
		</div>
		<div class="row mt-5">
		<div class="col-6">
		<a href="../obj/todas.remessas.php?pagina=1" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button">Cancelar</button></a>
		</di>
		<div class="col-12	">
		<button class="btn btn-lg btn-info btn-block" type="submit">Gerar</button>
		</div>
		</div>
		</form>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div-->
		</main>
		<script type="text/javascript">
			function update() {
			var select = document.getElementById('empresa_id');
			var option = select.options[select.selectedIndex];

			document.getElementById('empresa1').value = option.value;
			document.getElementById('empresa').value = option.text;

			var select = document.getElementById('tipoMov');
			var option = select.options[select.selectedIndex];

			document.getElementById('tipo1').value = "recuperarPorMovEeStatus";
			document.getElementById('tipo2').value = "recuperarPorMovSeStatus";
			}

			update();
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>