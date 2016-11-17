<?php

namespace Manley\Templatr\GUILibrary;

use \Illuminate\Support\Collections;

class Table
{
	/**
	 * @param  array $table Associative array where keys are columns.
	 * @param  array $options Array 
	 * @return [type]
	 */
	public static function make(array $table, array $options)
	{
		

		$table = collect($table);



		$columns = $table->keys()->all();

		$rows = $table->transpose();

		return view('templatr::table', compact('columns', 'rows'));

	}
}