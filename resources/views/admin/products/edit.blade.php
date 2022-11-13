@extends('admin.admin_master')
@section('content')
    <h1 class="text-center">Edit the product</h1>
     <h2 class="text-center mt-5 mb-5">welcome : {{ Auth::user()->name }}</h2>

     <div class="row">
         <div class="col-lg-12">

             <form action="{{ route('products.update', ['id'=>$products->id]) }}" method="POST" enctype="multipart/form-data">

                     @csrf
                     <div class="col-md-12 mb-3">
                         <label for="validationServer01">product name</label>
                         <input type="text" class="form-control" name="name" value="{{$products->name}}" id="validationServer01"
                             placeholder="name">

                         @error('name')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         
                     </div>

                     <div class="col-md-12 mb-3">
                        <label for="validationServer01">product quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{$products->quantity}}" id="validationServer01"
                            placeholder="quantity">

                        @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                     <div class="col-md-12 mb-3">
                         <label for="">image</label>
                         <input type="file" class="form-control" name="image"  value="{{$products->image}}" id="">

                         @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     </div>

                     <div class="col-md-12 mb-3">
                         <label for="validationServerUsername">price</label>
                         <input type="text" class="form-control" name="price" value="{{$products->price}}" id="validationServerUsername" placeholder="price" aria-describedby="inputGroupPrepend3">

                         @error('price')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     </div>


                     <div class="col-md-12 mb-3">
                         <label for="validationServerUsername">sale price</label>
                         <input type="text" class="form-control" name="sale_price" value="{{$products->sale_price}}" id="validationServerUsername"
                         placeholder="sale price" aria-describedby="inputGroupPrepend3">
                         
                         @error('sale_price')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     </div>



                     <div class="col-md-12 mb-3">
                         <label for="validationServerUsername">category</label>

                         <select class="form-control" name="category" aria-label="Default select example">
                            <option selected>{{$products->category}}</option>
                            <option value="burger">burger</option>
                            <option value="chiken">chiken</option>
                            <option value="beverages">beverages</option>
                            <option value="breakfast">breakfast</option>
                          </select>

                         {{-- <input type="text" class="form-control" name="category" value="{{$products->category}}" id="validationServerUsername"
                         placeholder="category" aria-describedby="inputGroupPrepend3"> --}}

                         @error('category')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     </div>

                     <div class="col-md-12 mb-3">
                         <label for="validationServerUsername">type</label>

                         <select class="form-control" name="type" aria-label="Default select example">
                            <option selected>{{$products->type}}</option>
                            <option value="meal">meal</option>
                            <option value="drink">drink</option>
                          </select>

                         {{-- <input type="text" class="form-control" name="type" value="{{$products->type}}" id="validationServerUsername"
                         placeholder="type" aria-describedby="inputGroupPrepend3"> --}}

                         @error('type')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     </div>

                     <div class="col-md-12 mb-3">
                        <label for="validationServer01">product description</label>
                        <textarea  rows="5" class="form-control" name="description"  id="validationServer01"
                            >{{$products->description}}</textarea>

                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>


                 <button class="btn btn-primary" type="submit">add product </button>
             </form>


         </div>
     </div>
@endsection