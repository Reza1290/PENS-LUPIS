

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
        display: none;
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
      select {
        border-radius: 10px;
        width: 90%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus,
      select {
        
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
          <h2>Mengambil Mata Kuliah</h2>
          <select name="matkuls" id="">
              <option value="">Pilih Matkul</option>
              <?php while($r = mysqli_fetch_object($m)){?>
            <option value="<?=$r->matkul_id?>"><?=$r->matkul_name?></option>
            <?php }?>
          </select>
          <select name="kelas" id="">
              <option value="">Pilih Kelas</option>
              <?php while($s = mysqli_fetch_object($k)){?>
                <option value="<?= $s->class_id ?>"><?= $s->class_name ?></option>
              <?php }?>
            <option value=""></option>
          </select>
          <input class="btn"type="submit" value="Add" name="claimMat">
          
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>

<?php 
    if(isset($_POST['claimMat'])){
        include 'db.php';
        $matkul = $_POST['matkuls'];
        $kls = $_POST['kelas'];
        $id_p = $_SESSION['a_global']->user_id;
        $insert = mysqli_query($conn,"INSERT INTO `tb_enroll_class`(`enroll_class_id`, `matkul_id`, `class_id`, `mahasiswa_id`) VALUES ('','$matkul','$kls','$id_p')");

        if($insert){
            echo "<script>alert('Berhasil');</script>";
            echo '<script>window.location="tugas.php"</script>';
    
        }else{

        }
    }
    
?>