<?php

include "koneksi.php";
if (isset($_POST['submit'])) {
    $nama_file = $_POST['nama_file'];
    $ukuran = $_POST['ukuran'];
    $created_at = $_POST['created_at'];

    $query = mysqli_prepare(
        $conn,
        "INSERT INTO file (nama_file, ukuran, created_at)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param($query, "sss", $nama_file, $ukuran, $created_at);
    mysqli_stmt_execute($query);

    header("Location: index.php");
    exit;
}
?>

<h2>Tambah File</h2>
<link rel="stylesheet" href="css/style.css">
<div class="container">

    <div class="card">

        <h2>Kirim File</h2>
        <p class="subtitle">Masukkan File.</p>

        <form method="POST">

            <label>Nama File</label>
            <input type="text" name="nama_file" required>

            <label>Ukuran</label>
            <input type="text" name="ukuran" required>

            <label>Created At</label>
            <input type="date" name="jurusan" required>

            <p>
            <label for="file-upload">Choose files (required)</label>
            <input
                type="file"
                id="file-upload"
                accept=".zip"
                name="files"
                multiple
                required
                aria-describedby="file-help"
            />
            </p>

            <button type="submit" name="submit" class="btn">
                Simpan
            </button>

            <a href="index.php" class="btn btn-hapus">
                Kembali
            </a>

        </form>

    </div>

</div>