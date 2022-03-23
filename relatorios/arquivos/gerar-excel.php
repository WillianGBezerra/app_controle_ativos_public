<?php 
	require "../../../../app_controle_ativos/remessa/remessa.model.php";
	require "../../../../app_controle_ativos/remessa/remessa.service.php";
	require_once "../../../../app_controle_ativos/conexao.php";

	$tipomov = isset($_POST['tipoMov']) ? $_POST['tipoMov'] : 0;
	$empresa_id = isset($_POST['empresa_id']) ? $_POST['empresa_id'] :0; 
	$empresa = isset($_POST['empresa']) ? $_POST['empresa'] :0;
	$status_id = isset($_POST['status_id']) ? $_POST['status_id'] :0;
	
	/*echo '<pre>';
	print_r($_POST); 
	echo '</pre>';*/

	$opfiscal_id = new Remessa();
	$notafiscal = new Remessa();
	$valor = new Remessa();
	$emissao = new Remessa();
	$entrada = new Remessa();
	$ativo_id = new Remessa();
	$retorno = new Remessa();
	$origem_id = new Remessa();
	$destino_id = new Remessa();
	$status_id = new Remessa();
	$conexao = new Conexao();
	$remessaService = new RemessaService($conexao, $opfiscal_id, $notafiscal, $valor, $emissao, $entrada, $ativo_id, $retorno, $origem_id, $destino_id, $status_id);
	$remessasE = $remessaService->reportpdfEntrada($_POST['empresa_id'], $_POST['status_id']);

	$opfiscal_id = new Remessa();
	$notafiscal = new Remessa();
	$valor = new Remessa();
	$emissao = new Remessa();
	$entrada = new Remessa();
	$ativo_id = new Remessa();
	$retorno = new Remessa();
	$origem_id = new Remessa();
	$destino_id = new Remessa();
	$status_id = new Remessa();
	$conexao = new Conexao();
	$remessaService = new RemessaService($conexao, $opfiscal_id, $notafiscal, $valor, $emissao, $entrada, $ativo_id, $retorno, $origem_id, $destino_id, $status_id);
	$remessasS = $remessaService->reportpdfSaida($_POST['empresa_id'], $_POST['status_id']);

	$remessasCsv = $remessaService->reportcsv();

	$total_registrosPdfS = $remessaService->recuperartotalPdfS($_POST['empresa_id'], $_POST['status_id']);
	$total_registrosPdfE = $remessaService->recuperartotalPdfE($_POST['empresa_id'], $_POST['status_id']);

	//gerar arquivo csv
	$fp = fopen("remessa.csv", "a"); // o "a" indica que o arquivo será sobrescrito sempre que esta função for executada.
	//$writer = fwrite($fp,"id;Operação Fiscal;Origem;Destino;Ativo;Descrição;Placa;Chassi;NFe;Valor;Emissão;Entrada;Prazo;status");
	
	if ($search = 'filter' && $tipomov == 1) {
		echo '<pre>';
		print_r("id;Operação Fiscal;Origem;Destino;Ativo;Descrição;Placa;Chassi;NFe;Valor;Emissão;Entrada;Prazo;status");
		echo '</pre>';
		foreach ($remessasS as $remessa) {
			//$writer = fwrite($fp, "\n$remessa->id;$remessa->opdescricao;$remessa->origem;$remessa->destino;$remessa->ativo; $remessa->descricao; $remessa->placa; $remessa->chassi;$remessa->notafiscal;"."R$".number_format($remessa->valor, 2,',','.').";".date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))).";$remessa->status");
			echo '<pre>';
			print_r("\n$remessa->id;$remessa->opdescricao;$remessa->origem;$remessa->destino;$remessa->ativo; $remessa->descricao; $remessa->placa; $remessa->chassi;$remessa->notafiscal;"."R$".number_format($remessa->valor, 2,',','.').";".date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))).";$remessa->status");
			echo '</pre>';
		}
	} else if ($search = 'filter' && $tipomov == 2) {
		echo '<pre>';
		print_r("id;Operação Fiscal;Origem;Destino;Ativo;Descrição;Placa;Chassi;NFe;Valor;Emissão;Entrada;Prazo;status");
		echo '</pre>';
		foreach ($remessasE as $remessa) {
			//$writer = fwrite($fp, "\n$remessa->id;$remessa->opdescricao;$remessa->origem;$remessa->destino;$remessa->ativo; $remessa->descricao; $remessa->placa; $remessa->chassi;$remessa->notafiscal;"."R$".number_format($remessa->valor, 2,',','.').";".date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))).";$remessa->status");
			echo '<pre>';
			print_r("\n$remessa->id;$remessa->opdescricao;$remessa->origem;$remessa->destino;$remessa->ativo; $remessa->descricao; $remessa->placa; $remessa->chassi;$remessa->notafiscal;"."R$".number_format($remessa->valor, 2,',','.').";".date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))).";".date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))).";$remessa->status");
			echo '</pre>';
		}
	}
	 	
?>