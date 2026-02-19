<!DOCTYPE html>
<html>
<head>
    <title>Rick & Morty Characters</title>

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
        }
        img.character-img {
            width: 50px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="container-box">

        <div class="d-flex justify-content-between mb-3">
            <h3>Rick & Morty Characters</h3>

            <div>
                <a href="{{ url('/') }}" class="btn btn-secondary">Home</a>
                <a href="{{ route('characters.create') }}" class="btn btn-primary">+ Create</a>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Species</th>
                    <th>Gender</th>
                    <th>Origin</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($characters as $char)
                    <tr>
                        <td>{{ $char['id'] }}</td>
                        <td>{{ $char['name'] }}</td>
                        <td>{{ $char['status'] }}</td>
                        <td>{{ $char['species'] }}</td>
                        <td>{{ $char['gender'] }}</td>
                        <td>{{ $char['origin'] }}</td>
                        <td>{{ $char['location'] }}</td>
                        <td>
                            @if(!empty($char['image']))
                                <img src="{{ $char['image'] }}" class="character-img">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('characters.edit', $char['id']) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('characters.destroy', $char['id']) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this character?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No characters found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
