@extends('layouts.app')

@section('content')

	{!! \Manley\Templatr\GuiLibrary\Dropdown::make($dropdown["links"], $dropdown["classList"]) !!}

	{!! \Manley\Templatr\GuiLibrary\Table::make($table, []) !!}

	{!! \Manley\Templatr\GuiLibrary\Link::make($link["target"], $link["text"], $link["options"]) !!}

	<div class="container">
		
		<form>
			<div class="form-group">

			{!! \Manley\Templatr\GuiLibrary\Label::make($label["for"], $label["label"], $label["classList"]) !!}
				
			{!! \Manley\Templatr\GuiLibrary\Textfield::make($input["name"], $input["placeholder"], $input["classList"]) !!}
			</div>
			
			<button type="submit" class="btn btn-default">Submit</button>
		</form>

	</div>

@endsection