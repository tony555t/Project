<?php

/*$database = "nganya";
$username = "root";
$password = " ";
$name = $_POST["Name"];
$from = $_POST["From"];
$email = $_POST["Email"];
$to = $_POST["To"];
$time = $_POST["Time"];
$date = $_POST["Date"];
$comfort = $_POST["Comfort"];
$adults = $_POST["Adults"];
$children = $_POST["Children"];
$message = $_POST["Message"];
*/
// Create connection

$conn = mysqli_connect("localhost", "root", "", "tatu");

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
/* 
$sql = "INSERT INTO booking (Name, Fromw, Email, Tow, Timen, Daten, Comfort, Adult, Children, Message) VALUES ('$name','$from', '$email', '$to', '$time', '$date', '$comfort', '$adults', '$children', '$message')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>*/