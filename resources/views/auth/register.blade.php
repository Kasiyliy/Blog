<!DOCTYPE html>
<html>
<head>
    @include('layouts.ahead')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Skill</b>SHARE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Register</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Name') }}</label>
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               placeholder="Enter name:"
                               name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email"
                               placeholder="Email:"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password"
                               placeholder="Password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm"
                               placeholder="Confirm password"
                               type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>

            <p class="mb-0">
                <a href="{{route('login')}}" class="text-center">Already have an account? Sign in</a>
            </p>
            <p class="mb-0">
                <a href="{{route('index')}}" class="text-center">Go to system</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

@include('layouts.ascripts')

</body>
</html>
