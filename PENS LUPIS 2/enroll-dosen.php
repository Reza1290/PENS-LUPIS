<?php include 'db.php';

$i_m = $_GET['id'];

$m = mysqli_query($conn,"SELECT * FROM `tb_matkul` WHERE matkul_id='$i_m'");
$mat = mysqli_fetch_object($m);

$d = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE role_id=2");
$c = mysqli_query($conn,"SELECT * FROM `tb_class` WHERE 1");
?>

<link rel="stylesheet" href="style/global.css?=v<?=time();?>">
<style>
      .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #F0F2F5;
        color: black;
        padding: 14px 20px;
        margin: 5px;
        cursor: pointer;
        
        /* position: fixed; */
      }
      .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      .formPopup {
        display: block;
        position: fixed;
        left: 50%;
        top: 25%;
        background-clip: border-box;
        border: 2px solid rgba(72,94,144,.16);
        border-radius: 10px;
        transform: translate(-50%, 5%);
        z-index: 9;
      }
      .formContainer {
        border-radius: 10px;
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password],
      select{
        border-radius: 10px;
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus,
      select{
        
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        border-radius: 10px;
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
      }
    </style>



    
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="" method="post"class="formContainer">
          <h2>ASSIGN DOSEN KE DALAM MATA KULIAH</h2>
          <p><?= $mat->matkul_name?></p>
          <select name="dosen" id="" required> 
            <option >Pilih Dosen</option>
            <?php while($dos = mysqli_fetch_object($d)){?>
            <option value="<?=$dos->user_id?>"><?=$dos->nama?></option>
            <?php }?>
          </select>
          <select name="kelas" id="" required>
            <option >Pilih Kelas</option>
            <?php while($row = mysqli_fetch_object($c)){?>
            <option value="<?=$row->class_id?>"><?=$row->class_name?></option>
            <?php }?>
          </select>
          <input class="btn"type="submit" value="Tambah" name="addNilai">
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
    <script>
    //   function openForm() {
    //     document.getElementById("popupForm").style.display = "block";
    //   }
      function closeForm() {
        window.location="tugas.php";
      }
    </script>

<?php 
    if(isset($_POST['addNilai'])){
        include 'db.php';
        $nama = $_POST['dosen'];
        $class = $_POST['kelas'];
        $insert = mysqli_query($conn,"INSERT INTO `tb_enroll`(`enroll_id`, `matkul_id`, `dosen_id`, `class_id`) VALUES ('','$i_m','$nama','$class')");

        if($insert){
            echo "<script>alert('Berhasil');</script>";
           echo '<script>window.location="tugas.php"</script>';
    
        }else{

        }
    }
    
?>