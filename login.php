<?php
require('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $emailCheck = mysqli_real_escape_string($koneksi, $email);
        $passCheck = mysqli_real_escape_string($koneksi, $pass);

        $query = "SELECT * FROM user_detail WHERE user_email = '$emailCheck'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_array($result);
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
            $level = $row['level'];

            if ($userVal == $emailCheck && $passVal == $passCheck) {
                header("Location: home.php?user_fullname=$userVal");
                exit;
            } else {
                $error = 'User atau password salah!!';
            }
        } else {
            $error = 'User tidak ditemukan!!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }

    if (isset($error)) {
        echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email</label>
                                <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            <p class="mt-2">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
