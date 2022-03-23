<?php   

require "../../../app_controle_ativos/remessa/remessa.model.php";
require "../../../app_controle_ativos/remessa/remessa.service.php";
require_once "../../../app_controle_ativos/conexao.php";

$tipomov = $_POST['tipoMov'];
$empresa_id = $_POST['empresa_id']; 
$empresa = $_POST['empresa'];
$status_id = $_POST['status_id']; 


/*echo '<pre>';
print_r("Id ".$_POST['empresa_id']);
echo '</pre>';

echo '<pre>';
print_r("Empresa ".$_POST['empresa']);
echo '</pre>';

echo '<pre>';
print_r("status_id ".$_POST['status_id']);
echo '</pre>';

echo '<pre>';
print_r("tipo de mov. ".$_POST['tipoMov']);
echo '</pre>';*/

//BUSCAR CLASS FPDF
require_once "fpdf.php";

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

$remessasAll = $remessaService->reportpdfAll();
$total_registrosPdfS = $remessaService->recuperartotalPdfS($_POST['empresa_id'], $_POST['status_id']);
$total_registrosPdfE = $remessaService->recuperartotalPdfE($_POST['empresa_id'], $_POST['status_id']);
/*echo '<pre>';
print_r("total_registrosPdfS ".$total_registrosPdfS);
echo '</pre>';
echo '<pre>';
print_r("total_registrosPdfE ".$total_registrosPdfE);
echo '</pre>';*/
//$obj = new Reportpdf();

/*echo '<pre>';
print_r($remessasS);
echo '</pre>';
echo '<pre>';
print_r($remessasE);
echo '</pre>';*/
class PDF extends FPDF
{
	function Footer() {
		// Go to 1.5 cm from bottom
		$this->SetY(-15);
		// Select Arial italic 8
		$this->SetFont('Arial','I',8);
		// Print centered page number
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}
}

class Funcoes {

    public function tratarCaracter($vlr, $tipo){
		switch($tipo){
            case 1: $rst = utf8_decode($vlr); break;
            case 2: $rst = utf8_encode($vlr); break;    
        }
        return $rst;
    }	

}

$objCart = new Funcoes();

// INICIAR O DOC PDF COM ORIENTAÇÃO P RETRATO (PICTURE) OU L PASAIGEM (LANDSCAPE)
//$pdf = new FPDF("L");
$pdf = new FPDF('L','mm',array(210,297));
$pdf->SetMargins( 3, 1, 3, 50 );
$pdf->AliasNbPages('{totalPages}');
$pdf->SetAutoPageBreak(true);
$pdf->AddPage("L", "A4");

//DEFINIR FORMATACÕES DO PDF
$fonte = "Arial";
$estilo = "B";
$border = 1;
$alinhamentoL = "L";
$alinhamentoC = "C";

//GERAR PDF
$tipo_pdf = "I";



$image1 = "../imagens/logo-slcagricola.png";

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$agora = new DateTime('now');


