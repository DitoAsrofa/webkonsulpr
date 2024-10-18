<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webkonsul";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$purchaseId = $_GET['purchase_id'];
$sql = "SELECT * FROM purchases WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $purchaseId);
$stmt->execute();
$result = $stmt->get_result();
$purchase = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .invoice-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .total-section {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body class="bg-gray-100 py-12">
    <div class="invoice-container">
        <div class="invoice-header flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">INVOICE</h1>
                <p>Kepada: <strong><?php echo "Nama Pengguna"; // Gantikan dengan nama pengguna jika ada ?></strong></p>
                <p>Email: <?php echo "user@example.com"; // Gantikan dengan email pengguna jika ada ?></p>
            </div>
            <div class="text-right">
                <p><strong>Tanggal: </strong><?php echo date("l, d M Y", strtotime($purchase['order_date'])); ?></p>
                <p><strong>No Invoice: </strong><?php echo str_pad($purchase['id'], 6, '0', STR_PAD_LEFT); ?></p>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr class="bg-gray-200">
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jml</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $purchase['medicine_name']; ?></td>
                    <td>IDR <?php echo number_format($purchase['price'] / $purchase['quantity'], 0, ',', '.'); ?></td>
                    <td><?php echo $purchase['quantity']; ?></td>
                    <td>IDR <?php echo number_format($purchase['price'], 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <p class="text-lg"><strong>Sub Total:</strong> IDR <?php echo number_format($purchase['price'], 0, ',', '.'); ?></p>
            <p class="text-lg"><strong>Pajak (10%):</strong> IDR <?php echo number_format($purchase['price'] * 0.1, 0, ',', '.'); ?></p>
            <p class="text-xl font-bold"><strong>Total:</strong> IDR <?php echo number_format($purchase['price'] * 1.1, 0, ',', '.'); ?></p>
        </div>

        <div class="mt-6 text-center">
            <p>Terimakasih atas pembelian Anda</p>
            <p>Jika Anda memiliki pertanyaan, hubungi kami di no: +123-456-7890</p>
        </div>

        <div class="mt-8 flex justify-between items-center">
            <div class="text-left">
                <p>Pembayaran:</p>
                <p>Nama: Web Konsul Pharmacy</p>
                <p>No Rek: +123-456-7890</p>
            </div>
            <div class="text-right">
                <p>_________________________</p>
                <p>WebKonsul</p>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="../views/dashboard.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
