<?php
include "koneksi.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nama_file = $_POST['nama_file'];
    $ukuran = $_POST['ukuran'];
    $created_at = $_POST['created_at'];

    $query = mysqli_prepare(
        $conn,
        "UPDATE mahasiswa
         SET nama_file=?, ukuran=?, created_at=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param($query, "sssi", $nama_file, $ukuran, $created_at);
    mysqli_stmt_execute($query);

    header("Location: index.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$mhs = mysqli_fetch_assoc($data);
?>

<h2>Edit Mahasiswa</h2>
<link rel="stylesheet" href="css/style.css">
<div class="container">
        <div class="card">
            <h2>Edit Mahasiswa</h2>
            <p class="subtitle">Edit data mahasiswa.</p>

            <form method="POST">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($mhs['nama']) ?>"><br><br>
                
                <label>NIM</label>
                <input type="text" name="nim" value="<?= htmlspecialchars($mhs['nim']) ?>"><br><br>
                
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="<?= htmlspecialchars($mhs['jurusan']) ?>"><br><br>

                <button type="submit" name="submit" class="btn btn-hapus">Update</button>
            </form>
        </div>
</div>
