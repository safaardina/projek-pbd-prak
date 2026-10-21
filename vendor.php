
<?php
require_once 'koneksi.php';

$query = "SELECT * FROM view_vendor";
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
    <title>Data Vendor</title>

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
    <h1>Data Vendor</h1>
    <p>Daftar vendor yang tersimpan dalam database.</p>

    <table>
        <thead>
            <tr>
                <th>ID Vendor</th>
                <th>Nama Vendor</th>
                <th>Badan Hukum</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($vendor = $hasil->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars((string)$vendor['idvendor']) ?></td>
                    <td><?= htmlspecialchars((string)$vendor['nama_vendor']) ?></td>
                    <td><?= htmlspecialchars((string)$vendor['badan_hukum']) ?></td>
                    <td><?= htmlspecialchars((string)$vendor['status']) ?></td>
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

