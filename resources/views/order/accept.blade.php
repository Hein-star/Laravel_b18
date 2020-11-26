@extends('backendtemplate')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            {{--side-bar component --}}
            <x-sidebar-component></x-sidebar-component>
        </div>
    </div>
    <div class="col-lg-9">
        <!-- Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-10 shadow p-3 mb-5 bg-white rounded table-bordered border-info">
                    <div class="row">
                        <div class="col-4">
                        <img src="{{asset('public/backend_asset/images/success.gif')}}" width="200" height="200">
                        </div>
                        <div class="col-8 mt-4">
                            <h1> Your order is complete </h1>
                            <p> You order will be delivered in 4 days. </p>
                        </div>
                    </div>
                <a href="{{url('/')}}" class="btn btn-block btn-outline-info">Go Back Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection