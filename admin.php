<?php require_once('Connections/db.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_db, $db);
$query_Recordset1 = "SELECT * FROM `user`";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $db) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

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
        <table border="1">
          <tr>
            <td width="5%%"><div align="center">
              <h3>Nomor</h3>
            </div></td>
            <td width="20%"><div align="center">
              <h3>Username</h3>
            </div></td>
            <td width="20%"><div align="center">
              <h3>Password</h3>
            </div></td>
            <td width="20%"><div align="center">
              <h3>Email</h3>
            </div></td>
            <td width="20%"><div align="center">
              <h3>Special/Lokasi</h3>
            </div></td>
            <td width="10%"><div align="center">
              <h3>Status</h3>
            </div></td>
            <td width="20"><div align="center">
              <h3>Keterangan</h3>
            </div></td>
          </tr>
          <?php do { ?>
            <tr>
              <td><div align="center"><?php echo $row_Recordset1['id_user']; ?></div></td>
              <td><?php echo $row_Recordset1['username']; ?></td>
              <td><?php echo $row_Recordset1['password']; ?></td>
              <td><?php echo $row_Recordset1['email']; ?></td>
              <td><?php echo $row_Recordset1['special']; ?></td>
              <td><?php if ($row_Recordset1['status'] == 1) echo 'Aktif';
			  if ($row_Recordset1['status'] == 2) echo 'Nonaktif'; ?></td>
              <td><?php if ($row_Recordset1['priv'] == 1) echo 'Admin'; 
			  if ($row_Recordset1['priv'] == 2) echo 'DinKes';
			  if ($row_Recordset1['priv'] == 3) echo 'Doker'; ?></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table></td>
    </tr>
  </table>
</div>
<p>&nbsp;	</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
