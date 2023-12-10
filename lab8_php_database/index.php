<?php
include("koneksi.php");
// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
    <style>
        /* Reset some default styles */
body,
h1,
h2,
p,
table {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

.main {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

img {
    max-width: 50px;
    max-height: 50px;
    border-radius: 4px;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    table {
        border: 0;
    }

    table caption {
        font-size: 1.3em;
    }

    table thead {
        display: none;
    }

    table tr {
        margin-bottom: 10px;
        display: block;
        border: 1px solid #ddd;
    }

    table td {
        display: block;
        text-align: right;
        font-size: 13px;
        border-bottom: 1px dotted #ddd;
    }

    table td:last-child {
        border-bottom: 0;
    }
}

    </style>
</head>

<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result): ?>
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?=
                                  $row['nama']; ?>"></td>
                            <td>
                                <?= $row['nama']; ?>
                            </td>
                            <td>
                                <?= $row['kategori']; ?>
                            </td>
                            <td>
                                <?= $row['harga_beli']; ?>
                            </td>
                            <td>
                                <?= $row['harga_jual']; ?>
                            </td>
                            <td>
                                <?= $row['stok']; ?>
                            </td>
                            <td class="aksi">
                                <a class="ubah" href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                                <a class="hapus" href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>