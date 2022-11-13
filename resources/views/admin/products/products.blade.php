@extends('admin.admin_master')
@section('content')

<h1 class="text-center mt-10">ALL products</h1>
<h2 class="text-center mt-5 mb-5">welcome : {{Auth::user()->name}}</h2>

<div class="row">
    <div class="col-lg-12">

        @if (session('message'))
        <h2 class="text-center text-success my-3">{{ session('message') }}</h2>
        @endif

                <table class="table table-bordered table-hover table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                            <th scope="col">price</th>
                            <th scope="col">sale_price</th>
                            <th scope="col">category</th>
                            <th scope="col">description</th>
                            <th scope="col">type</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($products as $product)
                            
                        <tr>
                            <td scope="row">{{$i++}}</td>
                            <td>{{$product->name}}</td>
                            {{-- <td><img src="{{ $product->image }}" width="50" alt="{{$product->image}}" srcset=""> </td> --}}
                            <td><img src="{{ asset('frontend/images/'. $product->image) }}" width="50" height="50" alt="123" srcset=""> </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->type}}</td>
                            <td><a href="{{ route('products.edit_products', ['id'=>$product->id]) }}" class="btn btn-primary">edit</a></td>
                            <td><a href="{{ route('products.destroy', ['id'=>$product->id]) }}" class="btn btn-danger">delete</a></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    <a href="{{ route('add_products') }}" class="btn btn-success">add product</a>
                </div>
        
    </div>
    </div>
    
@endsection