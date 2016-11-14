@extends('layouts.app')

@section('content')

	<div class="books-container">
		

		<div class="book">
			<div class="author">{{ $book->author->name }}</div>
			<div class="genre">{{ $book->genre->type }}</div>
			<div class="title">{{ $book->title }}</div>
		</div>

	
	</div>
	

@endsection