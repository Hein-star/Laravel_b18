<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('my_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/532f1fcad3.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="{{ asset('my_asset/css/shop-homepage.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('mainpage')}}">2am Coders Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#promotion">Promotion
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service </a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('cartpage')}}">Cart <i class="fas fa-cart-plus"></i><span class="cartNoti">0</span></a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('signinpage')}}">Signin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('signuppage')}}">Signup</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2am Coders Shopping 2020.</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('my_asset/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('my_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  @yield('script')
</body>

</html>
