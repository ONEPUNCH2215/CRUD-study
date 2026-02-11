<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/product-form.css') }}">
</head>
<body class="form-page">
    <div class="form-container">
    <h1>Create a Product</h1>
    <div>
        @if($errors->any())
        <ul class="form-errors">
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form class="product-form" method='post' action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div class="form-field">
            <label>Name</label>
            <input type='text' name='name' placeholder='Name'>
        </div>
        <div class="form-field">
            <label>Stock</label>
            <input type='text' name='stock' placeholder='Stock'>
        </div>
        <div class="form-field">
            <label>Category</label>
            <input type='text' name='category' placeholder='Category'>
        </div>
        <div class="form-field">
            <label>Description</label>
            <input type='text' name='description' placeholder='Description'>
        </div>
        <div class="form-actions">
            <a class="form-button" href="{{ route('product.index') }}">Back to index</a>
            <input type="submit" value="Create new product">
        </div>
    </form>
    </div>
</body>
</html>