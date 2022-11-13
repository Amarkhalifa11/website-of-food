@extends('admin.admin_master')
@section('content')

<h1 class="text-center mb-5">all payment</h1>

    
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
                            <th scope="col">transaction id</th>
                            <th scope="col">date</th>
                            <th scope="col">delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($payments as $payment)
                            
                        <tr>
                            <td scope="row">{{$i++}}</td>
                            <td>{{$payment->order_id}}</td>
                            <td>{{$payment->transaction_id}}</td>
                            <td>{{$payment->date}}</td>
                            <td><a href="{{ route('all_payment.destroy', ['id'=>$payment->id]) }}" class="btn btn-danger">delete</a></td>

                        </tr>

                        @endforeach 
                    </tbody>
                </table>

        
    </div>
    </div>
@endsection