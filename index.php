
<?php

include "koneksi.php";
include "auth.php";
$data = mysqli_query($conn, "SELECT * FROM file");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">

    <div>
        <h2>Data Mahasiswa</h2>
    </div>

</div>
    <p class="subtitle">Kelola data mahasiswa dengan mudah.</p>

    <div class="card">

        <a href="tambah.php" class="btn btn-tambah">
            + Tambah Mahasiswa
        </a>

        <table>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Ukuran File</th>
                <th>Dibuat pada</th>
            </tr>

            <?php while ($mhs = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= htmlspecialchars($mhs['id']) ?></td>
                <td><?= htmlspecialchars($mhs['nama_file']) ?></td>
                <td><?= htmlspecialchars($mhs['ukuran']) ?></td>
                <td><?= htmlspecialchars($mhs['created_at']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $mhs['id'] ?>" class="btn btn-edit">Edit</a>

                    <a href="hapus.php?id=<?= $mhs['id'] ?>"
                       class="btn btn-hapus"
                       onclick="return confirm('Yakin ingin menghapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>

        </table>

    </div>
</div>

</body>
</html>
