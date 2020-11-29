@extends('frontendtemplate')
<link rel="stylesheet" type="text/css" href="{{asset('frontend_asset/assets/style.css')}}">
@section('content')
<div class="bg-img">
    <div class="content">
        <header>Create From</header>
        <form method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="field">
                <span class="fa fa-user"></span>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" autocomplete="name" autofocus placeholder="Your Name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="field space">
                <span class="fa fa-envelope"></span>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input id="password" type="password" name="password" class="password @error('password') is-invalid @enderror" placeholder="Your Password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input id="password-confirm" type="password" name="password_confirmation" class="confirmpassword" placeholder="Your Confirm Password" required autocomplete="new-password">
            </div>
            <div class="space">
                <button type="submit" class="form-control btn btn-primary">
                    {{ __('Register') }}
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
            <div class="create">Return To
                <a href="{{route('signinpage')}}">Login Form</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('my_asset/custom.js')}}"></script>
    <script src="https://kit.fontawesome.com/532f1fcad3.js" crossorigin="anonymous"></script>
@endsection