if ($tipomov == 0) {
// NOME DO ARQUIVO QUE SERÁ GERADO
	$arquivo = $objCart->tratarCaracter("Relatório de Remessas - ".$empresa.".pdf",1);
	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell( 20, 0, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 1, 'L', false );

	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell(275, 12, $objCart->tratarCaracter('Entradas/Saídas Remessa de Imobilizado',1), 0, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(-20, 12, $agora->format('d/m/Y H:i:s'), 0, 1, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 10);
	$pdf->Cell(275, 12, "Empresa: ".$empresa_id." - ".$empresa, 0, 1, $alinhamentoL);

//IMPRIMIR OS TITULOS
	$pdf->SetFont($fonte, $estilo, 5);

	$pdf->Cell(5, 7, 'Id', $border, 0, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(30, 7, 'Origem', $border, 0, $alinhamentoC);
	
	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Origem', $border,0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Destino', $border,0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(18, 7, $objCart->tratarCaracter('Nota Fiscal',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(20, 7, $objCart->tratarCaracter('Valor',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Emissão',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Entrada',1), $border, 0, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(37, 7, $objCart->tratarCaracter('Operação',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Prazo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(10, 7, $objCart->tratarCaracter('Ativo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(75, 7, $objCart->tratarCaracter('Descrição',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(12, 7, $objCart->tratarCaracter('Placa',2), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, $objCart->tratarCaracter('Chassi',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(16, 7, $objCart->tratarCaracter('Status',1), $border, 1, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(25, 7, $objCart->tratarCaracter('Prazo',1), 'L, R, B', 1, $alinhamentoC);

foreach($remessasAll as $remessa){

	$nr = 0;
	$totalR = $remessaService->recuperartotal();

	//$pdf->SetFont($fonte, $estilo, 15);
	//$pdf->Cell(279, 10, $remessa->origem, $border, 1, $alinhamentoC);

	//$nr = $nr + 1;
	//if ($totalR <= $nr) {
		// code...
	
	//INSERIR CAMPOS DA TABELA
	$pdf->SetFont($fonte, '', 5);
	$pdf->Cell(5, 4, $remessa->id, 'L, B', 0, $alinhamentoL);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(30, 4, $remessa->origem , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->origem , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->destino , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(18, 4, $remessa->notafiscal , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(20, 4, "R$ ".number_format($remessa->valor, 2,',','.') , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))) , 'L, B', 0, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(37, 4, $objCart->tratarCaracter($remessa->opdescricao,1) , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(10, 4, $remessa->ativo , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(75, 4, $remessa->descricao , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(12, 4, $remessa->placa , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->chassi , 'L, R, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(16, 4, $objCart->tratarCaracter($remessa->status,1) , 'L, R, B', 1, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(25, 5, $remessa->prazo , 'L, B', 1, $alinhamentoL);
	//}
}	

$pdf->PageNo();
$pdf->Cell(0, 5, $objCart->tratarCaracter("Página ",1) . $pdf->PageNo() /*. "/{totalPages}"*/, 0, 1);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->Output($arquivo, $tipo_pdf);

}if ($tipomov == 1) {
// NOME DO ARQUIVO QUE SERÁ GERADO
	$arquivo = $objCart->tratarCaracter("Relatório de Remessas Pendentes - ".$empresa.".pdf",1);
	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell( 20, 0, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 1, 'L', false );

	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell(275, 12, "Entradas de Remessa de Imobilizado", 0, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(-20, 12, $agora->format('d/m/Y H:i:s'), 0, 1, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 10);
	$pdf->Cell(275, 12, "Empresa: ".$empresa_id." - ".$empresa, 0, 1, $alinhamentoL);

//IMPRIMIR OS TITULOS
	$pdf->SetFont($fonte, $estilo, 5);

	$pdf->Cell(5, 7, 'Id', $border, 0, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(30, 7, 'Origem', $border, 0, $alinhamentoC);
	
	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Origem', $border,0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(18, 7, $objCart->tratarCaracter('Nota Fiscal',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(20, 7, $objCart->tratarCaracter('Valor',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Emissão',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Entrada',1), $border, 0, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(37, 7, $objCart->tratarCaracter('Operação',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Prazo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(10, 7, $objCart->tratarCaracter('Ativo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(105, 7, $objCart->tratarCaracter('Descrição',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(12, 7, $objCart->tratarCaracter('Placa',2), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, $objCart->tratarCaracter('Chassi',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(16, 7, $objCart->tratarCaracter('Status',1), $border, 1, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(25, 7, $objCart->tratarCaracter('Prazo',1), 'L, R, B', 1, $alinhamentoC);

foreach($remessasS as $remessa){

	$nr = 0;
	$totalR = $remessaService->recuperartotal();

	//$pdf->SetFont($fonte, $estilo, 15);
	//$pdf->Cell(279, 10, $remessa->origem, $border, 1, $alinhamentoC);

	//$nr = $nr + 1;
	//if ($totalR <= $nr) {
		// code...
	
	//INSERIR CAMPOS DA TABELA
	$pdf->SetFont($fonte, '', 5);
	$pdf->Cell(5, 4, $remessa->id, 'L, B', 0, $alinhamentoL);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(30, 4, $remessa->origem , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->origem , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(18, 4, $remessa->notafiscal , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(20, 4, "R$ ".number_format($remessa->valor, 2,',','.') , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))) , 'L, B', 0, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(37, 4, $objCart->tratarCaracter($remessa->opdescricao,1) , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(10, 4, $remessa->ativo , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(105, 4, $remessa->descricao , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(12, 4, $remessa->placa , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->chassi , 'L, R, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(16, 4, $objCart->tratarCaracter($remessa->status,1) , 'L, R, B', 1, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(25, 5, $remessa->prazo , 'L, B', 1, $alinhamentoL);
	//}
}	

$pdf->PageNo();
$pdf->Cell(0, 5, $objCart->tratarCaracter("Página ",1) . $pdf->PageNo() /*. "/{totalPages}"*/, 0, 1);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->Output($arquivo, $tipo_pdf);

} else if($tipomov == 2){
// NOME DO ARQUIVO QUE SERÁ GERADO	
$arquivo = $objCart->tratarCaracter("Relatório de Remessas - ".$empresa.".pdf",1);
//entradas


	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell( 20, 0, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 1, 'L', false );
	$pdf->SetFont($fonte, $estilo, 15);
	$pdf->Cell(275, 12, $objCart->tratarCaracter("Saídas de Remessa de Imobilizado",1), 0, 0, $alinhamentoC);
	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(-20, 12, $agora->format('d/m/Y H:i:s'), 0, 1, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 10);
	$pdf->Cell(275, 12, "Empresa: ".$empresa_id." - ".$empresa, 0, 1, $alinhamentoL);
	//IMPRIMIR OS TITULOS
	$pdf->SetFont($fonte, $estilo, 5);
	$pdf->Cell(5, 7, 'Id', $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Destino', $border, 0, $alinhamentoC);
	
	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(30, 7, 'Destino', $border,0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(18, 7, $objCart->tratarCaracter('Nota Fiscal',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(20, 7, $objCart->tratarCaracter('Valor',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Emissão',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Entrada',1), $border, 0, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(37, 7, $objCart->tratarCaracter('Operação',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Prazo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(10, 7, $objCart->tratarCaracter('Ativo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(105, 7, $objCart->tratarCaracter('Descrição',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(12, 7, $objCart->tratarCaracter('Placa',2), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, $objCart->tratarCaracter('Chassi',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(16, 7, $objCart->tratarCaracter('Status',1), $border, 1, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(25, 7, $objCart->tratarCaracter('Prazo',1), 'L, R, B', 1, $alinhamentoC);

	

	

	

foreach($remessasE as $remessa){

	$nr = 0;
	$totalR = $remessaService->recuperartotal();

	//$pdf->SetFont($fonte, $estilo, 15);
	//$pdf->Cell(279, 10, $remessa->origem, $border, 1, $alinhamentoC);

	//$nr = $nr + 1;
	//if ($totalR <= $nr) {
		// code...
	
	//INSERIR CAMPOS DA TABELA
	$pdf->SetFont($fonte, '', 5);
	$pdf->Cell(5, 4, $remessa->id, 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->destino , 'L, B', 0, $alinhamentoL);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(30, 4, $remessa->destino , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(18, 4, $remessa->notafiscal , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(20, 4, "R$ ".number_format($remessa->valor, 2,',','.') , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))) , 'L, B', 0, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(37, 4, $objCart->tratarCaracter($remessa->opdescricao,1) , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(10, 4, $remessa->ativo , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(105, 4, $remessa->descricao , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(12, 4, $remessa->placa , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->chassi , 'L, R, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(16, 4, $objCart->tratarCaracter($remessa->status,1) , 'L, R, B', 1, $alinhamentoC);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(25, 5, $remessa->prazo , 'L, B', 1, $alinhamentoL);
	//}
}	
$pdf->PageNo();
$pdf->Cell(0, 5, $objCart->tratarCaracter("Página ",1) . $pdf->PageNo() /*. "/{totalPages}"*/, 0, 1);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->Output($arquivo, $tipo_pdf);
}

?>