{{-- Login Page --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #0d1117;
            margin: 0;
            color: white;
        }

        .login-container {
            background: #161b22;
            border: 1px solid #1f6feb;
            border-radius: 10px;
            box-shadow: 0 0 15px 3px #1f6feb;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .form-control {
            background: #0d1117;
            border: 1px solid #1f6feb;
            color: white;
        }

        .form-control:focus {
            box-shadow: 0 0 10px #1f6feb;
            border-color: #1f6feb;
        }

        .btn-futuristic {
            background: #1f6feb;
            color: white;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        .btn-futuristic:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px 3px #1f6feb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-futuristic">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
