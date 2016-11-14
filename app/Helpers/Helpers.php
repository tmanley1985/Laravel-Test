<?php

namespace App\Helpers;

class Helpers
{

	/**
	 * @param  array $array Array to change
	 * @return [type]
	 */
	public function castArrayValuesToLowerCase(array $array)
	{
		return array_map(function($item){
			return strtolower($item);
		}, $array);
	}
}