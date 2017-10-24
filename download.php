
<?php
  include('navi.php');
  $konek = mysqli_connect("localhost","root","","dbstbi");

  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($konek, $query);
  ?>

  <!-- Container (Services Section) -->
  <div id="services" class="container-fluid text-center">
    <h2>Download</h2>
    <h4>File pdf</h4>
    <br>
    <div class="row slideanim">
      <?php
        while ($r = mysqli_fetch_array($hasil))
        {?>

          <div class="col-sm-4">
            <h4>Deskripsi : <?php echo "$r[deskripsi] <br>"; ?></h4>
            <p>Nama File : <?php echo "<b>$r[nama_file]</b> <br>"; ?></p>
            <?php echo "<a href=\"simpan.php?file=$r[nama_file]\">Download File</a><hr><br>"; ?>
            

          </div>
    <?php
        }
       ?>
    </div>
    <br><br>
  </div>
<?php
  include('foot.php');
?>
