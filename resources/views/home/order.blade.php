@include('home.header')


<div class="center">
    <table>

        <tr>
            <th class="th_deg">Product Title</th>

            <th class="th_deg">Quantity</th>

            <th class="th_deg">Price</th>

            <th class="th_deg">Payment Status</th>


            <th class="th_deg">Delivery Status</th>

            <th class="th_deg">Image</th>

            <th class="th_deg">Cancel Order</th>


        </tr>

        @foreach($order as $order)
        <tr>
            <td>{{$order->product_title}}</td>

            <td>{{$order->quantity}}</td>

            <td>{{$order->price}}</td>

            <td>{{$order->payment_status}}</td>

            <td>{{$order->delivery_status}}</td>
            
            <td>
            <img style="width: 100px;" class="img-fluid" src="{{ asset('uploads/products/'.$order->image)}}" alt="">

            </td>

            <td>
                @if($order->delivery_status == 'processing')
                <a onclick="return confirm('Are You Sure To Cancel This Order !!!!')" href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger">Cancel order</a>
                @else

                    <p style="color:blue;">Not Allowed</p>

                
                @endif


            </td>
        </tr>
        @endforeach


    </table>
</div>


@include('home.footer')
