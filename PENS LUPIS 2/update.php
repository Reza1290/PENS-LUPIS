<?php 
 session_start();
 if($_SESSION['status_login'] != true){
     echo '<script>window.location="login.php"</script>';
 }

include "db.php";

$show = mysqli_query($conn,"SELECT * FROM `tb_mahasiswa` WHERE ID = '".$_GET['id']."'");
if(!(mysqli_num_rows($show))) echo '<script>window.location="index.php"</script>';
$row = mysqli_fetch_array($show);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style/global.css?=v<?=time();?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        *{
            background-color: var(--bgBlack);
            color: var(--hitam);
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
        }
        .main{
            top: 60px;
            display: flex;
            justify-content: center;
            align-items:center;
            margin-top: 50px;
            margin-bottom: 20px;
            
        }
        .daftar{
            width: 40%;
        }
        .daftar label{
            font-weight: 400;
            
        }
        .daftar select{
            border: 1px solid #C0CCDA;
            border-radius: 5px;
            height: 30px;
        }
        .daftar input{
            border: 1px solid #C0CCDA;
            border-radius: 5px;
            height: 30px;
            width: 100%;
        }
        .btn{
            background-color: #0162EC;
            color: white
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="sticky-bar">
            <div class="logo-wrap">

                <img class="logo" src="https://upload.wikimedia.org/wikipedia/id/4/44/Logo_PENS.png" alt="">
                <a href="home.php">Pens Lupis</a>
            </div>
            <div class="menu">
                <li><a href="profil.php">           <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            </a></li>

            </div>
        </div>
         
    </div>
<div class="main" style="">
        <form action="" method="POST" class="daftar">
            <h1>UPDATE DATA</h1>
            <small>Masukkan Data Dengan Benar</small><br><br>
            
                <label for="nama">Nama Lengkap</label><br><br>
                <input type="text" name="nama" placeholder="" value="<?= $row[2]?>" required><br><br>
                <label for="nro">NRP</label><br><br>
                <input type="text" name="nrp" placeholder="" value="<?= $row[1]?>" required><br><br>
                <label for="gen">Jenis Kelamin</label><br><br>
                <select name="gen" id="gender"><br><br>
                    <option value="1">LAKI-LAKI</option>
                    <option value="0">PEREMPUAN</option>
                </select><br><br>
                <label for="email">Email</label><br><br>
                <input type="email" name="email" placeholder="" value="<?= $row[5]?>" required><br><br>
                <label for="jur">Jurusan</label><br><br>
                <input type="text" name="jur" placeholder="" value="<?= $row[4]?>" required><br><br>
                <label for="hp">NO HP</label><br><br>
                <input type="text" name="hp" placeholder="" value="<?= $row[7]?>" required><br><br>
                <label for="sma">ASAL SMA</label><br><br>
            <input type="text" name="sma" placeholder="" value="<?= $row[8]?>" required><br><br>
            <label for="mk">MATA KULIAH FAVORIT</label><br><br>
            <input type="text" name="mk" placeholder="" value="<?= $row[9]?>" required><br><br>
            <label for="alamat">ALAMAT </label><br><br>
            <input type="text" name="alamat" placeholder="" value="<?= $row[6]?>" required><br><br>
            <br>
            <input class="btn" type="submit" name="submitted" value="UPDATE">
        
        </form>
        
    </div>
<?php 

    if(isset($_POST['submitted'])){
        $nama = $_POST['nama'];
        $nrp = $_POST['nrp'];
        $alamat = $_POST['alamat'];
        $gen =$_POST['gen'];
        $jur = $_POST['jur'];
        $email = $_POST['email'];
        $sma = $_POST['sma'];
        $mk = $_POST['mk'];
        $hp = $_POST['hp'];

        $update = mysqli_query($conn, "UPDATE `tb_mahasiswa` SET `ID`= '".$_GET['id']."',
        `NRP`='".$nrp."',
        `NAMA`='".$nama."',
        `GENDER`='".$gen."',
        `JURUSAN`='".$jur."',
        `EMAIL`='".$email."',
        `ALAMAT`='".$alamat."',
        `HP`='".$hp."',
        `SMA`='".$sma."',
        `F_MATKUL`='".$mk."'
         WHERE ID = '".$_GET['id']."'");
        if($update){
            echo "<script>let timerInterval
            Swal.fire({
              icon: 'success',
              title: 'Update Success!',
              timer: 2000,
            }).then(function(){window.location='index.php';})
            </script>";
        }else{
            echo "<script>Swal.fire('ERROR')</script>";
            echo mysqli_error($conn);
        }
    }
    ?>
    <script>

    </script>
    
</body>
</html>