<?php 
if(!defined('LANG'))
	exit;
global $lang;
$uID = (isset($_POST['uID'])) ? (int) $_POST['uID'] : 0;

$fname = (isset($_POST['fname']) ? $_POST['fname'] : '');
$fname = mysql_real_escape_string(ucfirst($fname));


$lname = (isset($_POST['lname'])? $_POST['lname'] : '');
$lname= mysql_real_escape_string(ucfirst($lname));

$street = (isset($_POST['street'])? $_POST['street'] : '');
$street = mysql_real_escape_string($street);

$zip = (isset($_POST['zip'])) ? (int) $_POST['zip'] : '';

$city = (isset($_POST['city'])? $_POST['city'] : '');
$city = mysql_real_escape_string(ucfirst($city));

$phone = (isset($_POST['phone'])? $_POST['phone'] : '');
$phone = mysql_real_escape_string($phone);

$email = (isset($_POST['email'])? $_POST['email'] : '');
$email = mysql_real_escape_string($email);

$password = (isset($_POST['password'])? $_POST['password'] : '');
$password = mysql_real_escape_string($password);

?>
<h3><?=$lang['REGISTER'];?></h3>
	<?$zip_lenght = strlen($zip);
	if ($zip_lenght != 5 && (isset($_POST['zip'])))
		echo '<span style="color:red">' . $lang['ZIP_ERROR'] . '</span>';?>
<form method="post" action="">
  <table>
    <tr>
	<td><?=$lang['FIRST NAME'];?></td>
	<!-- The statement "required" isn't supported properly in IE9, do not rely on in just yet. -->
	<td><input type="text" name="fname" required value="<?=stripslashes($fname);?>"></td>
    <tr>
	<td><?=$lang['LAST NAME'];?></td>
	<td><input type="text" name="lname" required value="<?=stripslashes($lname);?>"></td>
	<tr>
		<td><?=$lang['STREET ADDRESS'];?></td>
	<td><input type="text" name="street" required value="<?=stripslashes($street);?>"></td>
	<tr>
	<td><?=$lang['ZIP'];?></td>
	<td><input type="text" name="zip" required value="<?php echo $zip?>"></td>
		<tr>
		<td><?=$lang['CITY'];?></td>
	<td><input type="text" name="city" required value="<?=stripslashes($city);?>"></td>
		<tr>
		<td><?=$lang['PHONE'];?></td>
	<td><input type="text" name="phone" value="<?=stripslashes($phone);?>"></td>
		<tr>
		<td><?=$lang['EMAIL'];?></td>
	<td><input type="text" name="email" value="<?=stripslashes($email);?>"></td>
		<tr>
		<td><?=$lang['PASSWORD'];?></td>
	<td><input type="password" name="password" value="<?=stripslashes($password);?>"></td>

	<tr>
	<td></td><td><input type="submit" name="send" value="<?=$lang['SEND']?>"><input type="reset" value="<?=$lang['RESET']?>"></td>
  </table>
</form>
<?php
if ($fname != '' && $zip_lenght == 5)
{
	$sql = "INSERT INTO {$prefix}customers (uID, fname, lname, street, zip, city, phone, email, password)
                        VALUES ('', '$fname', '$lname', '$street', '$zip', '$city', '$phone', '$email', '$password')";
                        mysql_query($sql);
}
