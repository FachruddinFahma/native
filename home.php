<?php
require('koneksi.php');
$email = $_GET['user_fullname'] ?? false;

// if (!$email) header("Location: login.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang <?php echo $email;?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user_detail";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while ($row = mysqli_fetch_array($result)){
                    $userMail = $row['user_email'];
                    $username = $row['user_fullname'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no;?></th>
                        <td><?php echo $userMail;?></td>
                        <td><?php echo $username;?></td>
                        <td><a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="hapus.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php
                    $no++;
                }?>
            </tbody>
        </table>
        <p><a href="login.php" class="btn btn-secondary">Log Out</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
