@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Profile</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                   <!--  // foreach ($game as $data) { -->
                <div class="form-group row">
                <label>Nama : {{ $biodata->name }}</label>
                </div>
                <div class="form-group row">
                <label>Email : {{ $biodata->email }}</label>
                </div> 
                <div class="form-group row">
                <label>Benar :  {{ $biodata->benar }} Kali</label>
                </div> 
                <div class="form-group row">
                <label>Salah :  {{ $biodata->salah }} Kali</label>
                </div> 
                <div class="form-group row">
                <label>Score : <b> {{ $biodata->nilai }}</b></label>
                </div>  
                <a href="/Jawaban/{{ $biodata->idUser }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
