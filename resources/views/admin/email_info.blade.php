

<!DOCTYPE html>
<html lang="en"> 

<head>
    <base href="/public">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal">


<main>


<li style="float:right; text-decoration:none; ">
<x-app-layout>
</x-app-layout>
</li>




    <div class="flex flex-col md:flex-row">
        @include('admin.sidebar')
        <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ url('send_user_email', $order->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <h3>Send Email to {{ $order->email }}</h3>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email Greeting
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="greeting" placeholder="Username">
            </div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email FirstLing : </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="firstline" placeholder="Username">
            <br><br>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email Body : </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="body" placeholder="Username">
            <br><br>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email FirstLing : </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="firstling" placeholder="Username">
            <br><br>

            
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email Button name: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="button" placeholder="Username">
            <br><br>


            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email Url : </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="url" placeholder="Username">
            <br><br>


            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Email Last Line : </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="lastline" placeholder="Username">
            <br><br>


            <label >
                Email Last Line : </label>
            <input  id="username" type="submit" name="submit"  value="Send Email">
        </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
    </div>
</main>



@include('admin.footer')