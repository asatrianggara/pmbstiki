<?php

class Dosen extends CI_Controller
{
	public function index()
	{
		/*echo $value;*/

		for ($i=1; $i > -5 ; $i--) { 
			echo $i;
		}

		$array = array(0.1=> 'a');

		echo count($array);
	}
}