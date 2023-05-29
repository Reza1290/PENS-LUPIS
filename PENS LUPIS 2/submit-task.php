<?php 
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
    $id_pengguna = $_SESSION['a_global']->user_id;
    if(!(isset($_GET['id_task']))) echo '<script>window.location="tugas.php"</script>';
    if($_SESSION['a_global']->role_id == 1){
    include 'db.php';
    $id = $_GET['id_task'];
    $t = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE task_id='$id'"); 
    $task = mysqli_fetch_array($t);
    
    $s = mysqli_query($conn,"SELECT * FROM `tb_submit` WHERE user_id='$id_pengguna' AND task_id='$id'");
    $submit = mysqli_fetch_array($s);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Submit</title>
    
    <link rel="stylesheet" href="style/global.css?=v<?=time();?>">
    <script src="global.js"></script>
</head>
<body class="homepage">
	<!-- Sticky bar -->

    <div class="nav">
        <div class="sticky-bar">
            <div class="logo-wrap">

                <img class="logo" src="https://upload.wikimedia.org/wikipedia/id/4/44/Logo_PENS.png" alt="">
                <a href="home.php">Pens Lupis</a>
            </div>
            <div class="menu dropdown">
                
                <button onclick="myFunctionDrop()" class="dropbtn">    
                <svg style="width: 20px; height: 20px; z-index: " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
                </button>
                
                <div id="myDropdown" class="dropdown-content">
                    <a href="profil.php">Profil</a>
                    <a href="logout.php">Logout</a>
                 
                </div>

            </div>
        </div>
         
    </div>
    <div class="main">
        <div class="aside">
                <div>
                <a href="home.php"><div class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>Home</div></a>
                    <a href="profil.php">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        Akun</div></a>
                        <a href="pengumuman.php"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/></svg>Pengumuman</div></a>
                    <a href="settings.php"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>Settings</div></a>
                </div>
        </div>      
        <div class="content">
            <div class="content-child">
                <div class="parent-card">
                    <div class="child-card" style="width: 70%;">
                        <div class="card-content" >
                            <div class="card-header">
                                Mata Kuliah  <strong><?php echo "&nbsp"?></strong>
                            </div>
                            <div class="card-body">
                                
                                <div class="card-menu-content">
                                    <div class="caption">
                                        Judul Tugas : <strong><?php echo $task['task_name'];?></strong>
                                        <p>Deskripsi Tugas : <?= $task['task_desc']?></p>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <br>
                                            <label for="file">
                                                <p>Lampiran</p>
                                            </label>
                                            <textarea  style="resize: none;"id="textarea" placeholder="Deskripsi" name="deskripsi" rows="4" cols="50"required><?php if($submit) echo $submit['submit_desc'];?></textarea> <br>
                                            <input type="file" id="file" placeholder="Lampiran : " name="files" > <br><br>
                                            <input style="border: none; cursor: pointer; border-radius: 10px; padding: 5px;" type="submit" value="Submit" name="submit-task">
                                        </form>
                                        <?php 
                                        if(isset($submit['submit_grade']) && $submit['submit_grade'] > 0){
                                            echo "Niai : ".$submit['submit_grade'];
                                        }else{
                                            echo 'Belum Dinilai';
                                        }
                                        if($submit){ ?>
                                            <div class="alert">
                                                <p style="color: black;">Sudah Mengumpulkan</p>
                                            </div>
                                        <?php }else{?> 
                                            <div class="red-alert">
                                                <p style="color: red;">:( Belum Mengumpulkan</p>
                                            </div>  
                                            <?php }?>
                                    </div>    
                                </div>    
                
                            </div>
                            <div class="card-footer">
                            
                            </div>
                        </div>
                        
                    </div>
                                        
                </div>
                
                <div class="footer"><small>copyright@m reza muktasib </small></div>
            </div>
        </div>
        
    </div>
</body>
</html>

<?php 

if(isset($_POST['submit-task'])){
    $matkul_id = $task['matkul_id'];
    $idtugas = $id;
    $mahasiswaid = $_SESSION['a_global']->user_id;
    $deskripsi = $_POST['deskripsi'];
    $datesubmit = date("Y/m/d");
   

    $allowed_extensions = array('jpg', 'jpeg', 'png','doc','pdf','docx');
    $file_extension = pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
    if ($_FILES['files']['tmp_name']){
        if (!in_array($file_extension, $allowed_extensions)) {
            echo '<script>alert("File yang diunggah harus berupa file !")</script>';
            exit();
        }
        $file_name = uniqid() . '.' . $file_extension;
        move_uploaded_file($_FILES['files']['tmp_name'], 'tugas/' . $file_name);
        
    } else {
        // Jika tidak ada file foto yang diunggah, gunakan file foto lama
        $file_name = $submit['submit_file'];
    }

    if($submit){
        $nilai = $submit['submit_grade'];
        $kirim = mysqli_query($conn,"UPDATE `tb_submit` SET `submit_id`='',`matkul_id`='$matkul_id',`user_id`='$mahasiswaid',`task_id`='$idtugas',`submit_file`='$file_name',`submit_desc`='$deskripsi',`submit_grade`='$nilai',`submit_date`='$datesubmit' WHERE user_id='$id_pengguna' AND task_id='$id' ");
    }else{
        $kirim = mysqli_query($conn,"INSERT INTO `tb_submit`(`submit_id`, `matkul_id`, `user_id`, `task_id`, `submit_file`, `submit_desc`, `submit_grade`, `submit_date`) VALUES ('','$matkul_id','$mahasiswaid','$idtugas','$file_name','$deskripsi',0,'$datesubmit') ");           
    }
    
    if($kirim){
        echo header('location: tugas.php');
    }
}







}else{ header('location: tugas.php');}
?>

