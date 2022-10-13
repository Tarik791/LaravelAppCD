

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


    label{

        display: inline-block;
        width: 200px;
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

                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r  p-4 shadow text-2xl text-white">
                        <h1 class="font-bold pl-2">Add product</h1>
                    </div>
                </div>

                @if(session()->has('message'))
                    
                <div class="alert alert-success">

                    {{session()->get('message')}}
                </div>

                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex flex-row flex-wrap flex-grow mt-2">

                   

                       
                        <!--/table Card-->
                        <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div>

                            <label for="">Product Title :</label>
                            <input type="text" name="title" placeholder="Write a title">
                            </div>
                            <div>

                            <label for="">Product Description :</label>
                            <input type="text" name="description" placeholder="Write a Description">
                            </div>
                            <div>

                            <label for="">Product Price :</label>
                            <input type="number" min="0" name="price" placeholder="Write a price">
                            </div>


                            <div>

                            <label for="">Discount Price :</label>
                            <input type="number" min="0" name="dis_price" placeholder="Write a Discount">
                            </div>
                            <div>

                            <label for="">Product Quantity :</label>
                            <input type="text" name="quantity" placeholder="Write a quantity">
                            </div>
                            <div>

                            <label for="">Product Category :</label>
                                <select name="category">
                                    @foreach($category as $row)
                                    <option value="{{$row['category_name']}}">{{$row['category_name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>

                            <label for="">Product Image :</label>
                            <input type="file" name="image" >
                            </div>
                      
                            <div>

                            <input type="submit" value="Add Product" class="btn btn-primary" style="background-color: blue; cursor:pointer;">
                            </div>
                            <div>
                           
                        </form>

           


                </div>

                <table class="center">
                    <tr>
                        <td>product Name</td>
                        <td>Action</td>
                    </tr>

                   
                </table>
            </div>
        </section>
    </div>
</main>



@include('admin.footer')