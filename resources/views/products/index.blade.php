<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body class="products-page">
    <div class="page">
        <form class="home-form" action="{{ route('home') }}">
            <input type="submit" value="Back to home">
        </form>
        <header class="page-header">
            <h1>Product List</h1>
            @if(session()->has('success'))
            <div class="notice">
                {{ session('success') }}
            </div>
            @endif
        </header>

        <div class="toolbar">
            <form class="filter-form" method="get" action="{{ route('product.index') }}">
                <label for="filter-name">Name</label>
                <input id="filter-name" type="text" name="name" value="{{ request('name') }}" placeholder="Search name">
                <label for="filter-category">Category</label>
                <input id="filter-category" type="text" name="category" value="{{ request('category') }}" placeholder="Search category">
                <input type="submit" value="Filter">
            </form>

            <form class="create-form" method="get" action="{{ route('product.create') }}">
                <input type="submit" value="Create a new product">
            </form>
        </div>

        <div class="table-wrap">
            <table class="products-table" border="1">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Modify</th>
                </tr>
                @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <select
                                class="modify-select"
                                data-edit-url="{{ route('product.edit', ['product' => $product]) }}"
                                data-delete-form="delete-form-{{ $product->id }}"
                            >
                                <option value="" selected disabled hidden>Modify</option>
                                <option value="edit">Edit</option>
                                <option value="delete">Delete</option>
                            </select>
                            <form id="delete-form-{{ $product->id }}" method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
<script>
    document.querySelectorAll('.modify-select').forEach((select) => {
        select.addEventListener('change', () => {
            const value = select.value;
            const editUrl = select.dataset.editUrl;
            const deleteFormId = select.dataset.deleteForm;

            if (value === 'edit' && editUrl) {
                window.location = editUrl;
            }

            if (value === 'delete' && deleteFormId) {
                const form = document.getElementById(deleteFormId);
                if (form) {
                    form.submit();
                }
            }

            select.value = '';
        });
    });
</script>
</html>