<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskManager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<?php
 include "Cipher.php";
$conn = mysqli_connect("localhost", "iva", "12345", "cw");
$receivedUsername = $_POST['username'];
$receivedPassword = $_POST['password'];
$sql = "SELECT tm_Password FROM dle_users WHERE name ='" . $receivedUsername .  "'";
$result = $conn->query($sql);
 $fetched_result = mysqli_fetch_array($result);
 $farfetched_result = $fetched_result['tm_Password']; //idk what to call it
 $password = Encipher($receivedPassword, 3);
if ($farfetched_result == $password) {
  include "backgroundProcess.php";
}else{
	header("Location: Login.php");
}
?>

</body>
</html>
