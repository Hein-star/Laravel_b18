@extends('backendtemplate')

@section('content')
   <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-tasks"></i> Order Detail Page</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Order Detail</h2>
          <div>
          <a href="{{route('order.index')}}" class="btn btn-outline-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Go Back</a>
          </div>
          {{-- order detai start --}}
          <div class="container mt-3">
            <div class="row mt-5 shoppingcart_div">
              <div>
                <h4 class="text-dark"><small class="text-muted">Orderd by</small> {{$order->user->name }}</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th> Product </th>
                      <th> Photo </th>
                      <th> Qty </th>
                      <th> Price </th>
                      <th> Subtotal </th>
                    </tr>
                  </thead>
                    {{-- table body --}}
                  <tbody id="shoppingcart_table">
                    @php
                    $total = 0;
                    @endphp
                    @foreach($order->items as $item)
                      <tr>
                        <td>
                          <div class="mt-5">
                            <h3 class="text-dark">Item Name: {{$item->name}}</h3>
                            <h5 class="text-dark">Item Code: {{$item->codeno}}</h5>
                          </div>
                        </td>
                        <td>
                          <div class="mt-5">
                            <img src="{{$item->photo}}" class="cartImg" width="100" height="100">
                          </div>
                        </td>
                        <td>
                          <div class="mt-5">
                            <p class="text-dark">{{number_format($item->pivot->quantity)}}</p>
                          </div>
                        </td>
                        <td>
                          <div class="mt-5">
                            <p class="text-dark">
                              <h6>Discount :</h6>
                              <span class="font-weight-bold">{{$item->discount}} MMK</span>
                            </p>
                            <p class="font-weight-lighter text-dark">
                              <h6>Price :</h6>
                              <span class="font-weight-bold">{{number_format($item->price)}} MMK</span>
                            </p>
                          </div>
                        </td>
                        <td class="text-dark">
                          <div class="mt-5">
                            <span class="text-dark font-weight-bold">
                              @php
                              $subTotal = 0;
                                if($item->discount != 0 || $item->discount != '')
                                {
                                    $subTotal += $item->discount * $item->pivot->quantity;
                                }
                                else {
                                    $subTotal += $item->price * $item->pivot->quantity;
                                }$total += $subTotal;
                              echo $subTotal;
                              @endphp MMK</span>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">
                        <h3 class="text-right text-primary"> Total : {{number_format($item->totalamount = $total)}} MMK</h3>
                      </td>
                      @if($order->status == 0)
                      <td colspan="2">
                        <a href="{{url('order/'.$order->id.'/confirm')}}" class="btn btn-block btn-outline-success" onclick="return confirm('Are you sure ?')">Confirm</a>
                      </td>
                      @endif
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection