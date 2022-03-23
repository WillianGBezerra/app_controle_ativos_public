<?php 
	//$total = $numero_paginas;
	//$total_registros_atual = $reg_pagina_atual;
	//$total_reg = $total_registros;
	if ($pagina < $numero_paginas) {
		$total_em_tela = $pagina *$itens_por_pagina;
	} else if ($pagina = $numero_paginas) {
		//$total_em_tela = $total_registros - (($pagina - 1) * $total_registros);
		$total_em_tela = ($total_registros - ($itens_por_pagina *($pagina-1))) + (($pagina - 1) * $itens_por_pagina); 
	}
	require "../menu_rodape/footer.php"
?>