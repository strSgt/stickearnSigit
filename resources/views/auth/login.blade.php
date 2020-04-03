
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="{{URL::asset('asset/img/fla.png')}}" rel='shortcut icon'>
 <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/bootstrap.min2.css')}}">
 <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/style.css')}}">
</head>

<body>
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">            
                 <img class="profile-img" src="{{URL::asset('asset/img/fla.png')}}"
                    alt="">
            <h1 class="text-center login-title">Welcome</h1>
            <h1 class="text-center login-title">Word Scrambler Application</h1>
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">
                    <form method="POST" class="form-signin" action="{{ route('login') }}">
                        @csrf

                       <!--  <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           <!--  </div>
                        </div> -->

                        <!-- <div class="form-group row"> -->
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <!-- <div class="col-md-6"> -->

                                <br>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        <!-- </div> -->

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                <br>
                            <a href="{{url('register')}}" class="btn btn-md btn-warning">Register</a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
</div>
</div>
</body>
</html>
