<?php

namespace App\Http\Controllers;

use App\Models\orders_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrdersItemController extends Controller
{

    public function index()
    {
        $items = orders_item::all();
        return view('admin.order_items.all_items' , compact('items'));
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
     * @param  \App\Models\orders_item  $orders_item
     * @return \Illuminate\Http\Response
     */
    public function show(orders_item $orders_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders_item  $orders_item
     * @return \Illuminate\Http\Response
     */
    public function edit(orders_item $orders_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orders_item  $orders_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orders_item $orders_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders_item  $orders_item
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $items = orders_item::find($id);
        $items->delete();

        return redirect()->route('all_orders_items')->with('message' ,'the items is deleted succesfully');

    }
}
