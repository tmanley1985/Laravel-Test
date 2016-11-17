@extends('layouts.app')

@section('content')


	{!! \Manley\Templatr\GuiLibrary\Table::make($table, []) !!}

	{!! \Manley\Templatr\GuiLibrary\link::make($link["target"], $link["text"], $link["options"]) !!}

	<div class="container">
		
		<form>
			<div class="form-group">

			{!! \Manley\Templatr\GuiLibrary\label::make($label["for"], $label["label"], $label["classList"]) !!}
				
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			</div>
			
			<button type="submit" class="btn btn-default">Submit</button>
		</form>

	</div>
	
@endsection