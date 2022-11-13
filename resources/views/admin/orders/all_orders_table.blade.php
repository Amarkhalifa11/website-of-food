@extends('admin.admin_master')
@section('content')
    <h1 class="text-center mb-5">all orders </h1>
    {{-- <h3 class="text-center mb-5">welcome : {{Auth::user()->name}}</h3> --}}


    
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
                            <th scope="col">name</th>
                            <th scope="col">cost</th>
                            <th scope="col">email</th>
                            <th scope="col">status</th>
                            <th scope="col">city</th>
                            <th scope="col">phone</th>
                            <th scope="col">adress</th>
                            <th scope="col">date</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($order_table as $order)
                            
                        <tr>
                            <td scope="row">{{$i++}}</td>
                            <td >{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->cost}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->atatus}}</td>
                            <td>{{$order->city}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->adress}}</td>
                            <td>{{$order->date}}</td>
                            <td><a href="{{ route('all_orders_table.destroy', ['id'=>$order->id]) }}" class="btn btn-danger">delete</a></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

        
    </div>
    </div>
@endsection