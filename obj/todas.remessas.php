<?php
 session_start();
 $view = 'todas.remessas';
 //$_SESSION['acao8'] = isset($_GET['acao8']) ? $_GET['acao8'] : 'recuperar';
 //$acao8 = $_SESSION['acao8'];
 //$acao8 = 'recuperar';
 $acao8 = isset($_GET['acao8']) ? $_GET['acao8'] : 'recuperar'; 
 $pesqData = isset($_GET['pesqData']) ? $_GET['pesqData'] : 0;
 $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : 0;
 $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : 0;
 $pesqnfe = isset($_GET['pesqnfe']) ? $_GET['pesqnfe'] : 0;
 $nfe = isset($_GET['nfe']) ? $_GET['nfe'] : "";
 $txt_ativoopcao = isset($_GET['txt_ativoopcao']) ? $_GET['txt_ativoopcao'] : 0;
 $txt_descricao = isset($_GET['txt_descricao']) ? $_GET['txt_descricao'] : '';
 $txt_eam = isset($_GET['txt_eam']) ? $_GET['txt_eam'] : '';
 $txt_chassi = isset($_GET['txt_chassi']) ? $_GET['txt_chassi'] : '';
 $txt_ativo = isset($_GET['txt_ativo']) ? $_GET['txt_ativo'] : '';
 $txt_placa = isset($_GET['txt_placa']) ? $_GET['txt_placa'] : '';
 $txtid = isset($_GET['txtid']) ? $_GET['txtid'] : '';
 $txt_empresa = isset($_GET['txt_empresa']) ? $_GET['txt_empresa'] : '';
 $txt_nferemessa = isset($_GET['txt_nferemessa']) ? $_GET['txt_nferemessa'] : '';
 $txt_nfedevolucao = isset($_GET['txt_nfedevolucao']) ? $_GET['txt_nfedevolucao'] : '';

 $tipoMov = isset($_GET['tipoMov']) ? $_GET['tipoMov'] : 0;
 $stRegistro = isset($_GET['stRegistro']) ? $_GET['stRegistro'] : 0;

 $coluna = isset($_GET['coluna']) ? $_GET['coluna'] : '';
 $conteudo = isset($_GET['conteudo']) ? $_GET['conteudo'] : '';
  
 /*echo '<pre>';
 print_r($pesqnfe); 
 echo '</pre>';
 echo '<pre>';
 print_r($nfe); 
 echo '</pre>';
 echo '<pre>';
 print_r($data_final); 
 echo '</pre>';
 echo '<pre>';
 print_r($coluna); 
 echo '</pre>';
 echo '<pre>';
 print_r($conteudo); 
 echo '</pre>';*/
 require "../controller/remessa_controller.php"; 

 /*Variáveis para pesquisa por data de emissão da Remessa ou Devolução*/
 if ($pesqData == 0) {
  $ValueconteudopesqTipoDataSelect = 0;
  $conteudopesqTipoDataSelect = '';
  $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : 0;
  $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : 0;
 } else if ($pesqData == 1) {
  $ValueconteudopesqTipoDataSelect = 1;
  $conteudopesqTipoDataSelect = 'Remessa';
  $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : 0;
  $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : 0;
 } else if ($pesqData == 2) {
  $ValueconteudopesqTipoDataSelect = 2;
  $conteudopesqTipoDataSelect = 'Devolução';
  $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : 0;
  $data_final = isset($_GET['data_final']) ? $_GET['data_final'] : 0;
 }

 if ($txt_ativoopcao == 0) {
  $conteudoPesq = '';
  $ValueconteudoSelect = 0;
  $conteudoSelect = '';
 } else if ($txt_ativoopcao == 1) {
  $conteudoSelect = 'Descrição';
  $ValueconteudoSelect = 1;
  $conteudoPesq = $txt_descricao;
 } else if ($txt_ativoopcao == 2) {
  $conteudoPesq = $txt_eam;
  $conteudoSelect = 'EAM';
  $ValueconteudoSelect = 2;
 } else if ($txt_ativoopcao == 3) {
  $conteudoSelect = 'Chassi';
  $conteudoPesq = $txt_chassi;
  $ValueconteudoSelect = 3;
 } else if ($txt_ativoopcao == 4) {
  $conteudoPesq = $txt_ativo;
  $conteudoSelect = 'Ativo';
  $ValueconteudoSelect = 4;
 } else if ($txt_ativoopcao == 5) {
  $conteudoPesq = $txt_placa;
  $conteudoSelect = 'Placa';
  $ValueconteudoSelect = 5;
 } else if ($txt_ativoopcao == 6) {
  $conteudoPesq = $txt_placa;
  $conteudoSelect = 'Origem';
  $ValueconteudoSelect = 6;
 } else if ($txt_ativoopcao == 7) {
  $conteudoPesq = $txt_placa;
  $conteudoSelect = 'Destino';
  $ValueconteudoSelect = 7;
 } else if ($txt_ativoopcao == 8) {
   $conteudoPesq = $txt_nferemessa;
   $conteudoSelect = 'NF-e Remessa';
   $ValueconteudoSelect = 8;
 } else if ($txt_ativoopcao == 9) {
   $conteudoPesq = $txt_nfedevolucao;
   $conteudoSelect = 'NF-e Devolução';
   $ValueconteudoSelect = 9;
 } 


  ?>
  <?
  $acao6 = 'recuperar';
  require "../controller/empresa_controller.php";

  $acao5 = 'recuperar';
  require "../controller/ativo_controller.php";

  $acao4 = 'recuperar';
  require "../controller/opfiscal_controller.php";
  ?>



  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>App Remessa</title>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   <style>
    body {
     font-size: 0.6em;
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
   <script>
    function excluir(id, ativo_id) {
     location.href = 'todas.remessas.php?acao8=remover&id='+id+'&ativo_id='+ativo_id
    }
   </script>
   <script>
      //Função para pesquisa com intervalo de datas
      function pesquisarpordata(pesqData, data_inicial, data_final) {
       var pesqData = document.getElementById("pesqData").value;
       var data_inicial = document.getElementById("data_inicial").value;
       var data_final = document.getElementById("data_final").value;
       location.href = 'todas.remessas.php?acao8=recuperarbydate&pesqData='+pesqData+'&data_inicial='+data_inicial+'&data_final='+data_final+'&pagina=1'
      }
      //Função para pesquisa por número de nota fiscal
      function pesquisarpornfe(nfe) {
       var nfe = document.getElementById("nfe").value;
       location.href = 'todas.remessas.php?acao8=recuperarbynfe&nfe='+nfe+'&pagina=1'
      }
       //Função para pesquisa por número do chassi
       function pesquisarporativo(txt_ativoopcao, txt_descricao, txt_eam, txt_chassi, txt_ativo, txt_placa, txt_empresa, txt_nferemessa, txt_nfedevolucao) {
        //$acao8 = recuperarbychassi;
        var txt_ativoopcao = document.getElementById("pesqativo").value;
        var txt_descricao = document.getElementById("inputpesqativo").value;
        var txt_eam = document.getElementById("inputpesqativo").value;
        var txt_chassi = document.getElementById("inputpesqativo").value;
        var txt_ativo = document.getElementById("inputpesqativo").value;
        var txt_placa = document.getElementById("inputpesqativo").value;
        var txt_empresa = document.getElementById("inputpesqativo").value;
        var txt_nferemessa = document.getElementById("inputpesqativo").value;
        var txt_nfedevolucao = document.getElementById("inputpesqativo").value;
        /*if (ativoopcao == 4) { 
          location.href = 'todas.remessas.php?acao8=recuperarPorAtivo&ativo_chassi='+ativo_chassi+'&ativoopcao='+ativoopcao+'&pagina=1'
        } else if (ativoopcao == 5) { 
          location.href = 'todas.remessas.php?acao8=recuperarPorAtivo&n_ativo='+n_ativo+'&ativoopcao='+ativoopcao+'&pagina=1'
        } else if (ativoopcao == 6) { 
          location.href = 'todas.remessas.php?acao8=recuperarPorAtivo&placa='+placa+'&ativoopcao='+ativoopcao+'&pagina=1'
         }*/

         if (txt_ativoopcao == 0) { 
          location.href = 'todas.remessas.php?&pagina=1'
         } else if (txt_ativoopcao == 1) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_descricao='+txt_descricao+'&txt_ativoopcao=1&pagina=1'
         } else if (txt_ativoopcao == 2) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_eam='+txt_eam+'&txt_ativoopcao=2&pagina=1'
         } else if (txt_ativoopcao == 3) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_chassi='+txt_chassi+'&txt_ativoopcao=3&pagina=1'
         } else if (txt_ativoopcao == 4) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_ativo='+txt_ativo+'&txt_ativoopcao=4&pagina=1'
         } else if (txt_ativoopcao == 5) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_placa='+txt_placa+'&txt_ativoopcao=5&pagina=1'
         } else if (txt_ativoopcao == 6) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_empresa='+txt_empresa+'&txt_ativoopcao=6&pagina=1'
         } else if (txt_ativoopcao == 7) { 
          location.href = 'todas.remessas.php?acao8=recuperarCol&txt_empresa='+txt_empresa+'&txt_ativoopcao=7&pagina=1'
         } else if (txt_ativoopcao == 8) { 
           location.href = 'todas.remessas.php?acao8=recuperarCol&txt_nferemessa='+txt_nferemessa+'&txt_ativoopcao=8&pagina=1'
         } else if (txt_ativoopcao == 9) { 
           location.href = 'todas.remessas.php?acao8=recuperarCol&txt_nfedevolucao='+txt_nfedevolucao+'&txt_ativoopcao=9&pagina=1'
         }

        }
        function pesquisarporMovStatus(acao8, tipoMov, stRegistro) {
        //$acao8 = recuperarbydate;
        var tipoMov = document.getElementById("tipoMov").value;
        var stRegistro = document.getElementById("stRegistro").value;
        location.href = 'todas.remessas.php?acao8=recuperarbyMovStatus&tipoMov='+tipoMov+'&stRegistro='+stRegistro+'&pagina=1'
       }
      </script>
     </head>
     <body>
      <?php
      require_once '../menu_rodape/menu.php'
      ?>
      <?php
      require_once '../common/delete.php'
      ?>
      <main role="main" style="margin-bottom: 1em;padding: 0.5em;">
       <div class="card" style="margin-bottom: 0.5em;">
        <nav class="navbar navbar-expand-lg mavbar-light bg-light">
        
            <!--Pesquisar por colunas da tabela ativo chave extrangeira da tabela remessas-->
            <div class="input-group-append"> 
             <form class="form-inline" method="" action="../controller/remessa_controller.php?acao8=recuperarCol">
              <div class="input-group">
               <select class="custom-select sm" name="pesqativo" id="pesqativo" aria-label="Selecione uma opção de pesquisa" title="Selecione uma opção de pesquisa" style="font-size: 0.9em">
                <option value="<?= $ValueconteudoSelect ?>" selected><?= $conteudoSelect ?></option>
                <option value="1" aria-label="Pesquisar por Descrição do Ativo">Descrição</option>
                <option value="2" aria-label="Pesquisar pelo número do EAM">EAM</option>
                <option value="3" aria-label="Pesquisar pelo número do chassi">Chassi</option>
                <option value="4" aria-label="Pesquisar pelo número do ativo">Nº FA</option>
                <option value="5" aria-label="Pesquisar pela placa do ativo">Placa</option>
                <option value="6" aria-label="Pesquisar pela placa do ativo">Origem</option>
                <option value="7" aria-label="Pesquisar pela placa do ativo">Destino</option>
                <option value="8" aria-label="Pesquisar pela placa do ativo">NF-e Remessa</option>
               </select>          
               <div class="input-group-append">
                <input type="text" class="form-control" id="inputpesqativo" name="inputpesqativo" placeholder="" title="Digite aqui" aria-label="" style="font-size: 0.9em">
                <button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorcamposTabel" title="Clique aqui" onclick="pesquisarporativo()" style="font-size: 0.9em"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                 <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></button>
               </div>
              </div>
             </form>
            </div>

            <div class="input-group-append" style="padding-left: 0.4em;"> 
             <form class="form-inline" method="" action="../controller/remessa_controller.php?acao8=recuperarbydate">
              <div class="input-group">
               <select class="custom-select sm" name="pesqData" id="pesqData" aria-label="Selecione uma opção de pesquisa" title="Selecione uma opção de pesquisa" style="font-size: 0.9em" required>
                <option value="<?= $ValueconteudopesqTipoDataSelect ?>" selected><?= $conteudopesqTipoDataSelect ?></option>
                <option value="1" aria-label="Pesquisar por Descrição do Ativo">Emissão</option>
                <option value="2" aria-label="Pesquisar pelo número do chassi">Prazo</option>
               </select>          
               <div class="input-group-append">
                <input type="date" class="form-control" placeholder="" aria-label="" name="data_inicial" value="<?= $data_inicial?>" id="data_inicial" title="Data inícial" style="font-size: 0.9em" required>
                <input type="date" class="form-control" placeholder="" aria-label="" name="data_final" value="<?= $data_final?>" id="data_final" title="Data final" style="font-size: 0.9em" required>
                <div class="input-group-append">
                 <button class="btn btn-outline-primary btn-sm" type="button" onclick="pesquisarpordata()" id="pesqPorcamposTabel" title="Digite aqui" style="font-size: 0.9em">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                   <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
                   <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z"/>
                  </svg>
                 </button>
                </div>
               </div>
              </div>
             </form>
            </div>
           <div class="card  ml-auto">
           <div class="input-group-append">
            <!--input type="text" class="form-control" placeholder="" aria-label="" style="font-size: 0.9em"-->
            <!--button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorcamposTabel" style="font-size: 0.9em">Ok</button-->
            <a href="../relatorios/relatorios.php?" target="_parent"><button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Relatórios" type="button" style="font-size: 0.9em">Relatórios</button></a>
            <div class="dropdown-divider"></div>
            <!--a href="remessa.php?acao8=inserir" target="_parent"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Nova remessa" type="button" style="font-size: 0.9em">Novo</button></a--> 
           </div>
          </div>
         </nav>      
        </div>
        <div class="card card-columns" style="height: 46.15em; padding: 0px; border:;">
         <div class="card bg-light border-light md-2 font-weight-light" style="">
          <div class="card-body" style="height: 45.74em;">
           <h5 class="card-title text-left" style="margin: 0em;">Remessas</h5>
           <div class="">
            <div style="" id="ativos">
             <!-- -->
             <table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;font-size: 0.9em;">
              <thead>
               <tr>
                <th class="text" scope="col" style="width: 3em;">Id</th>
                <th class="text" scope="col" style="width: 12em;">Operação Fiscal</th>
                <th class="text-" scope="col" style="width: 13em;">Origem</th>
                <th class="text-" scope="col" style="width: 13em;">Destino</th>
                <th class="text-" scope="col" style="width: 10em;">Ativo</th>
                <th class="text-" scope="col" style="width: 30em;">Descrição</th>
                <th class="text-" scope="col" style="width: 5em;">Placa</th>
                <th class="text-" scope="col" style="width: 5em;">Eam</th>
                <th class="text-" scope="col" style="width: 12em;">Chassi</th>
                <th class="text-" scope="col" style="width: 7em;">NFe</th>
                <th class="text-" scope="col" style="width: 10em;">Valor</th> 
                <th class="text-" scope="col" style="width: 6em;">Emissão</th>
                <th class="text-" scope="col" style="width: 6em;">Saída</th>
                <th class="text-" scope="col" colspan="1" style="width: 4em;">Prazo</th>
                <th class="text-" scope="col" style="width: 5em;">Dias</th> 
                <th class="text" scope="col" style="width: 12em;">Chave</th>
                <th class="text-" scope="col" style="width: 3em;">Editar</th>
                <th class="text-" scope="col" style="width: 3em;">Excluir</th>
                <th class="" scope="col" colspan="2" style="width: 2em;">Devolver</th>    
                              <!--th class="" scope="col" colspan="2" style="width: 2em;">Update/Delete</th>
                               <!--th class="" scope="col" colspan="2" style="width: 2em;">Devolver</th--> 
                               <!--th class="" scope="col" style="width: 3em;">Excluir</th-->
                              </tr>
                             </thead>
                             <tbody>
                              <?php foreach($remessas as $key => $remessa): ?>
                               <tr>
                                <div class="col-sm-9" id="<?= $remessa->id ?>">
                                 <form method="post" action="remessa.php?acao8=atualizar">
                                  <td><input type="hidden" name="id" value="<?= $remessa->id ?>"><?= $remessa->id ?></td>
                                  <td><input type="hidden" name="opfiscal_id" value="<?= $remessa->opfiscal_id ?>"><?= $remessa->opdescricao ?></td>
                                  <input type="hidden" name="opfiscal" value="<?= $remessa->prazo?>-<?= $remessa->sigla_op_fiscal ?>"></input>
                                  <td><input type="hidden" name="origem_id" value="<?= $remessa->origem_id ?>"><?= $remessa->origem ?></td>
                                  <input type="hidden" name="origem" value="<?= $remessa->origem ?>"></input>
                                  <td><input type="hidden" name="destino_id" value="<?= $remessa->destino_id ?>"><?= $remessa->destino ?></td>
                                  <input type="hidden" name="destino" value="<?= $remessa->destino ?>"></input>
                                  <td><input type="hidden" name="ativo_id" value="<?= $remessa->ativo_id ?>"><?= $remessa->ativo ?></td>
                                  <td><input type="hidden" name="descricao" value="<?= $remessa->descricao ?>"><?= $remessa->descricao ?></td>
                                  <td><input type="hidden" name="placa" value="<?= $remessa->placa ?>"><?= $remessa->placa ?></td>
                                  <td><input type="hidden" name="eam" value="<?= $remessa->eam ?>"><?= $remessa->eam ?></td>
                                  <td><input type="hidden" name="chassi" value="<?= $remessa->chassi ?>"><?= $remessa->chassi ?></td>
                                  <!--td><input type="hidden" name="chassi" value="<?= $remessa->chassi ?>"><?= $remessa->bloqueio ?></td-->
                                  <?php if( $remessa->bloqueio == 1) { ?>
                                   <input type="hidden" name="bloqueio" value="<?= $remessa->bloqueio?>"></input>
                                  <?php } ?>
                                  <?php if ($remessa->bloqueio ==  2) { ?>
                                   <input type="hidden" name="bloqueio" value="<?= $remessa->bloqueio?>"></input>
                                  <?php } ?>
                                  <input type="hidden" name="ativo" value="<?= $remessa->ativo ?>-<?= $remessa->descricao ?>-<?= $remessa->placa ?>-<?= $remessa->eam ?>-<?= $remessa->chassi ?>"></input-->

                                  <input type="hidden" name="status_id" value="<?= $remessa->status_id ?>"></input>
                                  <input type="hidden" name="status" value="<?= $remessa->status ?>"></input>
                                  <td><input type="hidden" name="notafiscal" value="<?= $remessa->notafiscal ?>"><?= $remessa->notafiscal ?></td>
                                  <td><input type="hidden" name="valor" value="<?= $remessa->valor?>"><?= "R$ ".number_format($remessa->valor, 2,',','.')?></td>
                                  <td><input type="hidden" name="emissao" value="<?= $remessa->emissao?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->emissao)))?></td>
                                  <td><input type="hidden" name="entrada" value="<?= $remessa->entrada?>"><?=date('d/m/Y', strtotime('+0 days', strtotime($remessa->entrada))) ?></td>
                                  <td><input type="hidden" name="retorno" value="<?= $remessa->retorno?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->retorno)))?></td>

                                  <?php 
                                  $d1 = new DateTime('now');
                                  $d2 = new DateTime($remessa->retorno);
                                  $intervalo = $d1->diff( $d2 );
                                      //echo "Diferença de " . $intervalo->d . " dias";
                                      //echo " e " . $intervalo->m . " mese s";
                                      //echo " e " . $intervalo->y . " anos."; 
                                  if($d1 < $d2){
                                       // $text = $intervalo->d . " dias, ".$intervalo->m . " meses e " . $intervalo->y." anos";
                                   $text = $intervalo->days;
                                  } else if ($d1 > $d2) {
                                   $text = "Atrasado";
                                  }

                                  ?>
                                  <td><?= $text?></td>
                                  <td><input type="hidden" name="chave_nfe_remessa" value="<?= $remessa->chave_nfe_remessa?>"><?= $remessa->chave_nfe_remessa ?></td>
                                  <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                                  <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="Excluir" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="button" onclick="excluir(<?= $remessa->id?>, <?= $remessa->ativo_id ?>)"><i class="fas fa-trash-alt fa-lg text-danger"></i></button></td>
                                  <!--td><i class="fas fa-trash-alt fa-lg text-danger" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="excluir(<?= $remessa->id?>)"></i></td-->
                                  <!--td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button-->
                                    <!--td><i class="fas fa-edit fa-lg text-info" type="submit" onclick="editar(<?= $estado->id ?>, '<?= $estado->estado ?>','<?= $estado->sigla ?>', '<?= $estado->pais_id ?>')"></i></td>
                                     <!--td><i class="fas fa-check-square fa-lg text-success"></i></td-->
                                    </form>
                                    <form method="post" action="retorno.php?acao9=inserir">


                                     <input type="hidden" name="remessa_id" value="<?= $remessa->id ?>">
                                     <input type="hidden" name="opfiscal_id" value="<?= $remessa->opfiscal_id ?>">
                                     <input type="hidden" name="opfiscal" value="<?= $remessa->prazo?>-<?= $remessa->sigla_op_fiscal ?>">
                                     <input type="hidden" name="origem_id" value="<?= $remessa->origem_id ?>">
                                     <input type="hidden" name="origem" value="<?= $remessa->origem ?>">
                                     <input type="hidden" name="destino_id" value="<?= $remessa->destino_id ?>">
                                     <input type="hidden" name="destino" value="<?= $remessa->destino ?>">
                                     <input type="hidden" name="ativo_id" value="<?= $remessa->ativo_id ?>">
                                     <input type="hidden" name="descricao" value="<?= $remessa->descricao ?>">
                                     <input type="hidden" name="placa" value="<?= $remessa->placa ?>">
                                     <input type="hidden" name="eam" value="<?= $remessa->eam ?>">
                                     <input type="hidden" name="chassi" value="<?= $remessa->chassi ?>">
                                     <input type="hidden" name="ativo" value="<?= $remessa->ativo ?>-<?= $remessa->descricao ?>-<?= $remessa->placa ?>-<?= $remessa->eam ?>-<?= $remessa->chassi ?>"></input>

                                     <input type="hidden" name="id" value="<?= $remessa->id ?>">
                                     <input type="hidden" name="status" value="<?= $remessa->status ?>">
                                     <input type="hidden" name="retorno" value="<?= $remessa->retorno?>">
                                     <input type="hidden" name="notafiscal" value="<?= $remessa->notafiscal ?>">
                                     <input type="hidden" name="valor" value="<?= $remessa->valor?>">
                                     <input type="hidden" name="emissao" value="<?= $remessa->emissao?>">
                                     <input type="hidden" name="entrada" value="<?= $remessa->entrada?>">
                                     <input type="hidden" name="retorno" value="<?= $remessa->retorno?>">

                                     <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                                    </form>
                                   </div>
                                  </tr> 
                                 <?php endforeach; ?>

                                </tbody>
                               </table>
                              </div>
                             </div>
                <!--div style="margin-top: 10em;">
                 <div class="pagination m-0 p-0 justify-content-end" style="text-decoration: none;">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <a href="uploadExcelRemessa.php" target="_parent"><button class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Novo Ativo" type="button" style="font-size: 1em">Gerar Excel</button></a>
                        <input type="radio" name="options" id="option1" autocomplete="off" href="uploadExcelRemessa.php"> Gerar Excel>
                         <a href="uploadExcel.php?acaoImp=1" target="_parent"><button class="btn btn-outline-primary btn-sm active" data-toggle="tooltip" data-placement="top" title="Novo Ativo" type="button" style="font-size: 1em">Importar Excel</button></a>
                      <label class="btn btn-outline-primary btn-sm"> 
                        <a href="uploadExcelRemessa.php"><input type="radio" name="options" id="option2" autocomplete="off"> Importar Excel</a>
                      </label> 
                    </div>  
                   </div>
                  </div--> 
                 </div>
                </div> 
               </div>
              </div><!-- fim cartao -->

              <!--?php require_once '../menu_rodape/footer.php'?-->
             </main>
             <!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
             <!-- Optional JavaScript -->
             <!-- jQuery first, then Popper.js, then Bootstrap JS -->
             <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
             <script src="../js/bootstrap.min.js"></script>  
            </body>
            </html>
