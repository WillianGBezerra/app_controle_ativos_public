<div class="fixed-bottom my-0 py-0 text-right" style="border:;">
  <?php
    //echo '<pre>';
    //print_r($total_em_tela);
    //echo '</pre>';
  ?> 
  <?php 
    $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    /*print_r("total : ".$total);
    print_r("pagina_atual : ".$pagina_atual);
    print_r("itens_por_pagina : ".$itens_por_pagina);
    print_r("paginas : ".$total_em_tela);*/
    echo '<a style="text-decoration: none;" href="">' .$total_em_tela. ' de ' .$total_reg. ' | '.$pagina_atual.'</a> ';
    $itens_por_pagina;

    /*if ($pagina_atual < $total) {
      //$total_registros_atual = $pagina_atual * $itens_por_pagina;
      echo '<pre>';
      echo '<a style="text-decoration: none;" href="">' .$total_em_tela. ' de ' .$total_reg. ' | '.$pagina_atual.'</a> ';

      echo '</pre>';
    } else if ($pagina_atual = $total) {
      echo '<pre>';
      echo '<a style="text-decoration: none;" href="">'.$total_em_tela.' de '.$total_reg.' | '.$pagina_atual.'</a> ';
      echo '</pre>';
    }*/
  ?>
</div>

<div class="fixed-bottom m-0 p-0" style="font-size: 0.75em;"> 
      <div class="navbar justify-content-center">
        <nav aria-label="Navegação de página">
          <ul class="pagination justify-content-center">
            <li>
              <a class="page-link" href="?pagina=1" tabindex="-1">
                <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Primeira</span>
              </a>
            </li>
            <li class="page-item">
              <?php $pagina_atual= $_GET['pagina']?>
             
              <?php $i= $pagina_atual?>

              <?php if ($i >= 2){
                  $pagina_anterior = $pagina_atual-1;
                                //$pagina_anterior = 1;
                            } else if($i < 2)
                                $pagina_anterior = $pagina_atual;
                                for ($i=$pagina_atual; $i<$total; $i++) {
                ?>
              <?php } ?>
              <a class="page-link" href="?pagina=<?php echo $pagina_anterior?>" tabindex="-1">
                <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Anterior</span>
              </a>
            </li>
            <?php require "../menu_rodape/paginacao.php";?>
            <?php $p= $pagina_atual?>
            
            <?php if ($p < $total){
                $pagina_posterir = $pagina_atual+1;
                //$pagina_anterior = 1;
                } else if($p = $total)
                $pagina_posterir = $pagina_atual;
                    if ($total > 2) {
                      
                    } else if ($total >= 1) {
                      for ($p=$pagina_posterir; $p<$total; $p++) {
                    }
                  
                ?>
            <?php } ?>

            <li class="page-item">
              <a class="page-link" href="?pagina=<?php echo $pagina_posterir?>">
                <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Próximo</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="?pagina=<?php echo $total?>">
                <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Últíma</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>