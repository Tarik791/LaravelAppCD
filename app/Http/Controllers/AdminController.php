<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Order;

use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use PDF;
use Notification;

class AdminController extends Controller
{
    //
    public function view_category(){

        if(Auth::id()){

            $data = Category::all()->toArray();

            return view('admin.category', compact('data'));
        }else{


            redirect('login');
        }

       

    }

    public function add_category(Request $request){

        $data = new Category;

        $data->category_name = $request->category_name;

        $data->save();

        return redirect()->back()->with('message', 'Category Addedd Successfully');

    }

    public function delete_category($id){

        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
        

    }


    public function view_product(){

        $category = Category::all()->toArray();

        return view('admin.product', compact('category'));

    }

    public function add_product(Request $request){

        $validated = $request->validate([

            'title' => 'required ',
            'description' => 'required ',
            'image' => 'required | image ',
            'category' => 'required',
            'quantity' => 'required',
            'price' => 'required',

            
        ]);


        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;

        if($request->hasfile('image')){
    
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/products/', $filename);
            $product->image = $filename;

        }


        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->status = $request->status == true ? '1':'0';
        $product->created_by = Auth::user()->name;
        
        $product->discount_price = $request->dis_price;

        $product->save();

        return redirect()->back()->with('message', 'Product Added succesfully');


    }

    public function show_product(){

        $products = Product::all()->toArray();

        return view('admin.show_product', compact('products'));

    }

    public function delete_product($id){



        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');

    }

    public function update_product($id){

        $products = Product::find($id);


        return view('admin.update_product', compact('products'));

    }

    public function edit_product(Request $request, $id){


        if(Auth::id())
        {


            $products = Product::find($id);

            $products->title = $request->title;
            $products->description = $request->description;
            $products->category = $request->category;
            $products->quantity = $request->quantity;
            $products->price = $request->price;
            $products->title = $request->title;
            $products->discount_price = $request->dis_product;
    
    
            if($request->hasfile('image')){
    
                // if image exists, image delete
                $destination = 'uploads/products/'.$products->image;
                if(File::exists($destination)){
    
                    File::delete($destination);
    
                }
    
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/products/', $filename);
                $products->image = $filename;
    
            }
    
    
            $products->status = $request->status == true ? '1':'0';
    
            $products->update();
    
            return redirect()->back()->with('message', 'Product Updated Successfully');


            
        }else{


            redirect('login');
        }





    }


    public function view_orders(){

        $order = Order::all()->toArray();

        return view('admin.orders', compact('order'));
    }

    public function delivered($id){

        $order = Order::find($id);

        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";

        $order->save();

        return redirect()->back();


    }

    public function print_pdf($id){

        $order = Order::find($id);

        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');

    }

    public function send_email($id){

        $order = Order::find($id);

        return view('admin.email_info', compact('order'));

    }

    public function send_user_email(Request $request, $id){

        $order = Order::find($id);

        $details = [

            'greeting'=> $request->greeting,
            'firstline'=> $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,


        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();

    }

    public function searchdata(Request $request){

        $searchText = $request->search;

        $order = Order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();

        return view('admin.orders', compact('order'));

    }


    public function view_contact(){

        $contact_us = ContactUs::all();

        return view('admin.contact_us', compact('contact_us'));
    }

    public function delete_contact_us($id){

        $contact_us = ContactUs::find($id);

        $contact_us->delete();

        return redirect()->back()->with('message', 'Contact Message Deleted Successfully');


    }

}
