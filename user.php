
<?php
require_once 'koneksi.php';

$query = "SELECT * FROM view_user";
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
    <title>Data User</title>

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
    <h1>Data User</h1>
    <p>Daftar pengguna dan role yang dimiliki.</p>

    <table>
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Nama Role</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($user = $hasil->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars((string)$user['iduser']) ?></td>
                    <td><?= htmlspecialchars((string)$user['username']) ?></td>
                    <td><?= htmlspecialchars((string)$user['nama_role']) ?></td>
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
