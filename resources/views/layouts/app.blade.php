<!DOCTYPE html>
<html>
<head>
    <title>Modular Synth App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: url('{{ asset('images/synth-wall.png') }}') center/cover no-repeat fixed;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* optional: makes content readable */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
