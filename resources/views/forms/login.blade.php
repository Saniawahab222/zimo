<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #212121;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .container h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .container .form-group {
            margin-bottom: 15px;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
            font-weight: bold;
        }

        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #444444;
            border-radius: 3px;
            transition: background-color 0.3s ease-in-out;
            color: #fff;
        }

        .container input[type="email"]:focus,
        .container input[type="password"]:focus {
            background-color: #555555;
            outline: none;
        }

        .container .error-message {
            color: #ff0000;
            margin-top: 5px;
        }

        .container .success-message {
            color: #008000;
            margin-top: 5px;
        }

        .container .submit-button {
            background-color: #2980b9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            display: flex;
            align-items: center;
        }

        .container .submit-button:hover {
            background-color: #2471a3;
        }

        .container .submit-button i {
            margin-right: 5px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .container h1 {
                font-size: 24px;
                margin-bottom: 15px;
            }

            .container input[type="email"],
            .container input[type="password"] {
                padding: 8px;
            }

            .container .submit-button {
                padding: 8px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user"></i> Login</h1>

        <form method="POST" action="{{ url('/navbar') }}">
            @csrf

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button"><i class="fas fa-sign-in-alt"></i> Login</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>
