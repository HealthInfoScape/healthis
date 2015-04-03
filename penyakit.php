<?php require_once('Connections/db.php'); ?>
<?php
$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_db, $db);
$query_Recordset2 = "SELECT * FROM penyakit";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $db) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

$server = "localhost";
$username = "root";
$password = "";
$database = "dbhealth";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <p><img src="images/admin.jpg" alt="pageadmin" width="909" height="79" /></p>
</div>
<div align="center"></div>
<div align="center">
  <table width="912" cellpadding="6" cellspacing="6">
    <tr>
      <td width="208"><h2><a href="admin.php">Manage User</a> </h2></td>
      <td width="202">&nbsp;</td>
      <td width="214"><h2><a href="penyakit.php">Manage Penyakit</a> </h2></td>
	  <td width="208">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<div align="center">
  <table width="927" cellpadding="6" cellspacing="6">
    <tr>
      <td width="901">&nbsp;
        <div align="center">
          <table border="1">
            <tr>
              <td width="75"><h3 align="center">Nomor</h3></td>
              <td width="200"><h3 align="center">Nama Penyakit</h3></td>
              <td width="200"><h3 align="center">Kategori</h3></td>
            </tr>
            <?php do { ?>
              <tr>
                <td><div align="center"><?php echo $row_Recordset2['id_penyakit']; ?></div></td>
                <td><?php echo $row_Recordset2['nama_penyakit']; ?></td>
                <td><?php echo $row_Recordset2['kategori']; ?></td>
              </tr>
              <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
                  </table>
      </div></td>
    </tr>
  </table>
</div>
<p>&nbsp;	</p>
</body>
</html>
<?php
mysql_free_result($Recordset2);
?>
