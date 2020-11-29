@extends('frontendtemplate')
<link rel="stylesheet" type="text/css" href="{{asset('frontend_asset/assets/style.css')}}">
@section('content')
<div class="bg-img">
    <div class="content">
        <header>Login From</header>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="field">
                <span class="fa fa-user"></span>
                <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input id="password" type="password" name="password" class="password @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Your Password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pass">
                <a href="#">Forgot Password?</a>
            </div>
            <div>
                <button type="submit" class="form-control btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="link">
                <div class="facebook">
                    <a href="https://web.facebook.com/kawe.lay.127/"><i class="fab fa-facebook-f"><span>Fackbook</span></i></a>
                </div>
                <div class="instagram">
                    <a href="https://www.instagram.com/kawe.lay.127/?hl=en"><i class="fab fa-instagram"><span>Instagram</span></i></a>
                </div>
            </div>
            <div class="create">Don't have account?
                <a href="{{route('signuppage')}}">Create Form</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('my_asset/custom.js')}}"></script>
    <script src="https://kit.fontawesome.com/532f1fcad3.js" crossorigin="anonymous"></script>
@endsection