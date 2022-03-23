<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark" >

	        <!--Logo -->
			<a href="../home.php?pagina=1"><img class="img-responsive img-fluid img-thumbnai btn-sm" src="imagens/logo-f-dark-343a40.png" style="width: 8em; height: 2.7em"></a>
	
	        <!-- Menu Hamburguer -->
	        <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <!-- navegacao -->
	        <div class="collapse navbar-collapse" id="navegacao">
	            <ul class="navbar-nav ml-auto">
		            <!--li class="nav-item">
						<a href="home.php" class="nav-link">Home</a>
					</li-->
					
					<li class="nav-item dropdown btn-sm">
						<a href="" class="nav-link dropdown-toggle btn-sm" data-toggle="dropdown">Remessa</a>
						<dir class="dropdown-menu">
							<!--a href="remessa.php" class="dropdown-item">Nova Remessa</a>
		                    <div class="dropdown-divider"></div-->
		                    <a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm active">Todas as Remessas</a>
						</dir>
					</li>
					<li class="nav-item dropdown btn-sm">
						<a href="" class="nav-link dropdown-toggle btn-sm" data-toggle="dropdown">Retorno</a>
						<dir class="dropdown-menu">
							<!--a href="retorno.php?pagina=1" class="dropdown-item">Novo Retorno</a-->
		                    <!--div class="dropdown-divider"></div-->
		                    <a href="todos.retornos.php?pagina=1" class="dropdown-item btn-sm active">Todos os Retornos</a>
						</dir>
					</li>
					<li class="nav-item dropdown dropleft btn-sm">
						<a href="" class="nav-link dropdown-toggle btn-sm" 
		                data-toggle="dropdown" >Cadastro</a>
		                <div class="dropdown-menu">
		                    <a href="todos.ativos.php?pagina=1" class="dropdown-item btn-sm active">Ativos</a>
		                    <div class="dropdown-divider"></div>
		                    <a href="empresa.php?pagina=1" class="dropdown-item btn-sm">Empresas</a>
		                    <a href="todas.opfiscais.php?pagina=1" class="dropdown-item btn-sm">Operação Fiscal</a>
		                    <a href="todos.cfops.php" class="dropdown-item btn-sm">CFOP</a>
		                    <div class="dropdown-divider"></div>
		                    <a href="todos.status.php?pagina=1" class="dropdown-item btn-sm">Status</a>
		                    <div class="dropdown-divider"></div>
		                    <a href="todas.cidades.php?pagina=1" class="dropdown-item btn-sm">Cidades</a>
		                    <a href="todos.estados.php?pagina=1" class="dropdown-item btn-sm">Estados</a>
		                    <a href="todos.paises.php?pagina=1" class="dropdown-item btn-sm">Paises</a>
		                </div>
					</li>
					<!--button type="button" class="btn btn-dark btn-sm text-dark disabled="true">Priii</button-->
	            </ul>
	            <!-- Formulário -->
				<form class="form-inline">
					<!--input class="form-control" type="text" name="" placeholder="Search" aria-label="Search">
					<button class="btn btn-primary active">ok</button-->
					
				</form>
	        </div>
	    </nav>