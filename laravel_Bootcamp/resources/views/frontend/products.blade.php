<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Products</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <ul>
        @foreach($products as $product)
            <li>
                <h2>{{ $product['name'] }}</h2>
                <p>Harga: {{ $product['price'] }}</p>
                <p>Kategori: {{ $product['category'] }}</p>
            </li>
            @endforeach
    </ul>
    
</body>
</html>