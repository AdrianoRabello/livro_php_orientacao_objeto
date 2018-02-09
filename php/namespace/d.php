<?php 

	require 'a.php';
	require 'b.php';

	use Aplication\Form as Form;
	use Aplication\Field as Field;

	echo "<pre>";

	var_dump(new Form);
	var_dump(new Field);


	use Components\Form as ComponentForm;


	var_dump(new ComponentForm);
	var_dump(new Aplication\Field);
	var_dump(new Components\Form);



	





 ?>