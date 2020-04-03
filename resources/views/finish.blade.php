@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b></b></div>

                <!-- <div class="card-body"> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                <!-- <div class="form-group row"> -->
                <center>
                <img src="{{URL::asset('asset/img/congrast.gif')}}">
                <h2>Contratulation!</h2>
                </center>
                </div>
                    
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
