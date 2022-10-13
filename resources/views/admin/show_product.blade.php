

<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Admin Starter Template : Tailwind Toolbox</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->


<style>

    .center{

        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
    }

</style>


</head>

<body >


<main>


<li style="float:right; text-decoration:none; ">
<x-app-layout>
</x-app-layout>
</li>




    <div class="flex flex-col md:flex-row">
        @include('admin.sidebar')

        <section>
            <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">


                <table class="center">

            @if(session()->has('message'))
                    
                    <div class="alert alert-success">
    
                        {{session()->get('message')}}
                    </div>
    
                    @endif
                    <tr>
                        <td>Product Title</td>
                        <td>Product Description</td>
                        <td>Product Image</td>
                        <td>Product Category</td>
                        <td>Product Quantity</td>
                        <td>Product Price</td>
                        <td>Created By</td>
                        <td>Product Status</td>
                        <td>Product Date</td>
                        <td>Product Delete</td>
                        <td>Product Edit</td>


                        <td>Action</td>
                    </tr>

                    @foreach($products as $product)
                    <tr>


                        <td>{{$product['title']}}</td>
                        <td>{{$product['description']}}</td>
                        <td><img style="width: 150px;" src="{{ asset('uploads/products/'.$product['image']) }}" alt=""></td>
                        <td>{{$product['category']}}</td>
                        <td>{{$product['quantity']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['discount_price']}}</td>
                        <td>{{$product['created_by']}}</td>

                    <td>{{ $product['status'] == '1' ? 'Hidden':'Showen' }}</td>
                    <td>{{Carbon\Carbon::parse($product['created_at'])->format('Y-m-d') }}</td>
                    

                        <td><a onclick="return confirm('Are You Sure To Delete This Category?')"  style="background-color: red;" class="btn btn-danger" href="{{ url('delete_product',$product['id']) }}">Delete</a></td>
                        <td><a style="background-color: green;" class="btn btn-danger" href="{{ url('update_product',$product['id']) }}">Edit</a></td>

                    
                    </tr>

                    @endforeach
                </table>
            </div>
        </section>
    </div>
</main>



@include('admin.footer')