
<?php
require_once 'koneksi.php';

$query = "SELECT * FROM view_barang";
$hasil = $koneksi->query($query);

if (!$hasil) {
    die("Query gagal: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 35px;
            background: #f5f6fa;
        }

        h1 {
            color: #273469;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #273469;
            color: white;
        }

        tr:nth-child(even) {
            background: #f0f2f8;
        }
    </style>
</head>
<body>

    <h1>Data Barang</h1>
    <p>Daftar barang dari VIEW MySQL.</p>

    <table>
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Status</th>
                <th>Harga</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($barang = $hasil->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars((string)$barang['idbarang']) ?></td>
                    <td><?= htmlspecialchars((string)$barang['jenis']) ?></td>
                    <td><?= htmlspecialchars((string)$barang['nama']) ?></td>
                    <td><?= htmlspecialchars((string)$barang['nama_satuan']) ?></td>
                    <td><?= htmlspecialchars((string)$barang['status']) ?></td>
                    <td>Rp<?= number_format((float)$barang['harga'], 0, ',', '.') ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>

<?php
$hasil->free();
$koneksi->close();
?>
