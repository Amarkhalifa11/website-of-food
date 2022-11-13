<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart(){
        return view('cart');
    }

    public function add_to_cart(Request $request){

        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');
            $product_array_ids = array_column($cart, 'id');
            $id = $request->input('id');

            if(!in_array($id , $product_array_ids)){

            $name         = $request->input('name');
            $image        = $request->input('image');
            $price        = $request->input('price');
            $sale_price   = $request->input('sale_price');
            $quantity     = $request->input('quantity');



            // if($sale_price = 0){
            //     $a = $price;
            // }else{
            //     $a = $sale_price;
            // }


            $product_array = array(
                'id'       => $id,
                'name'     => $name,
                'image'    => $image,
                'price'    => $price,
                'quantity' => $quantity,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart' ,$cart);


            $this->calc($request);

            return view('cart');

            }else{
                echo "<script>alert('the product is in cart');</script>";
            }



        }else{

            $cart = array();

            $id           = $request->input('id');
            $name         = $request->input('name');
            $image        = $request->input('image');
            $price        = $request->input('price');
            $sale_price   = $request->input('sale_price');
            $quantity     = $request->input('quantity');


            // if($sale_price = 0.00){
            //     $a = $price;
            // }else{
            //     $a = $sale_price;
            // }



            $product_array = array(
                'id'       => $id,
                'name'     => $name,
                'image'    => $image,
                'price'    => $price,
                'quantity' => $quantity,
            );

            $cart[$id] = $product_array;
            $request->session()->put('cart' ,$cart);

            $this->calc($request);
            return view('cart');


        }
    }



    public function calc(Request $request){

        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;

        foreach ($cart as $id => $product) {
            
            $product = $cart[$id];

            $price = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;

        }

        $request->session()->put('total_price' , $total_price);
        $request->session()->put('total_quantity' , $total_quantity);

    }


    public function remove(Request $request){

        if($request->session()->has('cart')){

            $id   = $request->input('id');
            $cart = $request->session()->get('cart');

            unset($cart[$id]);
            $request->session()->put('cart' ,$cart);

            $this->calc($request);
            
        }

        return view('cart');

    }


    public function edit(Request $request){

        if($request->session()->has('cart')){
            $id = $request->input('id');
            $quantity = $request->input('quantity');




            // check 
            if($request->has('decrease_product_quantity_btn')){
                $quantity = $quantity - 1;
            }elseif($request->has('increase_product_quantity_btn')){
                $quantity = $quantity + 1;
            }else{
                
            }

            if($quantity <= 0){
                $this->remove($request);

            }

            $cart = $request->session()->get('cart');

            if(array_key_exists($id , $cart)){
                $cart[$id]['quantity'] = $quantity;

                $request->session()->put('cart' ,$cart);

                $this->calc($request);

            }
        }

        return view('cart');

    }


    public function checkout(Request $request){
        return view('checkout');
    }




    public function place_order(Request $request){

        if($request->session()->has('cart')){

            $name    = $request->input('name');
            $email   = $request->input('email');
            $phone   = $request->input('phone');
            $city    = $request->input('city');
            $address = $request->input('address');

            $cost    = $request->session()->get('total_price');
            $date    = date('Y-m-d h:i:s');
            $status  = "not paid";

            $cart = $request->session()->get('cart');

            $order_id = DB::table('order_tables')->InsertGetId([

                'cost'     => $cost,
                'name'     => $name,
                'email'    => $email,
                'atatus'   => $status,
                'city'     => $city,
                'phone'    => $phone,
                'adress'   => $address,
                'date'     => $date,
            ] ,'id' );


            foreach ($cart as $id => $product) {
                
                $product = $cart[$id];

                $product_id        = $product['id'];
                $product_name      = $product['name'];
                $product_price     = $product['price'];
                $product_quantity  = $product['quantity'];
                $product_image     = $product['image'];
                $product_date      = date('Y-m-d h:i:s');

                DB::table('orders_items')->insert([

                    'order_id'          => $order_id ,
                    'product_id'        => $product_id,
                    'product_name'      => $product_name,
                    'product_image'     => $product_image,
                    'price'             => $product_price,
                    'product_quantity'  => $product_quantity,
                    'order_date'        => $product_date,

                ]);
            }


            $request->session()->put('order_id' ,$order_id); // use later in payment

            return view('payment');


        }else{
            return redirect('/');
        }
    }




}
