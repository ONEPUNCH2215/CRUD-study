<!DOCTYPE html>
<html>
<head>
    <title>Create Character</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-box {
            background: white;
            padding: 25px;
            margin-top: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="container-box">

        <div class="d-flex justify-content-between mb-3">
            <h3>Create Character</h3>
            <a href="{{ route('characters.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('characters.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="">-- Select Status --</option>
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="unknown">Unknown</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Species</label>
                <input type="text" name="species" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="">-- Select Gender --</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Genderless">Genderless</option>
                    <option value="unknown">Unknown</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Origin</label>
                <input type="text" name="origin" class="form-control" placeholder="Origin name">
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" placeholder="Location name">
            </div>

            <div class="mb-3">
                <label class="form-label">Image URL</label>
                <input type="url" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Save Character
            </button>

        </form>

    </div>
</div>

</body>
</html>
