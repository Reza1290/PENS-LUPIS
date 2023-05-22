<?php 
 session_start();
 if($_SESSION['status_login'] != true){
     echo '<script>window.location="login.php"</script>';
 }

include 'db.php';


if(isset($_GET['id'])){      
    $del = mysqli_query($conn,"DELETE FROM tb_mahasiswa WHERE ID ='".$_GET['id']."' ");
    echo '<script>window.location="index.php"</script>';
}

if(isset($_GET['matkul_id'])){
    $del = mysqli_query($conn,"DELETE FROM tb_matkul WHERE matkul_id ='".$_GET['matkul_id']."' ");
    echo '<script>window.location="tugas.php"</script>';
}

if(isset($_GET['submit_id'])){
    $del = mysqli_query($conn,"DELETE FROM tb_submit WHERE submit_id ='".$_GET['submit_id']."' ");
    echo '<script>history.back()</script>';
}

?>