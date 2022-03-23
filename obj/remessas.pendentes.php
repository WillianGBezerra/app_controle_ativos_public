<?php
$view = 'todas.remessas';
	//$acao8 = 'recuperar';  
$acao8 = isset($_GET['acao8']) ? $_GET['acao8'] : 'recuperar';  
$data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : 0;
$data_final = isset($_GET['data_final']) ? $_GET['data_final'] : 0;
$nfe = isset($_GET['nfe']) ? $_GET['nfe'] : 0;
$ativoopcao = isset($_GET['ativoopcao']) ? $_GET['ativoopcao'] : 0;
$ativo_chassi = isset($_GET['ativo_chassi']) ? $_GET['ativo_chassi'] : 0;

require "../controller/remessa_controller.php";
  //$ativo_chassi = isset($_GET['ativo_chassi']) ? $_GET['ativo_chassi'] : $ativo_chassi;
?>
<?
$acao6 = 'recuperar';
require "../controller/empresa_controller.php";

$acao5 = 'recuperar';
require "../controller/ativo_controller.php";

$acao4 = 'recuperar';
require "../controller/opfiscal_controller.php";
?>

<?php 
  /*echo '<pre>';
  print_r($ativos);
  echo '</pre>';*/
  ?>
  
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>App CFA - Retorno</title>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
<script>
  function excluir(id) {
    location.href = 'todos.ativos.php?acao8=remover&id='+id
  }
