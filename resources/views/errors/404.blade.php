<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #0d1117;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #1f6feb;
            animation: glow 1.5s infinite alternate;
        }

        .error-message {
            font-size: 1.5rem;
            margin-top: 20px;
            color: #c9d1d9;
        }

        .back-btn {
            margin-top: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            background: #1f6feb;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .back-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px 3px #1f6feb;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px #1f6feb, 0 0 20px #1f6feb, 0 0 30px #1f6feb;
            }
            to {
                text-shadow: 0 0 20px #1f6feb, 0 0 30px #1f6feb, 0 0 40px #1f6feb;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! The page you're looking for doesn't exist.</div>
        <a href="/" class="back-btn mt-3">Go Back Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
