<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product TEST1</h1>
    <!-- @foreach($posts as $post)
    {{$post -> yourCollumname}}
    @endforeach -->
    <h2>Name:</h2>
    @foreach($products as $product)
    {{$product -> product_name }} <br>
    @endforeach
    <!-- <h2>Description:</h2>
    @foreach($Categories as $Category)
    {{$Category -> description }} <br>
    @endforeach -->
</body>
</html>