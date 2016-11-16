@extends('api.api')

@section('content')

	<h2>Here are your credentials:</h2>

    <div class="col-xs-12.col-md-8.col-md-offset-2">
        <div class="flex-column">
            <h3>Your public api-key:</h3>
            <h5>{{ $consumer->api_key }}</h5>

            <h3>Your Shared Secret:</h3>
            <h5>{{ $consumer->secret }}</h5>
        </div>
    </div>

@endsection