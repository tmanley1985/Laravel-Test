<?php

namespace Manley\Templatr\GUILibrary;

use \Illuminate\Support\Collections;

class Textfield
{
	/**
	 * Creates an html input tag.
	 * 
	 * @param  string $name The name attribute.
	 * @param  string $placeholder The text content.
	 * @param  array $options The classlist.
	 * @return resource
	 */
	public static function make(string $name, string $placeholder, array $options)
	{
		$classList = collect($options)->implode(' ');

		return view('templatr::textfield', compact('name', 'placeholder', 'classList'));

	}
}