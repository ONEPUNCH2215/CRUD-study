<!DOCTYPE html>
<html>
<head>
    <title>Edit Character</title>
    <style>
        body { font-family: Arial; background: #f4f6f9; }
        .container { width: 500px; margin: 40px auto; }
        .card {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .form-group { margin-bottom: 12px; }
        label { font-weight: bold; display: block; }
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Character</h2>

        <form action="/characters/{{ $character['id'] }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $character['name'] }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" value="{{ $character['status'] }}">
            </div>

            <div class="form-group">
                <label>Species</label>
                <input type="text" name="species" value="{{ $character['species'] }}">
            </div>

            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" value="{{ $character['type'] }}">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <input type="text" name="gender" value="{{ $character['gender'] }}">
            </div>

            <div class="form-group">
                <label>Origin</label>
                <input type="text" name="origin" value="{{ $character['origin'] }}">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="{{ $character['location'] }}">
            </div>

            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image" value="{{ $character['image'] }}">
            </div>

            <button class="btn">Update</button>
        </form>

        <a href="/characters">Back</a>
    </div>
</div>

</body>
</html>
