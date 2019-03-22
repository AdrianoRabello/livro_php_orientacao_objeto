<?php

	// para funcionar as classes do framework eu tenho que fazer um require do arquivo 
	//que esta dentro de outro diretorio juntamente com a declaração do namestapce que o mesmo utiliza. Igual ao exemplo a baixo
	//
	//
	//require_once '../../Lib/Livro/Database/Record.php';
	use Livro\Database\Record;

	class Cidade extends Record{

		// não tenho a tabela cidade no BD 
		const TABLENAME = "cidade";

	}

 ?>
