<?php
require_once('Enhanced_CS.php');
include('navi.php');
?>

<!--jumbotron-->
<div class="jumbotron text-center">
  <h1>Sistem Temu Kembali Informasi</h1>
  <p>Pencarian Kata Dasar</p>
  <form method="post" action="">
    <div class="input-group">
      <input type="text" class="form-control" size="20" placeholder="cari kata" required name="kata" id="kata" value="<?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" name="submit" value="submit">Cari</button>
      </div>
    </div>
  </form>
</div>


<?php
if(isset($_POST['kata'])){
  $teksAsli = $_POST['kata'];
  //echo "Teks asli : ".$teksAsli.'<br/>';
  $stemming = Enhanced_CS($teksAsli);
  //echo "Kata dasar : ".$stemming.'<br/>';
  ?>

  <!-- Container (Services Section) -->
  <div class="container-fluid text-center">
    <h2>Hasil Pencarian</h2>
    <br>
    <div class="row slideanim">
      <div class="col-sm-3 col-sm-offset-3">
        <h4>Teks Asli</h4>
        <p><?php echo $teksAsli ?></p>
      </div>
      <div class="col-sm-3">
        <h4>Kata Dasar</h4>
        <p><?php echo $stemming ?></p>
      </div>
    </div>
  </div>



  <?php
}
?>



<?php
/*if(isset($_POST['kata'])){
	$teksAsli = $_POST['kata'];
	echo "Teks asli : ".$teksAsli.'<br/>';
	$stemming = Enhanced_CS($teksAsli);
	echo "Kata dasar : ".$stemming.'<br/>';
}*/
include('foot.php');
?>
