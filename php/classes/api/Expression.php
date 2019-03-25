<?php 

	abstract class Expression{
		const AND_OPERATOR = ' AND ';
		const OR_OPERATOR  = ' OR ';
		const S_OPERATOR  = '  ';
		const L_OPERATOR  = ' , ';

		


		abstract public function dump(); 
	}

 ?>