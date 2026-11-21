<?php

include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_prepare($conn, "DELETE FROM file WHERE id=?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);

header("Location: index.php");
exit;
?>