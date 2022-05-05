<?php
 
$a =  'class="page-link"';
$ul = 'class="pagination justify-content-center"';
$li = 'class="page-item"';
//if ($pagina_corrente == $_GET['pagina'])
  //$estilo ='class="page-item active"';

// total de páginas
//$total = $numero_paginas;
//print_r("Total de paginas : ".$total);
// número máximo de links da paginação
$max_links = 10;
 
 
// página corrente
$pagina_corrente = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
 
// calcula quantos links haverá à esquerda e à direita da página corrente
// usa-se ceil() para assegurar que o número será inteiro
$links_laterais = ceil($max_links / 2);
 
// variáveis para o loop
$inicio = $pagina_corrente - $links_laterais;
$limite = $pagina_corrente + $links_laterais;
 
for ($i = $inicio; $i <= $limite; $i++)
{
 if ($i == $pagina_corrente)
 {  
  echo '<li class="page-item active"><a '.$a.">" . $i . '</a></li> ';
  
 }

 else
 {
  if ($i >= 1 && $i <= $total)
  {
    if ($view == 'todas.remessas'){
      if ($acao8 == 'recuperar') {
            echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
          } else if ($acao8 == 'recuperarbydate') {
            echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?acao8=recuperarbydate&data_inicial=". $data_inicial . "&data_final=" . $data_final ."&pagina=" . $i . ">" . $i . "</a></li></ul> ";
          } else if($acao8 == 'recuperarbynfe'){
             echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?acao8=recuperarbynfe&nfe=". $nfe . "&pagina=" . $i . ">" . $i . "</a></li></ul> ";
          } else if ($acao8 == 'recuperarbychassi') {
             echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?acao8=recuperarbychassi&ativo_chassi=". $ativo_chassi . "&ativoopcao=" . $ativoopcao ."&pagina=" . $i . ">" . $i . "</a></li></ul> ";
          }        
    } else if ($view == 'todas.empresas') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todas.cidades') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todos.paises') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todos.ativos') {
         echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
      /*if ($acao5 == 'recuperarColuna') {
            echo "<ul ".$ul." ><li ".$li." ><a ".$a. "href=?acao5=recuperarColuna&termo=". $termo . "&Selected=" . $Selected . "&pagina=" . $i . ">" . $i . "</a></li></ul> ";
      }*/
      // echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todos.retornos') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'retorno') {
        // code...
    } else if ($view == 'todos.cfops') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todas.opfiscais') {
       echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
    } else if ($view == 'todos.estados') {
      if ($acao2 == 'recuperar') 
      { echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
      } else if ($acao2 == 'recuperarbydate') {
        echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?acao2=recuperarbydate&data_inicial=". $data_inicial . "&data_final=" . $data_final ."&pagina=" . $i . ">" . $i . "</a></li></ul> ";
      } else {
        echo "<ul ".$ul." ><li ".$li." ><a ".$a . "href=?pagina=" . $i . ">" . $i . "</a></li></ul> ";
      }
    }
  
   //<ul $ul><li $li><a $a "href=\"todas.empresas.php?pagina=$i">$i</a></li></ul>
  }
 }
}
 
?>