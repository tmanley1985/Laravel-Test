@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/books/{{$book->id}}">
                        {{ csrf_field() }}

                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control" name="title" value="{{$book->title}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Author</label>

                            <div class="col-md-6">
                                <input id="author" type="author" class="form-control" name="author" value="{{$book->author->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="genre" class="col-md-4 control-label">Genre</label>

                            <div class="col-md-6">
                                <input id="genre" type="genre" class="form-control" name="genre" value="{{$book->genre->type}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Book
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
