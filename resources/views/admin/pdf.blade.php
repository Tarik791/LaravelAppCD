<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
</head>
<body>
    
    <h1>Order Details</h1>

    Customer Name :<h3>{{ $order->name }}</h3>

    Customer Email :<h3>{{ $order->email }}</h3>

    Customer Phone :<h3>{{ $order->phone }}</h3>

    Customer Address :<h3>{{ $order->address }}</h3>

    Customer User ID :<h3>{{ $order->user_id }}</h3>

    Customer Product ID :<h3>{{ $order->product_id }}</h3>

    Customer Product title :<h3>{{ $order->product_title }}</h3>

    Customer Quantity :<h3>{{ $order->quantity }}</h3>

    Customer Price :<h3>{{ $order->price }}</h3>

    Customer Payment Status :<h3>{{ $order->payment_status }}</h3>

    Customer Delivery Status :<h3>{{ $order->delivery_status }}</h3>

    <img height="250" width="450" src="uploads/products/{{ $order->image }}">


</body>
</html>