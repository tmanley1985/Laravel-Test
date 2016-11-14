@extends('layouts.app')

@section('content')

	<div class="books-container">
		<div class="book">
			<div>Author</div>
			<div>Genre</div>
			<div>Title</div>
			<div>Edit</div>
			<div>Delete</div>
		</div>
		@foreach($books as $book)

			<div class="book">
				<a href="/books/{{$book->id}}">{{ $book->author->name }}</a>
				<div class="genre">{{ $book->genre->type }}</div>
				<div class="title">{{ $book->title }}</div>

				<a href="{{route('books.edit', ['id' => $book->id])}}">Edit</a>

				<form method="POST" action="{{action('BooksController@destroy', ['id' => $book->id])}}">
				 	{{ csrf_field() }}

                    <input name="_method" type="hidden" value="DELETE">
					<button class="btn btn-link" type="submit">Delete</button>
				</form>
				
			</div>

		@endforeach

		{{ $books->links() }}
	</div>
	

@endsection