<?php
$view = 'todos.ativos';

$Selected = isset($_GET['Selected']) ? $_GET['Selected'] : '';
$termo = isset($_GET['termo']) ? $_GET['termo'] : '';


$acao5 = isset($_GET['acao5']) ? $_GET['acao5'] : 'recuperar';
require "../controller/ativo_controller.php";


$conteudoPesq = '';
$ValueconteudoSelect = 0;
$conteudoSelect = '';

if ($Selected == 1) {
  $conteudoSelect = 'Descrição';
  $ValueconteudoSelect = 1;
  $conteudoPesq = $termo;
} else if ($Selected == 2) {
  $conteudoPesq = $termo;
  $conteudoSelect = 'EAM';
  $ValueconteudoSelect = 2;
} else if ($Selected == 3) {
  $conteudoSelect = 'Chassi';
  $conteudoPesq = $termo;
  $ValueconteudoSelect = 3;
} else if ($Selected == 4) {
  $conteudoPesq = $termo;
  $conteudoSelect = 'Ativo';
  $ValueconteudoSelect = 4;
} else if ($Selected == 5) {
  $conteudoPesq = $termo;
  $conteudoSelect = 'Placa';
  $ValueconteudoSelect = 5;
} else if ($Selected == 6) {
  $conteudoPesq = $termo;
  $conteudoSelect = 'Proprietario';
  $ValueconteudoSelect = 6;
} else if ($Selected == 7) {
  $conteudoPesq = $termo;
  $conteudoSelect = 'Categoria';
  $ValueconteudoSelect = 7;
}

