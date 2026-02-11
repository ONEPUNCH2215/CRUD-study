<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Manager</title>
	<link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body class="home-page">
	<main class="home">
        <div class="home-card">
            <h1>Product Manager</h1>
            <div class="actions">
                <a href="{{ route('product.index') }}">Product Index</a>
                <a href="{{ route('product.create') }}" class="secondary">Create Product</a>
            </div>
        </div>
	</main>
</body>
</html>
