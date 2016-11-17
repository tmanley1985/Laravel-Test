@extends('layouts.app')

@section('content')


	{!! \Manley\Templatr\GuiLibrary\Table::make($table, []) !!}

	{!! \Manley\Templatr\GuiLibrary\link::make($link["target"], $link["text"], $link["options"]) !!}

@endsection