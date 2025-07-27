<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to MiniCart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="text-center">
        <h1 class="display-4 fw-bold mb-4">🛒 Welcome to MiniCart!</h1>
        <p class="lead mb-5">Your simple and sleek Laravel-powered cart system.</p>
        <a href="{{ route('products') }}" class="btn btn-primary btn-lg shadow">Start Shopping</a>
    </div>

</body>
</html>
