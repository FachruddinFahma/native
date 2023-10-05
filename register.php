<?php
require('koneksi.php');

if (isset($_POST['register'])) {
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "INSERT INTO user_detail  VALUES ('', '$userMail', '$userPass', '$userName', 2)";
    $result = mysqli_query($koneksi, $query);
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_nama">Nama</label>
                                <input type="text" class="form-control" id="txt_nama" name="txt_nama" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="register">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Sudah punya akun? <a href="login.php">Login di sini</a></p>
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
