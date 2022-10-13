

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

                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r  p-4 shadow text-2xl text-white">
                        <h1 class="font-bold pl-2">Add Category</h1>
                    </div>
                </div>

                @if(session()->has('message'))
                    
                <div class="alert alert-success">

                    {{session()->get('message')}}
                </div>

                @endif
                <div class="flex flex-row flex-wrap flex-grow mt-2">

                   

                       
                        <!--/table Card-->
                        <form action="{{ url('/add_category') }}" method="post">
                            @csrf
                            <input type="text" name="category_name" placeholder="Write your category name">
                            <input type="submit" style="background-color: blue;" name="submit" class="btn btn-primary" value="Add Category">
                        </form>

           


                </div>

                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach($data as $row)
                    <tr>


                        <td>{{$row['category_name']}}</td>
                        <td><a onclick="return confirm('Are You Sure To Delete This Category?')"  style="background-color: red;" class="btn btn-danger" href="{{ url('delete_category',$row['id']) }}">Delete</a></td>
                    
                    </tr>

                    @endforeach
                </table>
            </div>
        </section>
    </div>
</main>



@include('admin.footer')