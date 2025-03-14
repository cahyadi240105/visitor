<?php
    
    session_start();

    include "koneksi.php";

    @$pass = md5($_POST['password']);
    @$username = mysqli_escape_string($conn, $_POST['username']);
    @$password = mysqli_escape_string($conn, $pass);


    $login = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' AND password ='$password'");

    $data = mysqli_fetch_array($login);
    
    if($data) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];

        header('location: admin.php');
    }else{
        echo "<script>
        alert('Maaf,Login Anda Gagal,Pastikan Username & Password Anda Benar!');
        document.location='index.php';
        </script>";
    }
    
?>