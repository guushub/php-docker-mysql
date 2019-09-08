<?php
$conn = new mysqli("mysql-db", "root", ".sweetpwd.", "my_db");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT User FROM mysql.user";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo $row['User']."<br/>";
	}
} else {
	echo "0 results";
}
$conn->close();