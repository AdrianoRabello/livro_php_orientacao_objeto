<?php
	

	/* faz o autoload das classes de acordo com o
	names space, ele inverte as barras do namespce. 
	OBSERVAÇÂO: a caminho do diretorio de ve estar semelhante
	ao do name space*/
	spl_autoload_register(function($class){
	require_once(str_replace('\\','/',$class.'.php'));
	});
 ?>