?>
<?
$acao6 = 'recuperar';
require "../controller/empresa_controller.php";
?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=0.5, shrink-to-fit=no">
   <title>App Remessa -> Ativos</title>


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
    function toggleZoomScreen() {
     document.body.style.zoom = "80%";
   } 
    </script>

    <script>

      //Excluir registro tabela tb_ativos
      function excluir(id) {
        location.href = 'todos.ativos.php?acao5=remover&id='+id
      }

      function pesquisarporempresa (txtid) {
        var txtid = document.getElementById('empresa_id').value;
        location.href = 'todos.ativos.php?acao5=recuperarPorEmpresa&txtid='+txtid+'&pagina=1'
      }

      //Função para pesquisa com todos os campos da tabela tb_ativos
      function pesquisarporativo (acao5, Selected, txt_descricao, txt_eam, txt_chassi, txt_ativo, txt_placa, txt_empresa) {

        var $Selected = document.getElementById("pesqativo").value;
        var $termo = document.getElementById("inputpesqativo").value;
        
        if ($Selected == 0) { 
          location.href = 'todos.ativos.php?&pagina=1'
        } else if ($Selected == 1) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        } else if ($Selected == 2) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        else if ($Selected == 3) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        else if ($Selected == 4) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        else if ($Selected == 5) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        else if ($Selected == 6) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        else if ($Selected == 7) { 
          location.href = 'todos.ativos.php?acao5=recuperarColuna&termo='+$termo+'&Selected='+$Selected+'&pagina=1'
        }
        
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
          <!--form class="form-inline">
            <div class="input-group">
              <select name="empresa_id" class="custom-select" id="empresa_id" value="empresa_id" aria-label="Selecione uma empresa"  required style="font-size: 0.9em">
                <option selected="true" id="empresa_id" value=""></option>
                <?php 
                $acao6 = 'recuperar2';
                require_once '../controller/empresa_controller.php';
                foreach($empresas as $key => $empresa):  ?>
                <option name="empresa_id" value="<?= $empresa->id?>"><?= $empresa->nome_fantasia ?></option>
                <?php endforeach; ?>
              </select>
              <div class="input-group-append">
                <button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorempresa" onclick="pesquisarporempresa()" style="font-size: 0.9em">Ok</button>
              </div>
            </div>
          </form-->
          <form class="form-inline" method="" id="formTableAtivos" action="">
            <div class="input-group">
              <select class="custom-select sm" name="pesqativo" id="pesqativo" aria-label="Selecione uma opção de pesquisa" style="font-size: 0.9em">
                <option value="<?= $ValueconteudoSelect ?>" selected><?= $conteudoSelect ?></option>
                <option value="1" aria-label="Pesquisar por Descrição do Ativo">Descrição</option>
                <option value="2" aria-label="Pesquisar pelo número do EAM">EAM</option>
                <option value="3" aria-label="Pesquisar pelo número do chassi">Chassi</option>
                <option value="4" aria-label="Pesquisar pelo número do ativo">Nº FA</option>
                <option value="5" aria-label="Pesquisar pela placa do ativo">Placa</option>
                <option value="6" aria-label="Pesquisar pela placa do ativo">Proprietário</option>
                <option value="7" aria-label="Pesquisar pela placa do ativo">Categoria</option>
              </select>          
              <div class="input-group-append">
                <input type="text" class="form-control" id="inputpesqativo" name="inputpesqativo" value="<?= $conteudoPesq ?>" placeholder="" aria-label="" style="font-size: 0.9em">
                <button class="btn btn-outline-primary btn-sm" type="button" id="pesqPorcamposTabel" onclick="pesquisarporativo()" style="font-size: 0.9em">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                   <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
              </div>
            </div>
          </form>
          <div class="card  ml-auto">
           <a href="ativo.php?acao5=inserir" target="_parent"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Novo Ativo" type="button" style="font-size: 0.9em">Novo Registro</button></a>
          </div>
        </nav>      
      </div>
      <div class="card card-columns" style="height: 45.75em; padding: 0em; border:;">
        <div class="card bg-light border-light md-2 font-weight-light">
          <div class="card-body" style="height: 45.37em;"> 
            <h5 class="card-title text-left" style="margin-bottom:; color: #22142b;">Ativos</h5>
            <div class="" style="background-color:;">
              <div style="" id="ativos">
                <table class="table table-striped table-responsive-sm table-condensed table-sm text-center table-bordered table-hover" style="margin-top: 0em;font-size: 0.9em;">
                  <thead>
                    <tr>
                      <th class="text" scope="col" style="width: 4em;">Id</th>
                      <th class="text" scope="col" style="width: 15em;">Ativo</th>
                      <th class="text" scope="col" style="width: 50em;">Descrição</th>
                      <th class="text" scope="col" style="width: 10em;">Placa</th>
                      <th class="text" scope="col" style="width: 20em;">Chassi</th>
                      <th class="text" scope="col" style="width: 10em;">EAM</th>
                      <th class="text" scope="col" style="width: 15em;">Categoria</th> 
                      <th class="text" scope="col" style="width: 28em;">Proprietário</th> 
                      <th class="text" scope="col" style="width: 8;">Remessa Pendente</th> 
                      <!--th class="" scope="col" colspan="2" style="width: 4em;"></th--> 
                      <th class="text-" scope="col" style="width: 3em;">Editar</th> 
                      <th class="text-" scope="col" style="width: 3em;">Excluir</th>
                      <th class="text-" scope="col" style="width: 3em;">Comodato</th>
                      <!--th class="" scope="col" style="width: 3em;">Excluir</th-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($ativos as $key => $ativo): ?>
                      <tr>
                        <div class="col-sm-9" id="<?= $ativo->id ?>">
                          <!--Form para atualzar ativo-->
                          <form method="post" action="ativo.php?acao5=atualizar">
                            <td><input type="hidden" name="id" value="<?= $ativo->id ?>"><?= $ativo->id ?></td>
                            <td><input type="hidden" name="ativo" value="<?= $ativo->ativo ?>"><?= $ativo->ativo ?></td>
                            <td><input type="hidden" name="descricao" value="<?= $ativo->descricao ?>"><?= $ativo->descricao ?></td>
                            <td><input type="hidden" name="placa" value="<?= $ativo->placa ?>"><?= $ativo->placa ?></td>
                            <td><input type="hidden" name="chassi" value="<?= $ativo->chassi ?>"><?= $ativo->chassi ?></td>
                            <td><input type="hidden" name="eam" value="<?= $ativo->eam ?>"><?= $ativo->eam ?></td>
                            <input type="hidden" name="categoria_id" value="<?= $ativo->categoria_id?>"></input>
                            <td><input type="hidden" name="categoria" value="<?= $ativo->categoria ?>"><?= $ativo->categoria ?></td>
                            <td><input type="hidden" name="nome_fantasia" value="<?= $ativo->nome_fantasia?>"><?= $ativo->nome_fantasia?></td>
                            <?php if( $ativo->bloqueio == 1) { ?>
                             <td><input type="hidden" name="bloqueio" value="<?= $ativo->bloqueio?>"></input>Não</td>
                            <?php } ?>
                              <?php if ($ativo->bloqueio ==  2) { ?>
                              <td><input type="hidden" name="bloqueio" value="<?= $ativo->bloqueio?>"></input>Sim</td>
                              <?php } ?>
                              <input type="hidden" name="empresa_id" value="<?= $ativo->empresa_id?>"></input>
                              <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="atualizar" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                              <?php if( $ativo->bloqueio == 1) { ?>
                              <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="Excluir" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="button" onclick="excluir(<?= $ativo->id?>)"><i class="fas fa-trash-alt fa-lg text-danger"></i></button></td>
                              <?php } ?>
                              <?php if ($ativo->bloqueio ==  2) { ?>
                              <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="Existe remessa pendente" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="button" onclick="excluir(<?= $ativo->id?>)" disabled><i class="fas fa-trash-alt fa-lg text-danger"></i></button></td>
                            <?php } ?>
                            <!--td><i class="fas fa-trash-alt fa-lg text-danger" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="excluir(<?= $ativo->id?>)"></i></td-->
                          </form>
                          <!--Form para criar remessa-->
                          <form method="post" action="remessa.php?acao8=inserir&start=2">
                            <input type="hidden" name="id" value="<?= $ativo->id ?>">
                            <input type="hidden" name="ativo" value="<?= $ativo->ativo ?>">
                            <input type="hidden" name="descricao" value="<?= $ativo->descricao ?>">
                            <input type="hidden" name="placa" value="<?= $ativo->placa ?>">
                            <input type="hidden" name="chassi" value="<?= $ativo->chassi ?>">
                            <input type="hidden" name="eam" value="<?= $ativo->eam ?>">
                            <input type="hidden" name="nome_fantasia" value="<?= $ativo->nome_fantasia?>">
                            <input type="hidden" name="empresa_id" value="<?= $ativo->empresa_id?>"></input>
                            <input type="hidden" name="categoria_id" value="<?= $ativo->categoria_id?>"></input>
                            <input type="hidden" name="categoria" value="<?= $ativo->categoria?>"></input>
                            <input type="hidden" name="bloqueio" value="<?= $ativo->bloqueio?>"></input>
                            <?php if( $ativo->bloqueio == 1) { ?>
                              <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="Criar remessa" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit"><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                             <?php } ?>
                              <?php if ($ativo->bloqueio ==  2) { ?>
                              <td><button class="btn btn-sm btn-info btn-outline" data-toggle="tooltip" data-placement="top" title="Existe remessa pendente" style="background-color:rgba(0, 0, 0, 0); border: none;outline: none;" type="submit" disabled=""><i class=" fas fa-edit fa-lg text-info"></i></button></td>
                            <?php } ?>
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
      </div>
      <?php require_once '../menu_rodape/footer.php'?>
    </main>
    <!--script type="text/javascript" src="js/bootstrap.min.js"></script-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script> 
    <script>
       document.addEventListener('keypress', function(e)
       {
          if(e.which == 13){
            // document.getElementById('pesqPorcamposTabel').onclick=pesquisarporativo();
            // Alert('Precionou Enter');
            // document.getElementById('formTableAtivos').submit();
            pesquisarporativo();
          }
        }, false);
      const inputEle = document.getElementById('inputpesqativo');
        inputEle.addEventListener('keyup', function(e){
          var key = e.which || e.keyCode;
          if (key == 13) { // codigo da tecla enter
            pesquisarporativo();
            // document.getElementById('pesqPorcamposTabel').onclick();
            // alert('carregou enter o valor digitado foi: ' +this.value); 
          }
        });

    </script> 
  </body>
</html>
