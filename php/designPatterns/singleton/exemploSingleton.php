<?php 
	
	require_once "classes/Preferencias.php";

	$p1 = Preferencias::getInstance();

	print $p1->getData('language')."<br>";
	print $p1->setData('language','pt');
	print $p1->getData('language')."<br>";


	$p2 = Preferencias::getInstance();
	print $p2->getData('language')."<br>";
	/*$p2->setData('language','en');
	print $p2->getData('language')."<br>";
	$p2->save();*/
 ?>