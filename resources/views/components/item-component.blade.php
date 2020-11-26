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
<div class="col-lg-3 col-md-6 mb-4 my-4 img-zoom" tabindex="-1">
    <div class="card h-100">
        <a href="{{ route('itemdetail', $item->id) }}"><img width="700" height="200" style="object-fit: cover;"
                class="card-img-top img_hover" src="{{ asset($item->photo) }}" alt=""></a>
        <div class="card-body">
            <div class="mb-2 text-muted">
                <a href="{{ route('itemdetail', $item->id) }}" class="text-decoration-none text-muted">
                    show detail
                </a>
            </div>
            <h5 class="card-title">
                <a href="{{ route('itemdetail', $item->id) }}">{{ $item->name }}</a>
            </h5>
            <h4 class="text-success">
                @if ($item->discount == 0 or $item->discount == '')
                    <div> {{ $item->price . ' mmk' }}</div>
                @else
                    {{ $item->discount . ' mmk ' }}
                    <div>
                        <small>
                            <del class="text-muted">{{ $item->price . ' mmk' }}.</del>
                        </small>
                    </div>
                @endif
            </h4>
            <p class="card-text text-muted">{{ $item->description }}</p>
        </div>
        <div class="card-footer">
            <button class="btn btn-block btn-info addtocartBtn" 
                 data-id="{{$item->id}}"
                 data-name="{{$item->name}}"
                 data-codeno="{{$item->codeno}}"
                 data-photo="{{asset($item->photo)}}"
                 data-price="{{$item->price}}"
                 data-discount="{{$item->discount}}">
                <i class="fas fa-shopping-cart mr-2">Add to cart</i>
            </button>
        </div>
    </div>
</div>
