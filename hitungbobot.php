<?php
include('navi.php');
$host='localhost';
$user='root';
$pass='';
$database='dbstbi';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
//hitung index
mysql_query("TRUNCATE TABLE tbindex");
$resn = mysql_query("INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	$n = ($resn);
	//tokenstem

//berapa jumlah DocId total?, n
	$resn = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	$n = mysql_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysql_query("SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysql_num_rows($resBobot);
	echo"<div class='container pt'>
		<div class='row mt'>
			<div class='col-lg-6 col-lg-offset-3 centered'>
				<h3>HASIL HITUNG BOBOT</h3>
				<hr>";

	print("<p>Terdapat " . $num_rows . " Term yang diberikan bobot. </p>");
			echo "</div>
		</div>
		";

	while($rowbobot = mysql_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysql_query("SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysql_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysql_query("UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot

echo"<div class='row mt'>  
      <div class='col-lg-8 col-lg-offset-2'>
<table class='table table-bordered'>
<tr>
<th>No</th>
<th>Term</th>
<th>Doc ID</th>
<th>Count</th>
<th>Bobot</th>
</tr>";
$no=1;
$data = mysql_query("SELECT * FROM tbindex");
while ($d = mysql_fetch_array($data)) {
	echo "<tr>
         <td>".$no++."</td>
         <td>".$d['Term']."</td>
         <td>".$d['DocId']."</td>
         <td>".$d['Count']."</td>
         <td>".$d['Bobot']."</td>
         </tr>";
}
echo "</table></div></div></div>";
include('foot.php');
?>