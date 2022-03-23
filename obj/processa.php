<?php
	
	require_once "../../../app_controle_ativos/conexao.php";
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);

	//Verifica se o usuario selecionou um arquivo xml
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DOMDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);

		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);

		$primeira_linha = true;

		foreach($linhas as $linha){
			if($primeira_linha == false){
				$pais_nome = $linha->getElementsByTagName("Data")->Item(0)->nodeValue;
				echo "pais_nome: $pais_nome <br>";

				$pais_sigla = $linha->getElementsByTagName("Data")->Item(1)->nodeValue;
				echo "pais_sigla: $pais_sigla <br>";
				echo "<hr>";

				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO tb_pais (pais_nome, pais_sigla) VALUES ('$pais_nome', '$pais_sigla')";
				$resultado_usuario = mysqli_query($conexao, $result_usuario);
			}
			$primeira_linha = false;
		}


	}		
?>