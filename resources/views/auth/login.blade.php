<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #0b2a4a;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .login-wrapper {
            width: 380px;
            margin: 200px auto;
            background: #fff;
            padding: 28px;
        }

        .login-wrapper h1 {
            text-align: center;
            color: #0b4599;
            margin: 0 0 10px;
        }

        .login-wrapper hr {
            border: 2px solid #d4a017;
            margin: 0 0 24px;
        }

        .login-wrapper label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .login-wrapper input[type="text"],
        .login-wrapper input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            box-sizing: border-box;
        }

        .login-wrapper button {
            width: 100%;
            background: #0b4599;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-wrapper button:hover {
            background: #08397f;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 12px;
            text-align: center;
            font-weight: bold;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f1aeb5;
        }

        .default-admin {
            text-align: center;
            margin-top: 28px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <h1>Login Portal</h1>
        <hr>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 18px; text-align: left;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>