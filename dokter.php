<?php require_once('Connections/db.php'); ?>
<?php
$maxRows_penyakit_dokter = 10;
$pageNum_penyakit_dokter = 0;
if (isset($_GET['pageNum_penyakit_dokter'])) {
  $pageNum_penyakit_dokter = $_GET['pageNum_penyakit_dokter'];
}
$startRow_penyakit_dokter = $pageNum_penyakit_dokter * $maxRows_penyakit_dokter;

mysql_select_db($database_db, $db);
$query_penyakit_dokter = "SELECT * FROM penyakit ORDER BY nama_penyakit ASC";
$query_limit_penyakit_dokter = sprintf("%s LIMIT %d, %d", $query_penyakit_dokter, $startRow_penyakit_dokter, $maxRows_penyakit_dokter);
$penyakit_dokter = mysql_query($query_limit_penyakit_dokter, $db) or die(mysql_error());
$row_penyakit_dokter = mysql_fetch_assoc($penyakit_dokter);

if (isset($_GET['totalRows_penyakit_dokter'])) {
  $totalRows_penyakit_dokter = $_GET['totalRows_penyakit_dokter'];
} else {
  $all_penyakit_dokter = mysql_query($query_penyakit_dokter);
  $totalRows_penyakit_dokter = mysql_num_rows($all_penyakit_dokter);
}
$totalPages_penyakit_dokter = ceil($totalRows_penyakit_dokter/$maxRows_penyakit_dokter)-1;
?><style type="text/css">
<!--
.style1 {
	color: #000099;
	font-weight: bold;
}
-->
</style>
<div align="center">
  <p><img src="images/Dinkes.jpg" width="909" height="79"></p>
  <table width="910" cellpadding="6" cellspacing="6">
    <tr>
      <td width="25%"><h3>View Data Penyakit </h3></td>
      <td width="25%"><h3>Add Data Penyakit </h3></td>
      <td width="25%"><h3>Edit Data Penyakit </h3></td>
      <td width="25%"><h3>Delete Data Penyakit </h3></td>
    </tr>
  </table>
  <table width="890" cellpadding="6" cellspacing="6">
    <tr>
      <td width="862">&nbsp;
        <div align="center">
          <table border="1">
            <tr bgcolor="#CCFF66">
              <td width="15%"><div align="center"><span class="style1">Nama Penyakit </span></div></td>
              <td width="25%"><div align="center"><span class="style1">Penyebab</span></div></td>
              <td width="30%"><div align="center"><span class="style1">Tindakan Utama </span></div></td>
              <td width="20%"><div align="center"><span class="style1">Korelasi</span></div></td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_penyakit_dokter['nama_penyakit']; ?></td>
                <td><?php echo $row_penyakit_dokter['sebab']; ?></td>
                <td><?php echo $row_penyakit_dokter['tindakan']; ?></td>
                <td><?php echo $row_penyakit_dokter['korelasi']; ?></td>
              </tr>
              <?php } while ($row_penyakit_dokter = mysql_fetch_assoc($penyakit_dokter)); ?>
                  </table>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<?php
mysql_free_result($penyakit_dokter);
?>
