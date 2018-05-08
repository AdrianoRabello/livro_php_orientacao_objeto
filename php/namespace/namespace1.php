<?php 
	
	namespace Aplication;

	class form{}


	namespace Components;
	class form{}

	// sai com o nome do namespace Components pois foi o ultimo a ser declarado  
	var_dump(new Form);

	var_dump(new \Aplication\Form);
 ?>