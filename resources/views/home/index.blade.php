<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<div class="container mx-auto">
    <div class="mt-10">
        <h4 class="text-2xl mb-2">Customers</h4>
        <ul>
            @foreach($customers as $customer)
                <li class="p-5 border rounded-lg shadow hover:shadow-lg transition  mb-5">{{ $customer->first_name }} {{ $customer->last_name }} | {{ $customer->email }} | {{ $customer->phone }}</li>
            @endforeach
        </ul>
    </div>
    <div class="mt-10">
        <h4 class="text-2xl mb-2">Products</h4>
        <ul>
            @foreach($products as $product)
                <li class="p-5 border rounded-lg shadow hover:shadow-lg transition  mb-5">{{ $product->title }}
                    @foreach($product->images as $image)
                    <img class="w-14 inline" src="{{ $image->src }}" alt="">
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
