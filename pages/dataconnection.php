<?php
if(isset($_POST['save'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "photobook";


$conn = mysql_connect($servername, $username, $password);
if ( ! $conn)
{
	die("Connection Failed: " . mysql_error());
}

$data_username = $_POST['username'];
$data_password = $_POST['password'];
$data_fullname = $_POST['fullname'];

$sql = "INSERT INTO users " ."(username,password,fullname) ". "VALUES('$data_username','$data_password','$data_fullname')";
mysql_select_db($dbname);
$dataentry = mysql_query( $sql,$conn );

if(!$dataentry)
{
	die('Could not enter data: '. mysql_error());
}

echo "Entered data successfully\n";
            
mysql_close($conn);
            
            
}
else {
?>

<form method="post" action = "<?php $_PHP_SELF ?>">
<br>User Name <br><input type="text" name="username" id="username"><br>
Password <br><input type="text" name="password" id="password"><br>
Full Name <br><input type="text" name="fullname" id="fullname"><br><br><br>
<input type="submit" value="Save" name="save" id="save"><br>
</form>

<?php
}
?>
