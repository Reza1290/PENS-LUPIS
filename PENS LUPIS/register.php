<?php
include "db.php";

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek konfirm password
    if ($password != $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }
    
    //cek username
    $cekuser = mysqli_query($conn,"SELECT username FROM tb_admin WHERE username = '$username'");

    if(mysqli_fetch_assoc($cekuser)){
        echo "<script>
                alert('Username sudah terdaftar sebelumnya');
            </script>";
        return false;
    }

    //enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    //insert ek database
    include 'db.php';
    mysqli_query($conn, "INSERT INTO tb_admin(`admin_id`,`username`,`password`) VALUES(null,'".$username."','".$password."')");

    return mysqli_affected_rows($conn);
}

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('User baru berhasil ditambahkan');
            </script>";
        echo '<script>window.location="login.php"</script>';
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Toko</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap');
*{
    margin:0;
    padding:0;
    font-family: 'Lexend', sans-serif; 
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
html, body{
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: transparent;
    overflow: hidden;
}
canvas{

    background-color: whitesmoke;
}
.box-login {
    position: relative;
    padding: 25px;
    font-weight: 300;
    height: auto;
    width: 300px;
    background-color: white;
    border: solid 2px black;
    border-radius: 15px;
    text-align: center;
}
.box-pos{
    left: 50%;
    transform: translate(-50%);
    position: absolute; 
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
}
.box-login h1{
    margin-bottom: 20px;
}       
.box-ask{
    margin-bottom: 20px;
    text-align: start;
}
.input-box{
    padding-left: 10px;
    margin-bottom: 15px;
    width: 100%;
    height: 40px;
    border-radius: 15px;
    border: none;
    background-color: whitesmoke;

}
.btn-submit{
    height: 30px;
    width: 50%;
    border-radius: 15px;
    border: none;
    background-color: rgb(255, 44, 44);
    color: white;
    z-index: -1;
}

.btn-submit:hover{
    background-color: black;
    cursor: pointer;
}


    </style>
    
</head>
<body>
<div class="box-pos">
            <div class="box-login">
                <h1>Daftar</h1>
                <form action="" method="POST">
                    <input type="text" name="username" placeholder="Username" class="input-box">
                    <input type="password" name="password" placeholder="Password" class="input-box">
                    <input type="password" name="password2" placeholder="Password" class="input-box">
                    <!-- <div class="checkbox" align="left" style="font-size:14px">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                     </div><br> -->
                    <p class="box-ask"><small>Sudah memiliki akun? <a href="login.php">login</a></small><br></p>
                    <input type="submit" name="register" class="btn-submit" value="Daftar">
                </form><br>    
                </div>
        </div>
    <canvas id="nokey" width="800" height="800">
        Your Browser Don't Support Canvas, Please Download Chrome ^_^``
    </canvas>
              
</body>
<script src="poli.js"></script>

</html>