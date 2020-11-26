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

<div class="accordion mt-4" id="accordionExample">
  @php $i=1; @endphp
  @foreach($categories as $category)
  <div class="card img-zoom" tabindex="-1">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
          {{$category->name}}
        </button>
      </h2>
    </div>

    <div id="collapseOne{{$i}}" class="collapse @if($loop->first) {{'show'}} @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($category->subcategories as $subcategory)
        <a class="btn btn-link" href="{{route('itemsbysubcategory',$subcategory->id)}}" data-id="{{$subcategory->id}}">{{$subcategory->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
  @php $i++; @endphp
  @endforeach
</div>