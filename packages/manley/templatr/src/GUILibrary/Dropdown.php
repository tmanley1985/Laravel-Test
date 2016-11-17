<?php

namespace Manley\Templatr\GUILibrary;

use \Illuminate\Support\Collections;

class Dropdown
{
	/**
	 * @param  array $dropdown Multidimensional array of columns and rows.
	 * @param  array $options Classlist.
	 * @return resource
	 */
	public static function make(array $dropdown, array $options)
	{
		$classList = collect($options)->implode(' ');

		return view('templatr::dropdown', compact('dropdown', 'classList'));

	}
}