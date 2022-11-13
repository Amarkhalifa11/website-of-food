<?php

namespace App\Http\Controllers; 

use App\Models\order_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderTableController extends Controller
{

    public function index()
    {
        $order_table = order_table::all();
        return view('admin.orders.all_orders_table' , compact('order_table'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order_table  $order_table
     * @return \Illuminate\Http\Response
     */
    public function show(order_table $order_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order_table  $order_table
     * @return \Illuminate\Http\Response
     */
    public function edit(order_table $order_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order_table  $order_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_table $order_table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order_table  $order_table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_table = order_table::find($id);
        $order_table->delete();

        return redirect()->route('all_orders_table')->with('message' ,'the order is deleted succesfully');
    }
}
