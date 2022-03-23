<<!DOC  TYPE html>
<html>
<head>
  <title></title>
</head>
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
        location.href = 'todos.ativos.php?acao5=remover&id='+id
      }
    </script>
<body>
  <div class="container">
    <div class="d-flex justify-content-center mt-5">
      <div class="card" style="width: 36rem;">
        <div class="card-body">

          <div class="d-flex justify-content-center">
            <img src="../imagens/LOGO_SEM_FUNDO.png">
          </div>

          <div class="row">
            <div class="col">
              <!--h2>Crie seu usuário</h2--> 
            </div>
          </div>

          <div class="row">
            <div class="col">
              
              <form action="" method="post">
                <div class="form-group">
                  <input name="name" type="text" class="form-control" placeholder="Nome" required>
                </div>
                
                <div name="email" class="form-group">
                  <input type="text" class="form-control" placeholder="E-mail" required>
                </div>

                <div name="senha" class="form-group">
                  <input type="password" class="form-control" placeholder="Senha" required>
                </div>
                
                <div class="mt-4 mb-4">
                  <small class="form-text">
                    Ao cadastrar-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade.
                  </small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>
</html>