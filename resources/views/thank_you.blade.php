@extends('layouts.main')
@section('content')

<h3 class="text-center">thank you</h3>

  @if (Session::has('order_id') && Session::get('order_id'))


      <h4 style="color: #2121ba; margin-top: 20px ;" class="text-center">order id : {{ Session::get('order_id') }} </h4>
      <h4 style="color: rgb(2, 2, 3); margin-top: 20px ;" class="text-center">keep going</h4>

      
  @endif 

     
@endsection