@include('home.header')


<div class="center">
    <table>

        <tr>
            <th class="th_deg">Product Title</th>

            <th class="th_deg">Quantity</th>

            <th class="th_deg">Price</th>

            <th class="th_deg">Image</th>

            <th class="th_deg">Action</th>



        </tr>
        <?php $totalprice = 0; ?>

        @foreach($cart as $row)

        <tr>
            <td>{{$row['product_title']}}</td>

            <td>{{$row['quantity']}}</td>

            <td>{{$row['price']}}</td>
            
            <td>
            <img style="width: 100px;" class="img-fluid" src="{{ asset('uploads/products/'.$row['image'])}}" alt="">

            </td>

            <td>
            <a href="{{ url('/remove_cart', $row['id']) }}" onclick="return confirm('Do you want remove item from cart?')" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>

            </td>
        </tr>
        <?php $totalprice = $totalprice + $row['price']; ?>

        @endforeach

       

    </table>
   
    <div style="float: right;">
   

        <span>$ Total Price:{{ $totalprice }}</span>

     
     
      <div style="padding: 10px;">
        <a href="{{ url('cash_order') }}" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Cash On Delivery</a>
      <a href="{{ url('stripe', $totalprice) }}" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Pay Using Card</a>
      </div>
      </div>
   

</div>



        





@include('home.footer')
