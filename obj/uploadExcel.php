<?php
	/*echo '<pre>';
	print_r($_GET['acaoImp']);
	echo '</pre';*/
	$acaoImp = $_GET['acaoImp'];
	if ($acaoImp == 1) {
		$action = '../controller/remessa_controller.php?acao8=uploadExcel';
		$title = 'Remessa';
		$href = 'todas.remessas.php?pagina=1';
	} else if ($acaoImp == 2) {
		$action = '../controller/ativo_controller.php?acao5=uploadExcel';
		$title = 'Ativo';
		$href = 'todos.ativos.php?pagina=1';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Excel <?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<!--h5>Upload Excel Remessa</h15>

	<form method="POST" action="../controller/remessa_controller.php?acao8=uploadExcelRemessa" enctype="multipart/form-data">
		<label>Arquivo</label>
		<input type="file" name="arquivo"><br><br>
		<input type="submit" value="Enviar" name="">
	</form-->

	<main role="main" style="margin-bottom: 0px;padding: 60px;">

				<div class="card-abrir-chamado">
					<div class="card">
						<div class="card-header">
							Importar Excel <?=$title?>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form method="post" action="<?=$action?>" enctype="multipart/form-data"> 
										<div class="row">
											<div class="col-sm-10">
												<div class="form-group">
													<label>Arquivo</label>
													<input class="form-control" type="file" name="arquivo" aria-label="Unidade Federativa">
												</div>
											</div>
											                
										</div>
										<div class="row mt-5">
											<div class="col-6">
												<a href="<?=$href?>" target="_parent"><button class="btn btn-lg btn-warning btn-block" type="button">Cancelar</button></a>
											</div>
											<div class="col-6">
												<button class="btn btn-lg btn-info btn-block" type="submit">Salvar</button>
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
</body>
</html>