</script>
<script>
      //Função para pesquisa com intervalo de datas
      function pesquisarpordata(acao8, data_inicial, data_final) {
        //$acao8 = recuperarbydate;
        var data_inicial = document.getElementById("data_inicial").value;
        var data_final = document.getElementById("data_final").value;
        location.href = 'remessas.pendentes.php?acao8=recuperarbydate&data_inicial='+data_inicial+'&data_final='+data_final+'&pagina=1'
      }
      //Função para pesquisa por número de nota fiscal
      function pesquisarpornfe(acao8, nfe) {
        //$acao8 = recuperarbydate;
        var nfe = document.getElementById("nfe").value;
        location.href = 'remessas.pendentes.php?acao8=recuperarbynfe&nfe='+nfe+'&pagina=1'
      }
      //Função para pesquisa por número do chassi
      function pesquisarporativo(acao8, ativoopcao, ativo_chassi) {
        //$acao8 = recuperarbychassi;
        var ativoopcao = document.getElementById("pesqativo").value;
        var ativo_chassi = document.getElementById("inputpesqativo").value;
        location.href = 'remessas.pendentes.php?acao8=recuperarPorAtivo&ativo_chassi='+ativo_chassi+'&ativoopcao='+ativoopcao+'&pagina=1'
      }
    </script>
  </head>
  <body>
    <?php
    require_once '../menu_rodape/menu.php'
    ?>
    <main role="main" style="margin-bottom: -1px;padding: 0.2em;">
      <div class="card" style="margin-bottom: 1em;">
        <nav class="navbar navbar-expand-lg mavbar-light bg-light">
        <!--form class="form-inline">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="" aria-label="" id="inputPesquisa">
              <div class="input-group-append">
                <button class="btn btn-outline-primary" onclick="pesquisar()" type="button">Pesquisar</button>
              </div>
          </div>
        </form-->
        <!--form class="form-inline" method="post" action="../controller/remessa_controller.php?acao8=recuperarPorAtivo">  
          <div class="input-group">
            <select class="custom-select" id="pesqPorempresa" aria-label="Exemplo de select com botão addon" style="font-size: 0.9em">
              <option selected>Todas</option>
              <option value="1">Faz. Paladino</option>
              <option value="2">Faz. Panorama</option>
              <option value="2">Faz. Paplona</option>
              <option value="2">Faz. Planeste</option>
              <option value="2">Faz. Piratini</option>
            </select>
          
            <div class="input-group-append">
              <button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorempresa" style="font-size: 0.9em"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
                <select class="custom-select" id="inputGroupSelect04" aria-label="Exemplo de select com botão addon" style="font-size: 0.9em">
                  <option selected>Operação</option>
                  <option value="1">Comodato</option>
                  <option value="2">Emprestímo</option>
                  <option value="2">Locação</option>
                </select>
            </div>
          </div>
        </form-->
        <div class="input-group-append">
          <form class="form-inline" method="" action="../controller/remessa_controller.php?acao8=recuperarPorAtivo">
            <div class="input-group">
             <select class="custom-select sm" name="pesqativo" id="pesqativo" aria-label="Selecione uma opção de pesquisa" style="font-size: 0.9em">
              <option value="0"></option>
              <option value="1" aria-label="Pesquisar por item">Item</option>
              <option value="2" aria-label="Pesquisar por Descrição do Ativo">Descrição</option>
              <option value="3" aria-label="Pesquisar pelo número do EAM">EAM</option>
              <option value="4" aria-label="Pesquisar pelo número do chassi">Chassi</option>
              <option value="5" aria-label="Pesquisar pelo número do ativo">Nº FA</option>
              <option value="6" aria-label="Pesquisar pela placa do ativo">Placa</option>
            </select>          
            <div class="input-group-append">
              <input type="text" class="form-control" id="inputpesqativo" name="inputpesqativo" placeholder="" aria-label="" style="font-size: 0.9em">
              <button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorcamposTabel" onclick="pesquisarporativo()" style="font-size: 0.9em"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
               <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
             </svg></button>
           </div>
         </div>
       </form>
     </div>
     <div class="input-group-append">
      <form class="form-inline" method="" action="../controller/remessa_controller.php?acao8=recuperarbydate">  
        <div class="input-group">
          <input type="date" class="form-control" placeholder="" aria-label="" name="data_inicial" id="data_inicial" style="font-size: 0.9em"> 
          <input type="date" class="form-control" placeholder="" aria-label="" name="data_final" id="data_final" style="font-size: 0.9em">       
          <div class="input-group-append">
            <!--input type="text" class="form-control" placeholder="" aria-label="" style="font-size: 0.9em"-->
            <button class="btn btn-outline-primary btn-sm" type="button" onclick="pesquisarpordata()" id="pesqPorcamposTabel" style="font-size: 0.9em"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
             <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
             <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z"/>
           </svg>
         </button>
         <!--a href="remessa.php?acao8=inserir" target="_parent"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Novo Ativo" type="button" style="font-size: 0.9em">Pesquisar</button></a-->
       </div>
     </div>
   </form>
 </div>
 <div class="input-group-append">
  <form class="form-inline" method="" action="../controller/remessa_controller.php?acao8=recuperarbynfe">  
    <div class="input-group">
      <input type="text" class="form-control" placeholder="" aria-label="" name="nfe" id="nfe" style="font-size: 0.9em">   
      <div class="input-group-append">
        <!--input type="text" class="form-control" placeholder="" aria-label="" style="font-size: 0.9em"-->
        <button class="btn btn-outline-primary btn-sm" type="button" onclick="pesquisarpornfe()" id="pesqPorcamposTabel" style="font-size: 0.9em"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
          <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
        </svg>
      </button>
      <!--a href="remessa.php?acao8=inserir" target="_parent"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Novo Ativo" type="button" style="font-size: 0.9em">Pesquisar</button></a-->
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
    <a href="remessa.php?acao8=inserir" target="_parent"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Nova remessa" type="button" style="font-size: 0.9em">Novo</button></a> 
  </div>
