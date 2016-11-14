@extends('layouts.app')

@section('content')

	<div class="books-container">
		

		<div class="book">
			<h2>Title</h2>
		</div>
		<div class="book">
			<div class="author">{{ $bookshelf->title }}</div>
		</div>


		@if(isset($bookshelf_books))
			<h2>Books</h2>
			@foreach($bookshelf_books as $bookshelf_book)
				<div class="book">

					<div>{{ $bookshelf_book->title }}</div>
				</div>
			@endforeach

		@endif

		@if(isset($books))
			<form class="form-horizontal" role="form" method="POST" action="/bookshelves/{{$bookshelf->id}}/add">
	            {{ csrf_field() }}

	            <div class="form-group">
	                <label for="books" class="col-md-4 control-label">Select Books To Add</label>

	                <div class="col-md-6">
	                    <select name="books[]" class="selectpicker" multiple title="Choose one or more of the following...">

			 				@foreach($books as $book)
			 					<option value="{{$book->title}}">{{$book->title}}</option>
			 				@endforeach
						</select>
	                </div>
	            </div>

	          
	            <div class="form-group">
	                <div class="col-md-8 col-md-offset-4">
	                    <button type="submit" class="btn btn-primary">
	                        Add Books
	                    </button>
	                </div>
	            </div>
	        </form>
	    @endif
	
	</div>
	

@endsection