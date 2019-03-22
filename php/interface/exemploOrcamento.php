<?php 
	
	use Inter\Classes\Orcamento;
	use Inter\Classes\Produto;

	require 'Classes/Orcamento.php';
	require 'Classes/Produto.php';



	$o = new Orcamento;

	$o->adiciona(new Produto('Maquina de café expresso',1,150),1);
	$o->adiciona(new Produto('Placa de vídeo',1,899),1);

	print $o->calcularTotal();

 ?>