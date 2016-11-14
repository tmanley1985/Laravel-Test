@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Book</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/books') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control" name="title" placeholder="title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Author</label>

                            <div class="col-md-6">
                                <input id="author" type="author" class="form-control" name="author" placeholder="author" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="genre" class="col-md-4 control-label">Genre</label>

                            <div class="col-md-6">
                                <input id="genre" type="genre" class="form-control" name="genre" placeholder="genre" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Book
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
