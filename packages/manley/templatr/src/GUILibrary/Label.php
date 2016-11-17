<?php

namespace Manley\Templatr\GUILibrary;

use \Illuminate\Support\Collections;

class Label
{
	/**
	 * Creates an html label tag.
	 * 
	 * @param  string $for The for attribute.
	 * @param  string $label The text content.
	 * @param  array $options The classlist.
	 * @return resource
	 */
	public static function make(string $for, string $label, array $options)
	{
		$classList = collect($options)->implode(' ');

		return view('templatr::label', compact('for', 'label', 'classList'));

	}
}