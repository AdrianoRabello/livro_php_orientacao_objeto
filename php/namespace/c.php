<?php 

	

	require_once 'a.php';
	

	/* para poder usar o name space eu preciso importar o arquivo e tambem usar o operador use. Nesse caso a cada use eu usitilizo uma classe */
	use Aplication\Form;

	use Aplication\Field;
	var_dump(new Form);
	var_dump(new Field);

	$m = new Form;

	$m->escrever("teste");

 ?>