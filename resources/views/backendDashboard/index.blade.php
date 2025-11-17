<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            height: 100vh;
            background-color: #0d1117;
            margin-top: 3rem;
            
        }

        .card {
            background: #161b22;
            border: 1px solid #1f6feb;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            color: white;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px 5px #1f6feb;
        }

        .card a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 1rem;
            height: 100%;
        }

        .card a:hover {
            text-decoration: none;
        }

        .card-title {
            font-weight: bold;
        }

        .card-description {
            font-size: 14px;
        }

        .container {
            width: 80%;
        }

        /* User section styles */
        .futuristic-table {
            background: #161b22;
            border: 1px solid #1f6feb;
            border-radius: 10px;
            box-shadow: 0 0 10px 2px #1f6feb;
        }

        .futuristic-table th, .futuristic-table td {
            text-align: center;
            padding: 10px;
            border: 1px solid #1f6feb;
            color: white; /* Ensure the text color is bright white */
        }

        .futuristic-table th {
            background-color: #1f6feb;
            color: white;
        }

        .btn-futuristic {
            background: #1f6feb;
            color: white;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-futuristic-danger {
            background: #f55c51;
            color: white;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-futuristic:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px 3px #1f6feb;
            border: 1px solid #1f6feb;
            color: white;
        }

        .btn-futuristic-danger:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px 3px #f55c51;
            border: 1px solid #f55c51;
            color: white;
        }

        .header-section {
            color: white;
            text-decoration: underline;
            font-family: 'Roboto', sans-serif;
        }

        .modal-content {
            background: #161b22;
            border: 1px solid #1f6feb;
            color: white;
        }

        .modal-header {
            border-bottom: 1px solid #1f6feb;
        }

        .modal-footer {
            border-top: 1px solid #1f6feb;
        }
    </style>
</head>
<body>

@yield('main-content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
</body>
</html>