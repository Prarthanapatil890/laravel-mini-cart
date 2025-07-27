<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if(empty($cart))
        <p class="text-gray-600">Your cart is empty. <a href="{{ route('products') }}" class="text-blue-500">Go Shopping</a></p>
    @else
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Quantity</th>
                    <th class="p-4">Subtotal</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr class="border-b">
                    <td class="p-4">{{ $item['name'] }}</td>
                    <td class="p-4">₹{{ $item['price'] }}</td>
                    <td class="p-4">{{ $item['quantity'] }}</td>
                    <td class="p-4">₹{{ $item['price'] * $item['quantity'] }}</td>
                    <td class="p-4 flex space-x-2">
                        <form action="{{ route('cart.increase', $id) }}" method="POST">@csrf<button class="bg-green-500 px-2 text-white rounded">+</button></form>
                        <form action="{{ route('cart.decrease', $id) }}" method="POST">@csrf<button class="bg-yellow-500 px-2 text-white rounded">-</button></form>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">@csrf<button class="bg-red-500 px-2 text-white rounded">X</button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 text-xl font-semibold">
            Grand Total: ₹{{ $grandTotal }}
        </div>

        <div class="mt-6 flex space-x-4">
            <form action="{{ route('cart.clear') }}" method="POST">@csrf
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Clear Cart</button>
            </form>
            <form action="{{ route('cart.checkout') }}" method="POST">@csrf
                <button class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">Checkout</button>
            </form>
            <a href="{{ route('products') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Continue Shopping</a>
        </div>
    @endif
</body>
</html>
