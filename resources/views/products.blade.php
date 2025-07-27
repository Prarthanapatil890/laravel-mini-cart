<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">🛒 Laravel Mini Cart</h1>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        @foreach ($products as $id => $product)
            <div class="border rounded-lg p-5 shadow hover:shadow-lg transition">
                <div class="text-lg font-semibold mb-1">{{ $product['name'] }}</div>
                <div class="text-sm text-gray-500 mb-2">Product ID: {{ $product['id'] }}</div>
                <div class="text-xl font-bold mb-4">₹{{ $product['price'] }}</div>
                <form action="{{ route('add-to-cart', $id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

    @if (!empty($cart))
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">🛍️ Your Cart</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3">Product</th>
                        <th class="p-3">Price</th>
                        <th class="p-3">Qty</th>
                        <th class="p-3">Subtotal</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart as $id => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr class="border-t">
                            <td class="p-3">{{ $item['name'] }}</td>
                            <td class="p-3">₹{{ $item['price'] }}</td>
                            <td class="p-3 flex items-center">
                                <form action="{{ route('decrease-qty', $id) }}" method="POST" class="mr-2">@csrf <button class="px-2 bg-gray-300">-</button></form>
                                {{ $item['quantity'] }}
                                <form action="{{ route('increase-qty', $id) }}" method="POST" class="ml-2">@csrf <button class="px-2 bg-gray-300">+</button></form>
                            </td>
                            <td class="p-3">₹{{ $subtotal }}</td>
                            <td class="p-3">
                                <form action="{{ route('remove-from-cart', $id) }}" method="POST">@csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-bold border-t-2">
                        <td colspan="3" class="p-3 text-right">Total:</td>
                        <td class="p-3">₹{{ $total }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-4 flex gap-4">
                <form action="{{ route('clear-cart') }}" method="POST">@csrf
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Clear Cart</button>
                </form>
                <form action="{{ route('checkout') }}" method="POST">@csrf
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Checkout</button>
                </form>
            </div>
        </div>
    @endif
</body>
</html>
