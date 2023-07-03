<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #1f1f1f;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-out;
        }

        .registration-form div {
            margin-bottom: 10px;
            animation: slideIn 0.5s ease-out;
        }

        .registration-form label {
            font-weight: bold;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"],
        .registration-form input[type="tel"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #1f1f1f;
            color: #fff;
        }

        .registration-form input[type="text"]::placeholder,
        .registration-form input[type="email"]::placeholder,
        .registration-form input[type="password"]::placeholder,
        .registration-form input[type="tel"]::placeholder {
            color: #ccc;
        }

        .registration-form button.register-button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .registration-form button.register-button:hover {
            background-color: #45a049;
        }

        .registration-form p {
            margin: 10px 0;
            font-size: 14px;
            text-align: center;
        }

        .registration-form a {
            color: #4caf50;
            text-decoration: none;
        }

        .registration-form a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-10px);
            }

            to {
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .registration-form {
                max-width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">Registration Form</h1>

    <form method="POST" action="{{ route('register') }}" class="registration-form">
        @csrf

        <div>
            <label for="name"><i class="fas fa-user"></i> Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation"><i class="fas fa-lock"></i> Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <label for="phone"><i class="fas fa-phone"></i> Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div>
            <label for="country"><i class="fas fa-globe"></i> Country</label>
            <input type="text" id="country" name="country" value="{{ old('country') }}" required>
        </div>

        <div>
            <button type="submit" class="register-button"><i class="fas fa-user-plus"></i> Register</button>
            <p>Already have an account? <a href="{{ route('loginform') }}">Login</a></p>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
    