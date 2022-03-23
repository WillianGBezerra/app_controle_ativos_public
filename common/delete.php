<?php if( isset($_GET['error']) && $_GET['error'] == 'faleidtodelete') { ?>
  <div class="bg-danger pt-2text-white d-flex justify-content-center">
    <h5 class="lead">Registro não pode ser deletado!</h5>
  </div>
<?php } ?>
<?php if( isset($_GET['delete']) && $_GET['delete'] == 'success') { ?>
  <div class="bg-success pt-2text-white d-flex justify-content-center">
    <h5 class="lead">Registro deletado com sucesso!</h5>
  </div>
<?php } ?>