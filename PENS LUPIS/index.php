<?php 
  session_start();
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style/global.css?=v<?=time();?>">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <style>
        
        .menu li{
            margin: 0px 10px;
        }
        .menu li a{
            text-decoration: none;
            
        }

        main a{
            font-size: 90%;
        }
        :root{
            --bgBlack: #F3F5F7;
            --putih: #ffffff;
            --hitam: #000000;
        }
        .tabel-tombol a{
            text-decoration: none;
            background-color: #0162EC;
            color: white;
            font-weight: 500;
            padding: 5px;
            border-radius: 5px;
            margin: 2px;
        }
        .tabel-tombol a:hover{
            background-color: white;
            color: #0162EC;
            font-weight: 500;
            border: 1px solid #0162EC;
            padding: 4px;    
        }
        
        .tabel-tombol a.del{
            background-color: #f44336;
            color: white;
            font-weight: 500;
            padding: 4px;
        }
        .tabel-tombol a.del:hover{
            background-color: white;
            color: #f44336 ;
            border: 1px solid #f44336;
            font-weight: 500;
            padding: 3px;
        }
        *{
            margin: 0;
        }
        body{
            background-color: var(--bgBlack);
            color: var(--hitam);
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
        }
        .main{
            display: flex;
            justify-content: center;
            align-items:center;
            margin-top: 100px;
            margin-bottom: 20px;
            
        }
        .header{
            display:flex;
            justify-content: end;
            padding: 10px;
        }
        .header a{
            margin: 5px;
            text-decoration: none;
            background-color: #f44336;
            color: white;
            font-weight: 400;
            padding: 5px;
            border-radius: 5px;
        }
        .table-container{
            background-color: var(--putih);
            padding: 20px 0px 0px 0px;
            border-radius: 15px;
            width: 50%;
        }
        table{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        th{
            background-color: #fAfAfA;
            height: 30px;
            text-align: start;
            font-weight: 500;
        }
        tr:last-child{
            border-bottom: 0px;
        }
        tr{border-bottom: 1px solid #E7E7E7;}
        table, th, td {
            padding: 10px 10px;
            border-collapse: collapse;
        }
        
    </style>
    
</head>
<body>
    <script>
        
    </script>
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
    
    
    
        <section class="main">
            <div class="table-container">
                <h1 style="text-align:center;">Data Mahasiswa</h1>
                <div class="header">

                    <a href="insert.php">INSERT</a>
                    <a style="background-color: #f44336;
            color: white;
            font-weight: 500; margin: 5px; border-radius: 5px;" id="btn">FORCE DELETE</a>
                <script> 
                var c = 0;
                
                $('#btn').click(function() {
                    console.log(c);
                    if(c == 0){ $('.del').css('display', ''); c = 1;}
                else if(c==1){ $('.del').css('display', 'none'); c = 0}
                });
            </script>
                </div>
                <table class="tabel">
                   <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NRP</th>
                        <th>Jenis Kelamin</th>
                        <th>OPTION</th>
                    <tr>
                </thead>     
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($conn,"SELECT * FROM `tb_mahasiswa` WHERE 1");
                    
                    while($row = mysqli_fetch_array($data)){

                    ?>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $row['NAMA'] ?></td>
                        <td><?php echo $row['NRP'] ?></td>
                        <td><?php $gen = $row['GENDER']; if($gen){echo "LAKI - LAKI";}else{echo "PEREMPUAN";} ?></td>
                        <td class="tabel-tombol"><a href="tampil.php?id=<?php echo $row['ID']; ?>">SHOW</a>
                        <a class="del" style="display:none;" href="proses-hapus.php?id=<?php echo $row['ID']; ?>">DELETE</a></td>
                        
                        
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </section>

</body>
</html>