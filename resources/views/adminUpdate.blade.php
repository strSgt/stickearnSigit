@extends('layoutsAdmin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ $query->id }}">
                      @method('patch')
                      @csrf
                    <div class="form-group row">
                    <div class="col-md-6">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $query->name }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="{{ $query->email }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="password" autofocus>
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Benar</label>
                      <input type="text" name="benar" class="form-control" value="{{ $query->benar }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Salah</label>
                      <input type="text" name="salah" class="form-control" value="{{ $query->salah }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Nilai</label>
                      <input type="text" name="nilai" class="form-control" value="{{ $query->nilai }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">

                  <button type="submit" id="send_form" class="btn btn-primary">
                                    {{ __('Submit') }}
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