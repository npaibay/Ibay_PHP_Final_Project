<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program - School System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .actions {
            margin-top: 18px;
        }

        .actions button,
        .actions a {
            display: inline-block;
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            background: #0d6efd;
            color: white;
            cursor: pointer;
        }

        .actions a {
            background: #6c757d;
        }

        .errors {
            margin-bottom: 12px;
            color: #842029;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Program</h2>

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('programs.update', $program->program_id) }}">
            @csrf
            @method('PUT')

            <label for="code">Code</label>
            <input type="text" id="code" name="code" value="{{ old('code', $program->code) }}" required>

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $program->title) }}" required>

            <label for="years">Years</label>
            <input type="number" id="years" name="years" value="{{ old('years', $program->years) }}" min="1" required>

            <div class="actions">
                <button type="submit">Update</button>
                <a href="{{ route('programs.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>