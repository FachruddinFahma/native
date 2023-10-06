<?php
require ('koneksi.php');

if (isset($_POST['update'])){
    $userId = $_POST['txt_id']; // Perbaikan: $_POST (huruf O besar)
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    // Perbaikan: Anda harus menggunakan prepared statement untuk mencegah SQL injection
    $query = "UPDATE user_detail SET user_password=?, user_fullname=? WHERE id=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $userPass, $userName, $userId);
    mysqli_stmt_execute($stmt);

    
    if(mysqli_affected_rows($koneksi) > 0) {
        header('Location: login.php');
        exit(); 
    } else {
        echo "Gagal melakukan update.";
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
while ($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $userMail = $row['user_email']; // Perbaikan: nama variabel harus sesuai
    $userPass = $row['user_password'];
    $userName = $row['user_fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profil</title> <!-- Perbaikan: judul halaman -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="edit.php" method="POST">
            <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Email :</label>
                <input type="text" class="form-control" name="txt_email" value="<?php echo $userMail; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Password :</label>
                <input type="password" class="form-control" name="txt_pass" value="<?php echo $userPass; ?>">
            </div>
            <div class="form-group">
                <label>Nama :</label>
                <input type="text" class="form-control" name="txt_nama" value="<?php echo $userName; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
        <a href="home.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>
