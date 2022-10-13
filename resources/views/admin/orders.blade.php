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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>

<body >


<main>


<li style="float:right; text-decoration:none; ">
<x-app-layout>
</x-app-layout>
</li>




    <div class="flex flex-col md:flex-row">
        @include('admin.sidebar')


        <section class="antialiased bg-gray-100 text-gray-600 w-screen  px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <div class="font-semibold text-gray-800">Manage Carts</div>
            </header>

            <div class="overflow-x-auto p-5 ">

            <div style="ladding-left: 40px; padding-bottom: 30px;">
                <form action="{{ url('search') }}" method="get">
                    @csrf
                    <input type="text" name="search" placeholder="Search order name, phone or product title!">

                    <input type="submit" style="cursor: pointer;" value="Search" class="btn btn-outline-primary">
                </form>
            </div>
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th></th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Product Name</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Address</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Phone</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Product Title</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Quantity</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Price</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Payment Status</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Delivery Status</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Image</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Delivered</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Print PDF</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Send Email</div>
                            </th>
                           
                           

                        </tr>
                    </thead>

                    <tbody class="text-sm divide-y divide-gray-100">
                        <!-- record 1 -->

                        @forelse($order as $order)
                        <tr>
                             <td class="p-2">
                                <input type="checkbox" class="w-5 h-5" value="id-1"
                                    @click="toggleCheckbox($el, 2890.66)" />
                            </td> 
                            <td class="p-2">
                                <div class="font-medium text-gray-800">
                                    {{ $order['name'] }}
                                </div>
                            </td>
            
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['email'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['address'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['phone'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['product_title'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['quantity'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['price'] }}

                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                {{ $order['payment_status'] }}

                                </div>
                            </td>
                            <td class="p-2">
                            @if($order['delivery_status'] == "processing")

                                <div class="text-left font-medium text-green-500">
                                
                                    {{ $order['delivery_status'] }}

                                </div>
                            @else
                            <div class="text-left font-medium text-blue-500">
                                
                                {{ $order['delivery_status'] }}

                            </div>
                            @endif
                            </td>
                           
       
                            <td class="p-2">
                                <div class="text-left font-medium text-green-500">
                                <img class="img-fluid" src="{{ asset('uploads/products/'.$order['image'])}}" alt="">
                                </div>
                            </td>

                            

                            <td class="p-2">
                            @if($order['delivery_status'] == 'processing')

                                <div class="text-left font-medium text-green-500">
                                    <a href="{{ url('delivered', $order['id']) }}" onclick="return confirm('Are you sure this product is delivered !!!')" class="btn-btn-primary">Delivered</a>
                                </div>

                            @else

                                    <p style="color: blue;">Delivered</p>
                            @endif
                            </td>
                            <td>
                                <a href="{{ url('print_pdf', $order['id']) }}" class="btn btn-secendary">Print PDF</a>
                            </td>

                            <td>
                                <a href="{{ url('send_email', $order['id']) }}" class="btn btn-info">Send Email</a>
                            </td>

                  
                   
                            
                        </tr>

                        @empty

                        <tr>
                            <td colspan="16">
                                No Data Found
                            </td>
                        </tr>
                        
                        @endforelse

                      


                    </tbody>
                </table>
            </div>

            <!-- total amount -->
            <div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-4">
                <div>Total</div>
                <div class="text-blue-600">RM <span x-text="total.toFixed(2)"></span></div>
            </div>

            <div class="flex justify-end">
                <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("app", () => ({
            total: 0,
            selected: [],

            toggleCheckbox(element, amount) {
                if (element.checked) {
                    this.selected.push(element.value);
                    this.total += amount;
                } else {
                    const index = this.selected.indexOf(element.value);

                    if (index > -1) this.selected.splice(index, 1);

                    this.total -= amount;
                }
            },
        }));
    });
</script>

    </div>
</main>



@include('admin.footer')