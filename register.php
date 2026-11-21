
<?php
include "koneksi.php";

$error = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_prepare(
        $conn,
        "INSERT INTO users (username, password) VALUES (?, ?)"
    );

    mysqli_stmt_bind_param($query, "ss", $username, $password);

    if (mysqli_stmt_execute($query)) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Username sudah digunakan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="card">

        <h2>Register</h2>
        <p class="subtitle">Buat akun baru.</p>

        <p><?= htmlspecialchars($error) ?></p>

        <form method="POST">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" name="register" class="btn btn-tambah">
                Register
            </button>

        </form>

        <p>Sudah punya akun? <a href="login.php">Login</a></p>

    </div>
</div>

</body>
</html>
