<?php  

require "../../../app_controle_ativos/remessa/remessa.model.php";
require "../../../app_controle_ativos/remessa/remessa.service.php";
require_once "../../../app_controle_ativos/conexao.php";

//BUSCAR CLASS FPDF
require_once "fpdf.php";

$empresa = 'FAZENDA PALADINO';
$empresa_id = 1127;

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
		$remessas = $remessaService->reportpdf($empresa_id);
//$obj = new Reportpdf();

class PDF extends FPDF
{
    function Footer()
    {
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

// INICIAR O DOC PDF COM ORIENTAÇÃO P RETRATO (PICTURE) OU L PASAIGEM (LANDSCAPE)
$pdf = new FPDF("L");
$pdf->AliasNbPages('{totalPages}');
$pdf->AddPage("L", "A4");


// NOME DO ARQUIVO QUE SERÁ GERADO
$arquivo = "Relatório de Remessas Pendentes de Retorno.pdf";

//DEFINIR FORMATACÕES DO PDF
$fonte = "Arial";
$estilo = "B";
$border = 1;
$alinhamentoL = "L";
$alinhamentoC = "C";

//GERAR PDF
$tipo_pdf = "I";

$objCart = new Funcoes();

$image1 = "../imagens/logo-slcagricola.png";

$agora = new DateTime('now');



$pdf->SetFont($fonte, $estilo, 15);
$pdf->Cell( 20, 0, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 1, 'L', false );
$pdf->SetFont($fonte, $estilo, 15);
$pdf->Cell(275, 12, "Remessa de Imobilizado (Sem Retorno)", 0, 0, $alinhamentoC);
$pdf->SetFont($fonte, $estilo, 8);
$pdf->Cell(-20, 12, $agora->format('d/m/Y H:i:s'), 0, 1, $alinhamentoC);

$pdf->SetFont($fonte, $estilo, 15);
$pdf->Cell(275, 12, $empresa, 0, 1, $alinhamentoC);

//IMPRIMIR OS TITULOS
	$pdf->SetFont($fonte, $estilo, 5);
	$pdf->Cell(5, 7, 'Id', $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Origem', $border, 0, $alinhamentoC);
	
	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, 'Destino', $border,0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(16, 7, $objCart->tratarCaracter('Nota Fiscal',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(18, 7, $objCart->tratarCaracter('Valor',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Emissão',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Entrada',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(37, 7, $objCart->tratarCaracter('Operação',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(15, 7, $objCart->tratarCaracter('Prazo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(10, 7, $objCart->tratarCaracter('Ativo',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(42, 7, $objCart->tratarCaracter('Descrição',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(16, 7, $objCart->tratarCaracter('Placa',1), $border, 0, $alinhamentoC);

	$pdf->SetFont($fonte, $estilo, 8);
	$pdf->Cell(30, 7, $objCart->tratarCaracter('Chasi',1), $border, 1, $alinhamentoC);

	//$pdf->SetFont($fonte, $estilo, 8);
	//$pdf->Cell(25, 7, $objCart->tratarCaracter('Prazo',1), 'L, R, B', 1, $alinhamentoC);

	

	

	

foreach($remessas as $remessa){

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
	$pdf->Cell(30, 4, $remessa->origem , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->destino , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(16, 4, $remessa->notafiscal , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(18, 4, number_format($remessa->valor, 2,',','.') , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->emissao))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->entrada))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(37, 4, $objCart->tratarCaracter($remessa->opdescricao,1) , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(15, 4, date('d/m/Y', strtotime('0 days', strtotime($remessa->retorno))) , 'L, B', 0, $alinhamentoC);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(10, 4, $remessa->ativo , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(42, 4, $remessa->descricao , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(16, 4, $remessa->placa , 'L, B', 0, $alinhamentoL);

	$pdf->SetFont($fonte, '', 7);
	$pdf->Cell(30, 4, $remessa->chassi , 'L, R, B', 1, $alinhamentoL);

	//$pdf->SetFont($fonte, '', 7);
	//$pdf->Cell(25, 5, $remessa->prazo , 'L, B', 1, $alinhamentoL);
	//}
}	
$pdf->PageNo();
$pdf->Cell(0, 5, "Page " . $pdf->PageNo() . "/{totalPages}", 0, 1);
$pdf->AddPage();


$pdf->Output($arquivo, $tipo_pdf);

?>