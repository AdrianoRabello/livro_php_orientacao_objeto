<?php 

	

	require_once 'a.php';
	

	/* para poder usar o namespace eu preciso importar o arquivo e tambem usar o operador use. Nesse caso a cada use eu utilizo uma classe */
	use Aplication\Form;

	3use Aplication\Field;
	var_dump(new Form);
	var_dump(new Field);

	$m = new Form;

	$m->escrever("teste");

 ?>