
<?php
require_once 'koneksi.php';

$query = "SELECT * FROM view_margin_penjualan";
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
    <title>Margin Penjualan</title>

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
    <h1>Data Margin Penjualan</h1>
    <p>Daftar margin penjualan dan informasi pencatatannya.</p>

    <table>
        <thead>
            <tr>
                <th>ID Margin</th>
                <th>Persen (%)</th>
                <th>Status</th>
                <th>Dibuat Oleh</th>
                <th>Dibuat Pada</th>
                <th>Diperbarui Pada</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($margin = $hasil->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars((string)$margin['idmargin_penjualan']) ?></td>
                    <td><?= htmlspecialchars((string)$margin['persen']) ?>%</td>
                    <td><?= htmlspecialchars((string)$margin['status']) ?></td>
                    <td><?= htmlspecialchars((string)$margin['dibuat_oleh']) ?></td>
                    <td><?= htmlspecialchars((string)$margin['created_at']) ?></td>
                    <td><?= htmlspecialchars((string)$margin['updated_at']) ?></td>
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
