@extends('frontendtemplate')
@section('title', 'cart')

@section('content')
  <!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid bg-secondary">
  		<div class="container">
    		<h1 class="text-center text-white"> Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">

		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="#" class="btn btn-dark float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
					</tbody>
					<tfoot>
	                    <tr>
	                        <td colspan="5">
	                            <textarea class="form-control notes" id="notes" placeholder="Any Request..."></textarea>
	                        </td>
	                        <td colspan="3">
	                           @if(Auth::user()->getRoleNames()[0] == 'customer')
	                            <button class="btn btn-outline-info checkoutBtn">
	                                Check Out
	                            </button>
	                           @endif
	                        </td>
	                    </tr>
                	</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}"></script>
    {{-- <h1>Hello</h1> --}}
@endsection