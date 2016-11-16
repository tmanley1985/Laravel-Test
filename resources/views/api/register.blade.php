@extends('api.api')

@section('content')


    <div class="container">
        
	    <h2>Register for a public api key and shared secret!</h2>

    	<form class="form-horizontal" role="form" method="POST" action="{{ url('/api-register') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="consumer_name" class="col-md-4 control-label">Consumer Name</label>

                    <div class="col-md-6">
                        <input id="consumer_name" type="consumer_name" class="form-control" name="consumer_name" placeholder="consumer_name" required autofocus>
                    </div>
                </div>

               

              

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>

                      
                    </div>
                </div>
            </form>
    </div>

@endsection