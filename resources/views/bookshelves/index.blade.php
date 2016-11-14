@extends('layouts.app')

@section('content')

	<div class="books-container">
		<div class="book">
			<div>Title</div>
			<div>Edit</div>
			<div>Delete</div>
		</div>
		@foreach($bookshelves as $bookshelf)

			<div class="book">
				
				<a href="/bookshelves/{{$bookshelf->id}}">{{ $bookshelf->title }}</a>

				<a href="{{route('bookshelves.edit', ['id' => $bookshelf->id])}}">Edit</a>

				<form method="POST" action="{{action('BookshelfController@destroy', ['id' => $bookshelf->id])}}">
				 	{{ csrf_field() }}

                    <input name="_method" type="hidden" value="DELETE">
					<button class="btn btn-link" type="submit">Delete</button>
				</form>
				
			</div>

		@endforeach
	</div>
	

@endsection