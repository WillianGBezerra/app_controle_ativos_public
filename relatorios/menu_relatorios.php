<nav class="navbar sticky-top navbar-expand-sm navbar-light bg-primary" >

	        <!--Logo -->
			<!--a href="" class="navbar-brand display-1 text-hide" style="background-image: url('imagens/logo-2.png');background-repeat: no-repeat; width: 100px; height: 50px;">SLC Agrícola</a-->
			
			<a href="home.php?pagina=1"><img class="img-responsive img-fluid img-thumbnai btn-sm" src="../imagens/logo-f-primary-007bff.png" style="width: 8em; height: 2.7em"></a>
	
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
					
					<!--li class="nav-item dropdown"> 
						<a href="" class="nav-link dropdown-toggle btn-sm" data-toggle="dropdown">Novo</a>
						<dir class="dropdown-menu">
							<!--a href="remessa.php?pagina=1&acao8=inserir" class="dropdown-item btn-sm disabled">8 - Remessa</a>
		                    <a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm active">Remessa</a>
		                    <div class="dropdown-divider"></div>
		                    <a href="remessas.pendentes.php?pagina=1" class="dropdown-item btn-sm">Retorno</a>
		                    <div class="dropdown-divider"></div>
		                    <a href="relatorio-remessas-pendentes.php" class="dropdown-item btn-sm">PDF</a>
		                    <a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm">Excel</a>
						</dir>
					</li-->
					<!--li class="nav-item dropdown dropdown">
						<a href="" class="nav-link dropdown-toggle btn-sm" data-toggle="dropdown">Retorno</a>
						<dir class="dropdown-menu">
							<a href="retorno.php?pagina=1&acao8=inserir" class="dropdown-item btn-sm disabled">9 - Retorno</a>
		                    <div class="dropdown-divider"></div>
		                    
		                    <div class="dropdown-divider"></div>
		                    <a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm">Excel</a>
		                    <a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm">PDF</a>
						</dir-->
					<!--/li-->
					<li class="nav-item dropdown dropleft">
						<a href="" class="nav-link dropdown-toggle btn-sm" data-toggle="dropdown">Menu</a>
						<dir class="dropdown-menu">
							<!--a href="remessa.php?pagina=1&acao8=inserir" class="dropdown-item btn-sm disabled">8 - Remessa</a-->
							<a class="nav-link dropdown" style="font-size: 0.89em;"><strong>Empréstimos</strong></a>
		                    <a href="../obj/todas.remessas.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Remessa</a>
		                    
		                    <!--div class="dropdown-divider"></div-->
		                    <!--a class="nav-link dropdown" style="font-size: 0.89em;"><strong>Retorno</strong></a-->
		                    <!--a href="/app_controle_ativos_public/obj/remessas.pendentes.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Devolver</a--> 
		                    <a href="../obj/todos.retornos.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Devoluções</a>
		                    <!--div class="dropdown-divider"></div-->
		                    <a href="relatorios.php" class="dropdown-item btn-sm" style="font-size: 0.7em;">Relatório</a>
		                    <a href="../obj/uploadExcel.php?acaoImp=1" class="dropdown-item btn-sm " style="font-size: 0.7em;">Importar</a>
		                    <!--a href="todas.remessas.php?pagina=1" class="dropdown-item btn-sm">Excel</a-->
		                    <div class="dropdown-divider"></div>
						<!--/dir->
						<!--a href="" class="nav-link dropdown-toggle btn-sm" 
		                data-toggle="dropdown" >Cadastro</a-->
		                <!--div class="dropdown-menu"-->
		                	<a class="nav-link dropdown" style="font-size: 0.89em;"><strong>Cadastros</strong></a>
		                    <a href="../obj/todos.ativos.php?pagina=1" class="dropdown-item btn-sm " style="font-size: 0.7em;">Ativo</a>
		                    <a href="../obj/uploadExcel.php?acaoImp=2" class="dropdown-item btn-sm " style="font-size: 0.7em;">Importar Ativos</a>
		                    <!--div class="dropdown-divider"></div-->
		                    <!--a class="nav-link dropdown" style="font-size: 0.89em;"><strong>Empresa</strong></a-->
		                    <a href="../obj/todas.empresas.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Empresa</a>
		                    <!--div class="dropdown-divider"></div>
		                    <!--a class="nav-link dropdown" style="font-size: 0.89em;"><strong>Operação Fiscal</strong</a-->
		                    <a href="../obj/todas.opfiscais.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Operação Fiscal</a>
		                    <a href="../obj/todos.cfops.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">CFOP</a>
		                    <!--div class="dropdown-divider"></div>
		                    <a href="todos.status.php?pagina=1" class="dropdown-item btn-sm">Status</a-->
		                    <!--div class="dropdown-divider"></div-->
		                    <a href="../obj/todas.cidades.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Cidades</a>
		                    <a href="../obj/todos.estados.php?pagina=1" class="dropdown-item btn-sm" style="font-size: 0.7em;">Estados</a>
		                    <a href="../obj/todos.paises.php?pagina=1" class="dropdown-item" style="font-size: 0.7em;">Paises</a>
		                	<!--div class="dropdown-divider"></div>
		                    <a href="todos.ativos.php?pagina=1" class="dropdown-item btn-sm active disabled">10 - Usuários</a>
		                    <div class="dropdown-divider"></div-->
		                    <!--a href="todas.empresas.php?pagina=1" class="dropdown-item btn-sm active disabled">11 - Acessos</a-->
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