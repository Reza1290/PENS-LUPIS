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
        top: 0;
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
      .formContainer input[type=date],
      .formContainer input[type=password] {
        border-radius: 10px;
        width: 90%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        
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
          <h2>Menambah Tugas</h2>
          <label for="nama">
            <p>Nama Tugas</p>
          </label>
          <input type="text" id="nama" placeholder="Nama Tugas" name="nama" required>
          <input type="text" id="" placeholder="Deskripsi" name="desc" required>
          <label for="deadline">
            <p>Deadline</p>
          </label>
          <input type="date" id="" placeholder="Deadline" name="deadline" required>
          <input class="btn"type="submit" value="Add" name="addMatkul">
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
    if(isset($_POST['addMatkul'])){
        include 'db.php';
        $t_name = $_POST['nama'];
        $desc = $_POST['desc'];
        $date = $_POST['deadline'];
        $dosen = $_SESSION['a_global']->user_id;
        $mk_id = $row->matkul_id;
        $class = $id;
        

        $insert = mysqli_query($conn,"INSERT INTO `tb_task` VALUES(null,'$t_name','$desc','$dosen','$date','$class','$mk_id')");

        if($insert){
            echo "<script>alert('Berhasil Ditambahkan');</script>";
            echo '<script>window.location="tugas.php"</script>';
        }else{

        }
    }
    
?>