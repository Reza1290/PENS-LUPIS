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
      .formContainer input[type=number],
      .formContainer input[type=password] {
        border-radius: 10px;
        width: 90%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=number]:focus,
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
          <h2>Merubah Nilai</h2>
          <label for="email">
            <p></p>
          </label>
          <input type="number" id="email" placeholder="1-100" name="nilai" required>
          <input class="btn"type="submit" value="Update" name="addNilai">
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>
    <!-- <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script> -->

<?php 
    if(isset($_POST['addNilai'])){
        include 'db.php';
        $nilai = $_POST['nilai'];
        $idsub = $_GET['submit_id'];
        if($nilai >= 100) $nilai = 100;
        else if($nilai <= 0) $nilai = 0;
        $insert = mysqli_query($conn,"UPDATE `tb_submit` SET `submit_grade`='$nilai' WHERE submit_id='$idsub'");

        if($insert){
            echo "<script>alert('Berhasil');</script>";
           echo '<script>window.location="tugas.php"</script>';
    
        }else{

        }
    }
    
?>