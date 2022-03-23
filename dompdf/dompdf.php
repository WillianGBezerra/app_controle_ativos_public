<?php
// Incluindo o autoload do DOM PDF
//require_once 'dompdf/autoload.inc.php';

require_once 'vendor/autoload.php';
//Criando a instancia do Dom PDF.
//Criando o namespace para evitar erros
use Dompdf\Dompdf;

// Instanciando a classe do Dom DPF
$dompdf = new Dompdf();

$html = file_get_contents('todos.paises.php');

//Criando o código HTML que será transformado em pdf
$dompdf->loadHtml($html);

//Define o tipo de papel de impressão (opcional)
//tamanho (A4, A3, A2, etc)
//oritenação do papel:'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'landscape');

// Vai renderizar o HTML como PDF
$dompdf->render();

// Saída do pdf para a renderização do navegador.
//Coloca o nome que deseja que seja renderizado.
$dompdf->stream("relatorio.pdf", array(true)); 

?>