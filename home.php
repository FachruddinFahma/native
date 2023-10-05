<?php
require ("koneksi.php");
$email = $_GET['user_fullname'];
?>
<html>
<head>
        <title>home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $email;?></h1>
    <table border