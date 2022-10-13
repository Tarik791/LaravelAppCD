<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\ReplayRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use App\Models\User;
use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\Location;
use App\Models\Reply;
use Session;
use Stripe;

class HomeController extends Controller
{
    //

    public function index(){

        $all_products = Product::where('status', '1')->paginate(6);
        

        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::all();

        return view('home.userpage', compact('all_products', 'comment', 'reply'));

    }


    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype == '1'){

            $total_product = Product::all()->count();

            $total_order = Order::all()->count();

            $total_user = User::all()->count();

            $order = Order::all();

            $total_revenue = 0;

            foreach($order as $order){

                $total_revenue = $total_revenue + $order->price;

            }

            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();

            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();


            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));

        }else{

            $all_products = Product::where('status', '1')->paginate(1);

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            return view('home.userpage', compact('all_products', 'comment', 'reply'));

        }

    }

    public function product_details($id){

        $product = Product::find($id);

        return view('home.product_details', compact('product'));
    }


    public function add_cart(Request $request, $id){

        if(Auth::id()){

            $user = Auth::user();

            $userid = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where('Product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            if($product_exist_id){

                $cart = Cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;


                if($product->discount_price != null){
    
    
                    $cart->price = $product->discount_price *  $cart->quantity;
    
                }else{
    
    
                    $cart->price = $product->price *  $cart->quantity;
    
                }


                $cart->save();

                return redirect()->back()->with('message', 'Product Added Succesfully!');

            }else{

                

                $cart = new Cart;

                // User
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
    
                // Product
                $cart->product_title = $product->title;
    
                if($product->discount_price != null){
    
    
                    $cart->price = $product->discount_price * $request->quantity;
    
                }else{
    
    
                    $cart->price = $product->price * $request->quantity;
    
                }
    
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->product_id = $product->id;
    
                $cart->quantity = $product->quantity;
    
                $cart->save();
    
                return redirect()->back()->with('message', 'Product Added Succesfully!');



            }

           


        }else{

            return redirect('login');

        }



    }

    public function show_cart(){

        if(Auth::id()){

            $id = Auth::user()->id;

            $cart=Cart::where('user_id','=', $id)->get()->toArray();

            return view('home.show_cart', compact('cart'));

        }else{

            return redirect('login');

        }

        
    }


    public function remove_cart($id){

        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();



    }

    public function cash_order(){


        $user = Auth::user();

        $userid = $user->id;

        $data = Cart::where('user_id', '=', $userid)->get();

        foreach($data as $row){

            $order = new Order();

            $order->name = $row->name;
            $order->email = $row->email;
            $order->phone = $row->phone;
            $order->address = $row->address;
            $order->user_id = $row->user_id;
            $order->lat = $row->lat;
            $order->lng = $row->lng;
            
            $order->product_title = $row->product_title;
            $order->price = $row->price;
            $order->quantity = $row->quantity;
            $order->image = $row->image;

            $order->product_id = $row->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $row->id;
            $cart= Cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message', 'We Received Your Order. We Will connect with you soon');
    }

    public function stripe($totalprice){


        return view('home.stripe', compact('totalprice'));

    }
    public function stripePost(Request $request, $totalprice)
    {



        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);





            $user = Auth::user();
    
            $userid = $user->id;
    
            $data = Cart::where('user_id', '=', $userid)->get();
    
            foreach($data as $row){
    
                $order = new Order();
    
                $order->name = $row->name;
                $order->email = $row->email;
                $order->phone = $row->phone;
                $order->address = $row->address;
                $order->user_id = $row->user_id;
                
                $order->product_title = $row->product_title;
                $order->price = $row->price;
                $order->quantity = $row->quantity;
                $order->image = $row->image;
    
                $order->product_id = $row->product_id;
                $order->payment_status = 'Paid';
                $order->delivery_status = 'processing';
                
                $order->save();
    
                $cart_id = $row->id;
                $cart= Cart::find($cart_id);
                $cart->delete();
    
            }


      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }



    public function show_order(){

        // if user is loggedin
        if(Auth::id()){

            $user = Auth::user();

            $userid = $user->id;

            $order = Order::where('user_id', '=', $userid)->get();

            return view('home.order', compact('order'));

        }else{

            return redirect('login');

        }

    }


    public function cancel_order($id){

        $remove_order = Order::find($id);

        $remove_order->delivery_status='You canceled the order';

        $remove_order->save();

        return redirect()->back();


    }


    public function add_comment(CommentRequest $request){

        // If user is loggedin
        if(Auth::id()){

            $data = $request->validated();

            $comment = new Comment;

            $comment->name = Auth::user()->name;

            $comment->user_id = Auth::user()->id;

            $comment->comment = $data['comment'];

            $comment->save();

            return redirect()->back()->with('message', 'Comment Added Successfully');

        }else{

            return redirect('login');

        }


    }

    public function add_reply(ReplayRequest $request){


        // user loggedin
        if(Auth::id()){

            $reply = new Reply;

            $reply->name = Auth::user()->name;

            $reply->user_id = Auth::user()->id;

            $reply->comment_id = $request->commentId;


            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back()->with('message', 'Comment Added Successfully');
              

        }else{

            
            return redirect('login');

        }

    }


    public function contact_us() { 

        return view('home.contact'); 
      } 
 


    public function send_message(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $contact = new ContactUs;

        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();
        
        return back()->with('success', 'Thank you for contact us!');
    }



    public function location(){


        return view('home.location');
    }

    public function location_store(Request $request){

        if(Auth::id()){


            Location::create([
                'latitude'=>$request->lat,
                'longitude'=>$request->lng,
                'user_id' => Auth::user()->id
            ]);
    
            return redirect()->back();
            
        }else{

           return redirect('login');
        }

        
    }


    public function product_search(Request $request){

        $comment = Comment::orderby('id', 'desc')->get();

        $reply = Reply::all();

        $search_text = $request->search;

        $all_products = Product::where('title', 'LIKE', "%$search_text%")->paginate(6);      


        return view('home.userpage', compact('all_products', 'comment', 'reply'));

    }


    public function products(){


        $all_products = Product::where('status', '1')->paginate(6);
        

        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::all();

        return view('home.products', compact('all_products', 'comment', 'reply'));

    }




    public function search_product(Request $request){

        $comment = Comment::orderby('id', 'desc')->get();

        $reply = Reply::all();

        $search_text = $request->search;

        $all_products = Product::where('title', 'LIKE', "%$search_text%")->paginate(6);      


        return view('home.products', compact('all_products', 'comment', 'reply'));

    }


    
}
