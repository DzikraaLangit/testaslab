<?php
include "koneksi.php";
include "auth.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nama_file = $_POST['nama_file'];
    $ukuran = $_POST['ukuran'];
    $created_at = $_POST['created_at'];

    $query = mysqli_prepare(
        $conn,
        "UPDATE file
         SET nama_file=?, ukuran=?, created_at=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param($query, "sss", $nama_file, $ukuran, $created_at);
    mysqli_stmt_execute($query);

    header("Location: index.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM file WHERE id=$id");
$mhs = mysqli_fetch_assoc($data);
?>

<h2>Edit File</h2>
<link rel="stylesheet" href="css/style.css">
<div class="container">
        <div class="card">
            <h2>Edit File</h2>
            <p class="subtitle">Edit File.</p>

            <form method="POST">
                <label>Nama</label>
                <input type="text" name="nama_file" value="<?= htmlspecialchars($mhs['nama_file']) ?>"><br><br>
                
                <label>NIM</label>
                <input type="text" name="ukuran" value="<?= htmlspecialchars($mhs['ukuran']) ?>"><br><br>
                
                <label>Jurusan</label>
                <input type="text" name="created_at" value="<?= htmlspecialchars($mhs['created_at']) ?>"><br><br>

                <button type="submit" name="submit" class="btn btn-hapus">Update</button>
            </form>
        </div>
</div>