</div>
</nav>      
</div>
<div class="card card-columns" style="height: 44em; padding: 0px; border:;">
  <div class="card bg-light border-light md-2 font-weight-light">
    <div class="card-body">
      <h5 class="card-title text-left">Remessas sem Devolução</h5>
      <div class="">
        <div style="" id="ativos">
          <table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;">
            <thead>
              <tr>
                <th class="text" scope="col" style="width: 3em;">Id</th>
                <th class="text" scope="col" style="width: 15em;">Operação Fiscal</th>
                <th class="text-" scope="col" style="width: 13em;">Origem</th>
                <th class="text-" scope="col" style="width: 13em;">Destino</th>
                <th class="text-" scope="col" style="width: 50em;">Ativo</th>
                <th class="text-" scope="col" style="width: 10em;">NFe</th>
                <th class="text-" scope="col" style="width: 10em;">Valor</th> 
                <th class="text-" scope="col" style="width: 10em;">Emissão</th>
                <th class="text-" scope="col" style="width: 10em;">Entrada</th>
                <th class="text-" scope="col" style="width: 10em;">Prazo</th>   
                <th class="" scope="col" colspan="2" style="width: 2em;">Devolver</th>  
                <!--th class="" scope="col" style="width: 3em;">Excluir</th-->
              </tr>
            </thead>
            <tbody>
              <?php foreach($remessas as $key => $remessa): ?>
                <tr>
                  <div class="col-sm-9" id="<?= $remessa->id ?>">
                    <form method="post" action="retorno.php?acao9=inserir">
                      <td><input type="hidden" name="id" value="<?= $remessa->id ?>"><?= $remessa->id ?></td>
                      <td><input type="hidden" name="opfiscal_id" value="<?= $remessa->opfiscal_id ?>"><?= $remessa->opdescricao ?></td>
                      <input type="hidden" name="opfiscal" value="<?= $remessa->prazo?>-<?= $remessa->sigla_op_fiscal ?>"></input>
                      <td><input type="hidden" name="origem_id" value="<?= $remessa->origem_id ?>"><?= $remessa->origem ?></td>
                      <input type="hidden" name="origem" value="<?= $remessa->origem ?>"></input>
                      <td><input type="hidden" name="destino_id" value="<?= $remessa->destino_id ?>"><?= $remessa->destino ?></td>
                      <input type="hidden" name="destino" value="<?= $remessa->destino ?>"></input>
                      <td><input type="hidden" name="ativo_id" value="<?= $remessa->ativo_id ?>"><?= $remessa->ativo ?> - <?= $remessa->descricao ?> - <?= $remessa->placa ?> - <?= $remessa->eam ?> - <?= $remessa->chassi ?></td>
                      <input type="hidden" name="ativo" value="<?= $remessa->ativo ?>-<?= $remessa->descricao ?>-<?= $remessa->placa ?>-<?= $remessa->eam ?>-<?= $remessa->chassi ?>"></input>
                      <td><input type="hidden" name="notafiscal" value="<?= $remessa->notafiscal ?>"><?= $remessa->notafiscal ?></td>
                      <td><input type="hidden" name="valor" value="<?= $remessa->valor?>">R$ <?= number_format($remessa->valor, 2,',','.')?></td>
                      <td><input type="hidden" name="emissao" value="<?= $remessa->emissao?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->emissao)))?></td>
                      <td><input type="hidden" name="entrada" value="<?= $remessa->entrada?>"><?=date('d/m/Y', strtotime('+0 days', strtotime($remessa->entrada))) ?></td>
                      <td><input type="hidden" name="retorno" value="<?= $remessa->retorno?>"><?= date('d/m/Y', strtotime('+0 days', strtotime($remessa->retorno)))?></td>
                      
                      <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                                    <!--i class="fas fa-trash-alt fa-lg text-danger" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="excluir(<?= $remessa->id?>)"></i></td>
                                    <!--td><i class="fas fa-edit fa-lg text-info" type="submit" onclick="editar(<?= $estado->id ?>, '<?= $estado->estado ?>','<?= $estado->sigla ?>', '<?= $estado->pais_id ?>')"></i></td>
                                      <!--td><i class="fas fa-check-square fa-lg text-success"></i></td-->
                                    </form>
                                  </div>
                                </tr> 
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
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
