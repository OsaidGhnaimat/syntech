<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            margin-top: -150px;
            width: 100%;
            max-width: 400px;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            background-color: rgba(19, 106, 213, 0.85);
            color: #fff;
            font-weight: bold;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: rgba(19, 106, 213, 0.85);
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: rgba(19, 106, 213, 0.85);
        }

        .alert {
            margin-bottom: 20px;
        }

        .text-danger {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <main class="login-form">
        <div style="text-align: center;">
            <img src="{{ asset('public/images/syntech-logo.png') }}" style="width: 50%;" title="logo" alt="logo">
        </div>

        <div class="container">
            <div class="card">
                <div class="card-header">Reset Password</div>
                <div class="card-body">

                    @if ($errors->any())
                    <div class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <input type="hidden" name="token" value="{{ $token }}">

                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
</body>

</html>






