<?php 
 session_start();
 if($_SESSION['status_login'] != true){
     echo '<script>window.location="login.php"</script>';
 }

if(!(isset($_GET['id']))) echo '<script>window.location="index.php"</script>';
include 'db.php'; 
$d = mysqli_query($conn,"SELECT * FROM `tb_mahasiswa` WHERE ID = '".$_GET['id']."'");

if(mysqli_num_rows($d)){
    $data = mysqli_fetch_array($d);

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHASISWA | <?php echo $data[1];?></title>
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
            display: flex;
            justify-content: center;
            align-items:center;
            margin: 0px 20px;
        }
        .main p{
            border: 1px solid #E7E7E7;
            border-radius: 5px;
            padding: 5px;
        }
        .main p b{
            font-size: 12px;
        }
        </style>
</head>
<body>
    
    <div class="main">
    <div class="" style="width: 30%;">

        <h1 style="text-align:center">DATA LENGKAP</h1>
        <a style="color: blue;"href="index.php">< Kembali</a><br>
        <legend>
            <p><b>NRP</b><br><?=$data[1]; ?></p>
            <p><b>NAMA</b><br><?=$data[2]; ?></p>
            <p><b>JENIS KELAMIN</b><br><?php if($data[3])echo "LAKI-LAKI";else echo "PEREMPUAN"; ?></p>
            <p><b>JURUSAN</b><br><?=$data[4]; ?></p>
            <p><b>EMAIL</b><br><?=$data[5]; ?></p>
            <p><b>ALAMAT</b><br><?=$data[6]; ?></p>
            <p><b>NO HP</b><br><?=$data[7]; ?></p>
            <p><b>ASAL SMA</b><br><?=$data[8]; ?></p>
            <p><b>MATA KULIAH FAVORIT</b><br><?=$data[9]; ?></p>
        
        </legend>
        
    <button onclick="confirmHapus('proses-hapus.php?id=<?php echo $data[0]?>')" style="background-color: #f44336; color: white; border-radius: 5px; padding: 5px;">DELETE</button>
    <button onclick="update()" style="background-color: #0162EC; color: white; border-radius: 5px; padding: 5px;">UPDATE</button>
    
    <?php
}else echo '<script>window.location="index.php"</script>';
?>
    </div>
    </div>

<script>
    function update(){
        window.location="update.php?id=<?php echo $data[0] ?>";
    }
    function confirmHapus(url) {
        Swal.fire({
                icon: 'warning',
                title: 'Hapus Data Ini?',
                text: 'Data yang dipilih akan dihapus',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {   
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }
    </script>
</body>
</html>