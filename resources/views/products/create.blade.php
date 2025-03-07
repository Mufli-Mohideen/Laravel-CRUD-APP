<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('products.store')}}">
        @csrf
        @method('POST')
        <div>
            <label>Name: </label>
            <input type="text"  name="name" placeholder="name">
        </div>
        <div>
            <label>Qty: </label>
            <input type="text"  name="qty" placeholder="qty">
        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price" placeholder="Price">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save Product">
        </div>
    </form>
</body>
</html>