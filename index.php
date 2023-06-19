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
<script>
let childrenAndIds;
let i = 0;
$.get("../DBcleanUpInteract/getUsers.php", function(data1){
let tempVar = data1.split("&");
tempVar[0] = tempVar[0].split(',');
tempVar[1] = tempVar[1].split(',');
childrenAndIds = tempVar;
console.log(tempVar);
});

function addTask(){
  console.log('US BORDER PATROL');
  document.getElementById("new_task_div").innerHTML = "<input id='name' placeholder='insert name here'><input type='range' min='0' max='10' id='difficulty' placeholder='insert difficulty here'><input type='time' id='deadlineInput' placeholder='Enter the deadline here'><button onclick='uploadTask()'>Add task</button>";
}
function uploadTask(){
	let name = document.getElementById('name').value;
	let difficulty = document.getElementById('difficulty').value;
	let taskDeadline = document.getElementById('deadlineInput').value;
	<?php echo "let username = '"  . $receivedUsername . "';"; ?>
	alert(username);
 $.ajax({
                    type: "POST",
                    url: "TaskCreator.php",
                    data: {taskName: name, taskDifficulty: difficulty, taskCreator: username, deadline: taskDeadline},
                    success: function(){
                     console.log("COMING TO EVICT YOU!");
                    }
                    });
}
</script>

</body>
</html>
