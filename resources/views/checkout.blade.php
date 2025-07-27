<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Placed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 h-screen flex justify-center items-center">
    <div class="bg-white p-10 rounded shadow text-center">
        <h1 class="text-4xl font-bold text-green-700 mb-4">✅ Thank You!</h1>
        <p class="text-lg text-gray-700 mb-6">Your order has been placed successfully.</p>
        <a href="{{ route('products') }}" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Continue Shopping</a>
    </div>
</body>
</html>
