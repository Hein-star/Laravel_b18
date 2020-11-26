@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Category Page</h1>
        <p>Start a beautiful journey</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Category Detail</h2>

          <img src="{{asset($category->photo)}}" width="350" height="250" alt="">

          <p>{{$category->name}}</p>
        </div>
      </div>
    </div>
  </main>
@endsection