<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Obat</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .medicine-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .medicine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .quantity-controls button {
            background-color: #ffcc00;
            padding: 0.25rem 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Pembelian Obat</h1>
            <!-- Card Produk Obat -->
            <div class="medicine-card bg-white border rounded-lg p-4 mb-6">
                <img src="../assets/images/paracetaol.jpg" alt="Gambar Obat" class="w-full h-40 object-cover rounded">
                <div class="mt-4">
                    <h2 class="text-xl font-semibold">Paracetamol</h2>
                    <p class="text-gray-600 text-sm mt-2">Obat ini digunakan untuk mengurangi rasa sakit dan demam.</p>
                    <p class="text-yellow-500 font-bold text-lg mt-2">IDR 5,000 / satuan</p>
                </div>
            </div>

            <!-- Form Pembelian -->
            <form action="../controllers/PurchaseController.php?action=buy" method="POST">
                <input type="hidden" name="medicine_name" value="Paracetamol">
                <input type="hidden" name="price" value="5000">

                <label class="block mb-2">Kuantitas:</label>
                <div class="quantity-controls flex items-center mb-4">
                    <button type="button" class="decrement bg-gray-300 px-2 py-1 text-gray-800 font-bold">-</button>
                    <input type="number" name="quantity" class="border border-gray-300 p-2 w-16 mx-2 text-center" value="1" min="1" required>
                    <button type="button" class="increment bg-gray-300 px-2 py-1 text-gray-800 font-bold">+</button>
                </div>

                <div class="flex justify-between items-center mb-4">
                    <p class="text-gray-700 font-bold">Total Harga:</p>
                    <p class="text-yellow-500 font-bold text-lg total-price">IDR 5,000</p>
                </div>

                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 w-full rounded">Beli Sekarang</button>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk Menghitung Total Harga -->
    <script>
        const quantityInput = document.querySelector("input[name='quantity']");
        const totalPriceElement = document.querySelector(".total-price");
        const incrementButton = document.querySelector(".increment");
        const decrementButton = document.querySelector(".decrement");
        const pricePerUnit = 5000; // Harga per satuan

        // Fungsi untuk memperbarui total harga
        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = pricePerUnit * quantity;
            totalPriceElement.textContent = `IDR ${totalPrice.toLocaleString()}`;
        }

        // Tambah atau Kurangi Kuantitas
        incrementButton.addEventListener("click", () => {
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
            updateTotalPrice();
        });

        decrementButton.addEventListener("click", () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
                updateTotalPrice();
            }
        });

        // Update Total Harga Saat Kuantitas Diubah Secara Manual
        quantityInput.addEventListener("input", updateTotalPrice);
    </script>
</body>
</html>
