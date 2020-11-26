@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Brand Page</h1>
        <p>Start a beautiful journey</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Brand Detail</h2>

          <img src="{{asset($brand->photo)}}" width="300" height="250" alt="">

          <p>{{$brand->name}}</p>
        </div>
      </div>
    </div>
  </main>
@endsection