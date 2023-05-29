<?php 
 session_start();
 include 'db.php';
 if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
 }

 $query = mysqli_query($conn,"SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
 $fetch = mysqli_fetch_object($query);
 if(mysqli_num_rows($query)){

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL | <?php echo $fetch->admin_name?></title>
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
        input{
            border: none;
            margin: 0;
            padding: 0;
            font-size: 16px;  
            outline: none;
            width: 100%;
            overflow: none; 
        }
        select{
            outline: none;
            border: none;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        textarea {
        border: none;
        resize: none;
        font-size: 16px;
        outline: none;
        }
        .photo{
            border: 1px solid black;
            opacity: 0;
            visibility:hidden;
            z-index: -1;
        }
        label{
            cursor: pointer;
        }
        .btn-photo{
            border: none;
            font-size: 16px;
            color: blue;
            text-decoration: underline;
        }
        </style>
</head>
<body>
    
    <div class="main">
    <div class="" style="width: 30%;">
        <h1 style="text-align:center">Data Admin</h1>
        <a style="color: blue;" href="home.php">< Kembali</a><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <legend>
                <p style=""><b>PHOTO</b><br>
                <img style=""src="download/<?php echo $fetch->admin_photo?>" width="100px"><br>
                <button class="btn-photo"><a style=""href="download-file.php?file=<?=$fetch->admin_photo; ?>">Download</a></button>
                <label  class="btn-photo" for="photo">Upload</label>
                <input  class="photo" type="file" name="photo" placeholder="" id="photo"value="<?= $fetch->admin_photo?>" >
                </p>
                <p><b>NAMA LENGKAP</b><br>
                <input type="text" name="nama" placeholder="" value="<?= $fetch->admin_name?>" required>
                </p>
                <p><b>USERNAME </b><br><input type="text" name="username" placeholder="" value="<?= $fetch->username?>" required></p>
                <!-- <p><b>JENIS KELAMIN</b><br>
                <select name="gen" id="gender">
                        <option value=""PEREMPUAN"; ?></option>
                        <option value="1">LAKI-LAKI</option>
                        <option value="0">PEREMPUAN</option>
                    </select>
                </p> -->
                <p><b>NO TELP</b><br>
                <input type="text" name="hp" placeholder="" value="<?= $fetch->admin_telp?>" required>
                </p>
                <p><b>EMAIL</b><br>
                <input type="text" name="email" placeholder="" value="<?= $fetch->admin_email?>" required>
                </p>
                <p><b>ALAMAT</b><br>
                <textarea type="textarea" rows="4" cols="50" name="alamat" placeholder="<?= $fetch->admin_address?>" value="<?=  $fetch->admin_address ?>" required><?=  $fetch->admin_address?></textarea>
                </p>
                
            </legend>
            <input type="submit" name="kirim" style="background-color: #0162EC; color: white; border-radius: 5px; padding: 5px;" value="UPDATE">
        </form>
            
    </div>
</div>

    <?php
        if(isset($_POST['kirim'])){
                            $nama   = ucwords($_POST['nama']);
                            $user   = $_POST['username'];
                            // $gen    = $_POST['gen'];
                            $hp     = $_POST['hp'];
                            $email  = $_POST['email'];
                            $alamat = ucwords($_POST['alamat']);
                            
                            
                            $allowed_extensions = array('jpg', 'jpeg', 'png');
                            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                            
                            
                            
                            if ($_FILES['photo']['tmp_name']){
                                if (!in_array($file_extension, $allowed_extensions)) {
                                    echo '<script>alert("File yang diunggah harus berupa file gambar (jpg, jpeg, png)")</script>';
                                    exit();
                                }
                                $foto_name = uniqid() . '.' . $file_extension;
                                move_uploaded_file($_FILES['photo']['tmp_name'], 'download/' . $foto_name);
                                
                            } else {
                                // Jika tidak ada file foto yang diunggah, gunakan file foto lama
                                $foto_name = $fetch->admin_photo;
                            }
                            $update = mysqli_query($conn, "UPDATE `tb_admin` SET 
                                        `admin_name` = '".$nama."',
                                        `username` = '".$user."',
                                        `admin_telp` = '".$hp."',
                                        `admin_email` = '".$email."',
                                        `admin_address` = '".$alamat."',
                                        `admin_photo` = '".$foto_name."' 
                                        WHERE admin_id = '".$fetch->admin_id."'");

                            if($update){
                                echo '<script>alert("berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo '<script>alert("Error")</script>'.mysqli_error($conn);
                            }
                            
        }
}else echo '<script>window.location="home.php"</script>';
                                
                            
?>
    
    
</body>
</html>