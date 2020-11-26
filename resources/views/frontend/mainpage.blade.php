@extends('frontendtemplate')
<style type="text/css">
   .pointer {
      cursor: pointer;
    }
    .img-zoom {
      display: block;
    }
    .img-zoom img {
      -webkit-transform: scale(1);
      transform: scale(1);
      -webkit-transition: .3s ease-in-out;
      transition: .3s ease-in-out;
    }
    .img-zoom:hover img {
      -webkit-transform: scale(1.3);
      transform: scale(1.1);
    }
 </style>
@section('content')

	<div class="container">
    <div class="row">
      <div class="col-lg-3"> 
        <x-sidebar-component></x-sidebar-component>
      </div>
      {{-- Carousel Indicators Start --}}
      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block" src="{{asset('backend_asset/images/item/computer3.jpg')}}" alt="First slide" width="900" height="460">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="{{asset('backend_asset/images/item/shirt4.jpg')}}" alt="Second slide" width="900" height="460">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="{{asset('backend_asset/images/item/slide1.jpg')}}" alt="Third slide" width="900" height="460">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    {{-- Carousel Indicators End --}}

    {{-- Promotion Product Start --}}
    <div class="row my-4">
      <div class="col-md-12 bg-dark">
        <h1 class="text-center text-white">Promotion Products</h1>
      </div>
      @foreach($items as $item)
        <x-item-component :item="$item"></x-item-component>
      @endforeach
    </div>
    {{-- Promotion Product End --}}

    {{-- Brand Product Start--}}
    <div class="row my-4">
      <div class="col-md-12 bg-dark">
        <h1 class="text-center text-white">Brand Products</h1>
      </div>
      @foreach($brands as $brand)
      <div class="col-lg-3 col-md-6 mb-4 my-4 text-center img-zoom" tabindex="-1">
        <div class="card h-100">
          <img src="{{asset($brand->photo)}}" class="card-img-top" alt="" width="700" height="200">
          <h4 class="card-title mt-4">{{$brand->name}}</h4>
          {{-- <h5>{{$brand->price}} MMK</h5> --}}
          <div class="card-footer">
            <button class="btn btn-info form-control addtocartBtn" 
                    data-id="{{$item->id}}"
                    data-name="{{$item->name}}"
                    data-codeno="{{$item->codeno}}"
                    data-photo="{{asset($item->photo)}}"
                    data-price="{{$item->price}}"
                    data-discount="{{$item->discount}}">Add To Cart
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{-- Brand Product End --}}
  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}"></script>
@endsection