@extends('admin.admin_master')
@section('content')

<h1 class="text-center mb-5">all items</h1>

    
<div class="row">
    <div class="col-lg-12">

        @if (session('message'))
        <h2 class="text-center text-success my-3">{{ session('message') }}</h2>
        @endif

                <table class="table table-bordered table-hover table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">order id</th>
                            <th scope="col">product id</th>
                            <th scope="col">product name</th>
                            <th scope="col">product image</th>
                            <th scope="col">price</th>
                            <th scope="col">product quantity</th>
                            <th scope="col">order date</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                         @foreach ($items as $item)
                            
                        <tr>
                            <td scope="row">{{$i++}}</td>
                            <td>{{$item->order_id}}</td>
                            <td>{{$item->product_id}}</td>
                            <td>{{$item->product_name}}</td>
                            <td><img src="{{ asset('frontend/images/' . $item->product_image) }}" width="100" height="50" alt="" srcset=""></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->product_quantity}}</td>
                            <td>{{$item->order_date}}</td>
                            <td><a href="{{ route('all_orders_items.it', ['id'=>$item->id]) }}" class="btn btn-danger">delete</a></td>
                        </tr>

                        @endforeach 
                    </tbody>
                </table>

        
    </div>
    </div>
@endsection