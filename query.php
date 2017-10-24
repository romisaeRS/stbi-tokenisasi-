<?php include('navi.php'); ?>



<div class="container-fluid text-center" style="margin-top:100px;">
  <div class="well text-center">
  <form enctype="multipart/form-data" method="post" action="">
    <div class="input-group">
      <input type="text" class="form-control" size="30" placeholder="cari kata" required name="katakunci" id="kata">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" name="submit" value="submit">Cari</button>
      </div>
    </div>
  </form>
  </div>
</div>


<div class="well text-center">
  <?php
    if (isset($_POST['katakunci']))
    {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "dbstbi";
      //$katakunci="";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $hasil=$_POST['katakunci'];
      $sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
      //$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil' IN BOOLEAN MODE)";


      //echo $sql;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "Nama file: " . $row["nama_file"]. " - Token: " . $row["token"]. " " . $row["tokenstem"]. "<br>";
          }
      } else {
          echo "0 results";
      }
      $conn->close();
    }
  include('foot.php');
   ?>
</div>


<!--
<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
Keyword : <br>
<input type="text" name="katakunci"><br>
<input type=submit>
</form> -->
