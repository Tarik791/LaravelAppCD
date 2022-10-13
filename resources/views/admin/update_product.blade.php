

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

<body class="bg-gray-800 font-sans leading-normal tracking-normal">


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
                    
                    <tr>

                    @if(session()->has('message'))
                    
                    <div class="alert alert-success">
    
                        {{session()->get('message')}}
                    </div>
    
                    @endif
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

                    <tr>


                    <form action="{{ url('update_product/'.$products['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')


                    <div class="mb-3">
                <label for="">Product Title</label>
                <input type="text" value="{{ $products['title'] }}" name="title" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="">Product Description</label>
                <input type="text" value="{{ $products['description'] }}" name="description" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Products Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img style="width: 150px;" src="{{ asset('uploads/products/'.$products['image']) }}" alt="">
            </div>

            <label for="">Product Category :</label>
                <select name="category">
                    <option value="{{$products['category']}}">{{$products['category']}}</option>
                </select>
            </div>



            <div class="mb-3">
                <label for="">Product Quantity</label>
                <input type="text" value="{{ $products['quantity'] }}" name="quantity" class="form-control">
            </div>


            <div class="mb-3">
                <label for="">Product Price</label>
                <input type="text" value="{{ $products['price'] }}" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Product Discount</label>
                <input type="text" value="{{ $products['discount_price'] }}" name="dis_product" class="form-control">
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $products['status'] == '1' ? 'checked':'' }} name="status">
                </div>
            </div>


            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Course</button>
            </div>

          

                    
                    </tr>

                    </form>
                </table>
            </div>
        </section>
    </div>
</main>



@include('admin.footer')