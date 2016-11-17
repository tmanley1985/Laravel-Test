<?php

namespace Manley\Templatr\GUILibrary;

use \Illuminate\Support\Collections;

class Link
{
	/**
	 * @param  string $target The href.
	 * @param  string $text The text to display.
	 * @param  array $options Classes to use.
	 * @return resource
	 */
	public static function make(string $target, string $text, array $options = [])
	{
		$classList = collect($options)->implode(' ');
	
		return view('templatr::link', compact('target', 'text', 'classList'));

	}
}