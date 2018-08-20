<?php
/**
 * Created by PhpStorm.
 * User: samer
 * Date: 8/16/2018
 * Time: 9:55 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$db="turkish";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset('utf8mb4');       // object oriented style


    $todo = $_POST['data'];








    $sql = "select * from tables"

    $result = $conn->query($sql);
f ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo  $row["tableid"];
    }
} else {
    echo "0 results";
}
$conn->close();


mysqli_close($conn);
?>