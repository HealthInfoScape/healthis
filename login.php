<?php require_once('Connections/db.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "priv";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db, $db);
  	
  $LoginRS__query=sprintf("SELECT username, password, priv FROM user WHERE username='%s' AND password='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $db) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'priv');
	
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

	if ($loginStrGroup == 1){
    	$MM_redirectLoginSuccess = "admin.php";
		header("Location: " . $MM_redirectLoginSuccess );
	}
	else if ($loginStrGroup == 2){
    	$MM_redirectLoginSuccess = "dinkes.php";
		header("Location: " . $MM_redirectLoginSuccess );
	}
	else if ($loginStrGroup == 3){
    	$MM_redirectLoginSuccess = "dokter.php";
		header("Location: " . $MM_redirectLoginSuccess );
	}
    
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<html>
<head>
<title>index</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="submit.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #20CAEE;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (index.psd) -->
<table id="Table_01" width="1340" height="700" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="20">
			<img src="images/login_01.jpg" width="134" height="699" alt=""></td>
		<td colspan="7" rowspan="4">
			<a href="index.php"><img src="images/login_02.jpg" alt="" width="277" height="116" border="0"></a></td>
		<td colspan="4">
			<img src="images/login_03.jpg" width="798" height="19" alt=""></td>
		<td rowspan="20">
			<img src="images/login_04.jpg" width="131" height="699" alt=""></td>
	</tr>
	<tr>
		<td colspan="2"><img src="images/login_05.jpg" width="705" height="31" alt=""></td>
		<td>
			<img src="images/login_06.jpg" width="64" height="31" alt=""></td>
		<td rowspan="3">
			<img src="images/login_07.jpg" width="29" height="97" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2"><img src="images/login_08.jpg" width="519" height="66" alt=""></td>
		<td colspan="2">
			<img src="images/login_09.jpg" width="250" height="31" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="images/login_10.jpg" width="250" height="35" alt=""></td>
	</tr>
	<tr>
		<td colspan="7"><img src="images/index_11.jpg" width="277" height="74"></td>
		<td colspan="4" rowspan="16"><table width="800" cellpadding="6" cellspacing="6">
          <tr>
            <td width="140">&nbsp;</td>
            <td colspan="3"><h1> Login Page </h1></td>
            <td width="141">&nbsp;</td>
          </tr>
          <tr>
            <td height="39">&nbsp;</td>
            <td width="140" rowspan="2"><p>Username</p>
            <p>Password</p></td>
            <td width="12">:</td>
            <td width="268" rowspan="3"><form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                <p>
                  <input type="text" name="username">
                </p>
                <p>
                  <input type="password" name="password">
                </p>
                <p>
                  <input type="submit" name="loginok" value="Log In">
                </p>
            </form>              <a href="admin.php"></a> </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="32">&nbsp;</td>
            <td>:</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="31">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
	</tr>
	<tr>
		<td>
			<img src="images/login_13.jpg" width="19" height="52" alt=""></td>
		<td colspan="2"><img src="images/index_14.jpg" width="131" height="52"></td>
		<td colspan="2"><img src="images/index_15.jpg" width="55" height="52"></td>
		<td><img src="images/index_16.jpg" width="53" height="52"></td>
		<td>
			<img src="images/login_17.jpg" width="19" height="52" alt=""></td>
	</tr>
	<tr>
		<td height="127" colspan="7"><table height="86" cellpadding="6" cellspacing="6">
          <tr>
            <td width="8" height="35">&nbsp;</td>
            <td width="211"><h2 class="style1 style1">Cari</h2></td>
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
			<img src="images/login_19.jpg" width="277" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_20.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_21.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_22.jpg" width="277" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_23.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_24.jpg" width="277" height="22" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_25.jpg" width="277" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_26.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_27.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_28.jpg" width="277" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_29.jpg" width="277" height="24" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="images/login_30.jpg" width="277" height="25" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/login_31.jpg" width="19" height="67" alt=""></td>
		<td>
			<img src="images/login_32.jpg" width="90" height="67" alt=""></td>
		<td colspan="2">
			<img src="images/login_33.jpg" width="83" height="67" alt=""></td>
		<td colspan="3">
			<img src="images/login_34.jpg" width="85" height="67" alt=""></td>
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