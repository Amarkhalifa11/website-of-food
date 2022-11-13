<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProductController extends Controller
{

    public function index() 
    {
        $products = Product::all();
        return view('products' ,compact('products'));
    }

    public function all_products() 
    {
        $products = Product::all();
        return view('admin.products.products' ,compact('products'));
    }

    
    public function single(Request $request,$id) 
    {
        $products = DB::table('products')->where('id' , $id)->get();
        return view('single' ,compact('products'));
    }

    public function category(Request $request,$category) 
    {
        $products = Product::all()->where('category' , $category);
        return view('products' ,compact('products'));
    }

    public function create(Request $request)
    {
        return view('admin.products.add_product');
    }

    public function store(Request $request)
    {
          //validation

        $validated = $request->validate([
            'name'              =>'required|unique:order_tables',
            'image'             =>'required|image',
            'price'             =>'required',
            'sale_price'        =>'required',
            'category'          =>'required',
            'type'              =>'required',
            'description'       =>'required',

        ]
        ,
        [ 
            'name.required'           => 'type any thing',
            'name.unique'             => 'the name is repeat',
            'image.required'          => 'type any thing',
            'image.image'             => 'select image',
            'price.required'          => 'type any thing',
            'sale_price.required'     => 'type any thing',
            'category.required'       => 'type any thing',
            'type.required'           => 'type any thing',
            'description.required'    => 'type any thing',

        ]);

        //upload image

        $brand_image = $request->file('image'); 

        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($brand_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $brand_image->move($upload_location,$img_name); 

          //code

          $product = new Product();

          $product->name           = $request->name;
          $product->image          = $image;
          $product->price          = $request->price;
          $product->sale_price     = $request->sale_price;
          $product->type           = $request->type;
          $product->category       = $request->category;
          $product->description    = $request->description;
          $product->quantity       = $request->quantity;

          $product->save();



          //redirect

          return redirect()->route('all_products')->with('message' ,'the product is added succesfully');

    // return $request;   

    }


    public function show(Product $product)
    {
        //
    }

    public function edit_products(Product $product , $id)
    {
        $products = Product::find($id);
        return view('admin.products.edit' , compact('products'));
    }


    public function update(Request $request, $id)
    {


        $validated = $request->validate([
            'name'              =>'required|unique:order_tables',
            'image'             =>'required|image',
            'price'             =>'required',
            'sale_price'        =>'required',
            'category'          =>'required',
            'type'              =>'required',
            'description'       =>'required',

        ]
        ,
        [ 
            'name.required'           => 'type any thing',
            'name.unique'             => 'the name is repeat',
            'image.required'          => 'type any thing',
            'image.image'             => 'select image',
            'price.required'          => 'type any thing',
            'sale_price.required'     => 'type any thing',
            'category.required'       => 'type any thing',
            'type.required'           => 'type any thing',
            'description.required'    => 'type any thing',

        ]);

        //upload image

        $brand_image = $request->file('image'); 

        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($brand_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $brand_image->move($upload_location,$img_name); 

          //code

          $products = Product::find($id);
          $products->update([
            'name'          => $request->name,
            'price'         => $request->price,
            'sale_price'    => $request->sale_price,
            'type'          => $request->type,
            'category'      => $request->category,
            'description'   => $request->description,
            'quantity'      => $request->quantity,
            'image'         => $image,

          ]);


          //redirect

          return redirect()->route('all_products')->with('message' ,'the product is updated succesfully');

    }

    public function destroy(Product $product , $id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('all_products')->with('message' ,'the product is deleted succesfully');

    }
}
