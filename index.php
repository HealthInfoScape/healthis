<?php require_once('Connections/db.php'); ?>
<?php
$maxRows_kategori = 10;
$pageNum_kategori = 0;
if (isset($_GET['pageNum_kategori'])) {
  $pageNum_kategori = $_GET['pageNum_kategori'];
}
$startRow_kategori = $pageNum_kategori * $maxRows_kategori;

mysql_select_db($database_db, $db);
$query_kategori = "SELECT kategori FROM penyakit ORDER BY kategori ASC";
$query_limit_kategori = sprintf("%s LIMIT %d, %d", $query_kategori, $startRow_kategori, $maxRows_kategori);
$kategori = mysql_query($query_limit_kategori, $db) or die(mysql_error());
$row_kategori = mysql_fetch_assoc($kategori);

if (isset($_GET['totalRows_kategori'])) {
  $totalRows_kategori = $_GET['totalRows_kategori'];
} else {
  $all_kategori = mysql_query($query_kategori);
  $totalRows_kategori = mysql_num_rows($all_kategori);
}
$totalPages_kategori = ceil($totalRows_kategori/$maxRows_kategori)-1;

$server = "localhost";
$username = "root";
$password = "";
$database = "dbhealth";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
<html>
<head>
<title>index</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #2DC1DF;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (index.psd) -->
<table id="Table_01" width="1340" height="770" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="11">
			<img src="images/index_01.jpg" width="134" height="699" alt=""></td>
		<td colspan="7" rowspan="4"><a href="http://visualization.geblogs.com/visualization/network/" target="_blank"><img src="images/index_02.jpg" alt="" width="277" height="116" border="0"></a></td>
		<td colspan="4">
			<img src="images/index_03.jpg" width="798" height="19" alt=""></td>
		<td rowspan="11">
			<img src="images/index_04.jpg" width="131" height="699" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/index_05.jpg" width="705" height="31" alt=""></td>
		<td>
			<a href="login.php"><img src="images/index_06.jpg" alt="" width="64" height="31" border="0"></a></td>
		<td rowspan="3">
			<img src="images/index_07.jpg" width="29" height="97" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="images/index_08.jpg" width="519" height="66" alt=""></td>
		<td colspan="2">
			<a href="healthis.html"><img src="images/index_09.jpg" alt="" width="250" height="31" border="0"></a></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/index_10.jpg" width="250" height="35" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/index_11.jpg" width="277" height="74" alt=""></td>
		<td colspan="4" rowspan="7"><img src="images/index_12.jpg" alt="" width="798" height="583" border="0"></td>
	</tr>
	<tr>
		<td>
			<img src="images/index_13.jpg" width="19" height="52" alt=""></td>
		<td colspan="2">
			<a href="pilihwilayah.html"><img src="images/index_14.jpg" alt="" width="131" height="52" border="0"></a></td>
		<td colspan="2">
			<img src="images/index_15.jpg" width="55" height="52" alt=""></td>
		<td>
			<img src="images/index_16.jpg" width="53" height="52" alt=""></td>
		<td>
			<img src="images/index_17.jpg" width="19" height="52" alt=""></td>
	</tr>
	<tr>
		<td height="127" colspan="7"><table height="86" cellpadding="6" cellspacing="6">
          <tr>
            <td width="8" height="35">&nbsp;</td>
            <td width="211"><h2 class="style1">Cari</h2></td>
          </tr>
          <tr>
            <td height="31">&nbsp;</td>
            <td><form name="form1" method="post" action="">
              <input type="text" name="textfield">
                        <input type="submit" name="go" value="Go">
            </form>            </td>
          </tr>
        </table>	    </td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/index_19.jpg" width="277" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="7"><table cellpadding="6" cellspacing="6">
          <tr>
            <td width="1" height="206">&nbsp;</td>
            <td width="232">&nbsp;
              <table width="212" border="0">
                <?php do { ?>
                  <tr>
                    <td><?php echo $row_kategori['kategori']; ?></td>
                  </tr>
                  <?php } while ($row_kategori = mysql_fetch_assoc($kategori)); ?>
              </table></td>
          </tr>

        </table></td>
	</tr>
	
	
	<tr>
		<td colspan="7" bordercolor="#FFFFFF">
			<img src="images/index_30.jpg" width="277" height="25" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/index_31.jpg" width="19" height="67" alt=""></td>
		<td>
			<a href="http://www.depkes.go.id" target="_blank"><img src="images/index_32.jpg" alt="" width="90" height="67" border="0"></a></td>
		<td colspan="2">
			<a href="http://www.idionline.org/" target="_blank"><img src="images/index_33.jpg" alt="" width="83" height="67" border="0"></a></td>
		<td colspan="3">
			<img src="images/index_34.jpg" width="85" height="67" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="134" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="19" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="90" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="41" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="42" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="13" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="53" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="19" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="519" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="186" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="64" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="29" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="131" height="1" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>
<?php
mysql_free_result($kategori);
?>