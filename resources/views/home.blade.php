@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="flex-column">
                    <a href="/books">Books</a>
                    <a href="/books/create">Add Book</a>

                    <a href="/bookshelves">Bookshelves</a>
                    <a href="/bookshelves/create">Bookshelves</a>
                    <img src="{{Storage::url(Auth::user()->avatar)}}">
                    <form class="form-horizontal" method="POST" action="/avatars" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input class="form-control" type="file" name="avatar" required autofocus>
                            </div>
                        </div>
                        

                        <button class="btn btn-primary" type="submit">Save Avatar</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
