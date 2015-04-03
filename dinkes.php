<?php require_once('Connections/db.php'); ?>
<?php
$maxRows_penyakit_dinkes = 10;
$pageNum_penyakit_dinkes = 0;
if (isset($_GET['pageNum_penyakit_dinkes'])) {
  $pageNum_penyakit_dinkes = $_GET['pageNum_penyakit_dinkes'];
}
$startRow_penyakit_dinkes = $pageNum_penyakit_dinkes * $maxRows_penyakit_dinkes;

mysql_select_db($database_db, $db);
$query_penyakit_dinkes = "SELECT * FROM penyakit ORDER BY nama_penyakit ASC";
$query_limit_penyakit_dinkes = sprintf("%s LIMIT %d, %d", $query_penyakit_dinkes, $startRow_penyakit_dinkes, $maxRows_penyakit_dinkes);
$penyakit_dinkes = mysql_query($query_limit_penyakit_dinkes, $db) or die(mysql_error());
$row_penyakit_dinkes = mysql_fetch_assoc($penyakit_dinkes);

if (isset($_GET['totalRows_penyakit_dinkes'])) {
  $totalRows_penyakit_dinkes = $_GET['totalRows_penyakit_dinkes'];
} else {
  $all_penyakit_dinkes = mysql_query($query_penyakit_dinkes);
  $totalRows_penyakit_dinkes = mysql_num_rows($all_penyakit_dinkes);
}
$totalPages_penyakit_dinkes = ceil($totalRows_penyakit_dinkes/$maxRows_penyakit_dinkes)-1;
?><style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
<div align="center">
  <p><img src="images/Dokter.jpg" width="909" height="79"></p>
  <table width="910" cellpadding="6" cellspacing="6">
    <tr>
      <td width="25%"><h3>View Data Penyakit </h3></td>
      <td width="25%"><h3>Add Data Penyakit </h3></td>
      <td width="25%"><h3>Edit Data Penyakit </h3></td>
      <td width="25%"><h3>Delete Data Penyakit </h3></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>

<div align="center">
  <table width="910" border="1">
    <tr bgcolor="#FF9999">
      <td width="15%"><div align="center"><span class="style1">Nama Penyakit </span></div></td>
      <td width="15%"><div align="center"><span class="style1">Kategori Penyakit </span></div></td>
      <td width="20%"><div align="center"><span class="style1">Presentase Penderita </span></div></td>
      <td width="30%"><div align="center"><span class="style1">Kota Persebaran</span></div></td>
      <td width="20%"><div align="center"><span class="style1">Wilayah Penyakit </span></div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_penyakit_dinkes['nama_penyakit']; ?></td>
        <td><?php echo $row_penyakit_dinkes['kategori']; ?></td>
        <td><?php echo $row_penyakit_dinkes['presentase_penderita']; ?></td>
        <td><?php echo $row_penyakit_dinkes['persebaran_penyakit']; ?></td>
        <td><?php echo $row_penyakit_dinkes['wilayah_penyakit']; ?></td>
      </tr>
      <?php } while ($row_penyakit_dinkes = mysql_fetch_assoc($penyakit_dinkes)); ?>
  </table>
  <?php
mysql_free_result($penyakit_dinkes);
?>
</div>
