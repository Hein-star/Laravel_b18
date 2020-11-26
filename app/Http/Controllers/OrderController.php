<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    // public function __construct($value='')
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders = Order::where('status',0)->get();
        $confirmed_orders = Order::where('status',1)->get();
        return view('order.index', compact('pending_orders', 'confirmed_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // data store
        $myorder = json_decode($request->order);
        $notes = $request->notes;
        $orderdate = date('Y-m-d');
        $totalAmount = 0;
        foreach ($myorder as $row) {
            if($row->discount != null || $row->discount != 0)
            {
                $totalAmount += $row->discount * $row->qty;
            }
            else{
                $totalAmount += $row->price * $row->qty;
            }
        }

        $order = new Order;
        $order->orderno = uniqid();
        $order->orderdate = $orderdate;
        $order->totalamount = $totalAmount;
        $order->notes = $notes;
        $order->user_id = Auth::id(); // current logined user_id
        $order->save();

        foreach ($myorder as $row) {
            $order->items()->attach($row->id,
            [
                'quantity'=>$row->qty
            ]);
        }

        return 'Successful Your Order!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return redirect()->route('order.index');
    }

    public function cancle($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('order.index');
    }
}
