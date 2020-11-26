<!-- <div>
    Let all your things have their places; let each part of your business have its time. - Benjamin Franklin
</div> -->

<div class="accordion mt-4" id="accordionExample">
  @php $i=1; @endphp
  @foreach($categories as $category)
  <div class="card">
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