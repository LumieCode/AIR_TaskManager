<?php
// Do something with the username and password, e.g., store them in a database
$sql = "SELECT * from Tasks";
$result = $conn->query($sql);
echo "<table border='1'><tr><th>Task name</th><th>Task difficulty</th><th>Deadline</th><th>Completion status</th><th>Task executor</th><th>Task creator</th><th>Time created</th><th>Time started</th><th>Time ended</th></tr>";
foreach ($result as $row) { 
echo "<tr>";
echo "<th>"  .  $row['Task name'] . "</th>";
echo "<th>"  .  $row['Difficulty'] . "</th>";
echo "<th>"  .  $row['Deadline'] . "</th>";
echo "<th>"  .  $row['CompletionStatus'] . "</th>";
echo "<th>"  .  $row['TaskExecutor'] . "</th>";
echo "<th>"  .  $row['TaskCreator'] . "</th>";
echo "<th>"  .  $row['TimeCreated'] . "</th>";
echo "<th>"  .  $row['TimeStarted'] . "</th>";
echo "<th>"  .  $row['TimeEnded'] . "</th>";
echo "</tr>";
echo "<br>";
}
// Return a response if needed
echo "</table>";
if('duh' == $receivedUsername){
echo "<div id='new_task_div'>";
echo "<button id='addTaskButton' onclick='addTask()'>+</button>";
echo "</div>";
}
?>