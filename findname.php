<?php
/**
 * Created by PhpStorm.
 * User: samer
 * Date: 8/17/2018
 * Time: 5:21 PM
 */


$servername = "localhost";
$username = "root";
$password = "";
$db="turkish";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset('utf8mb4');       // object oriented style


$phone = $_POST['data'];

$sql = "select * from orders where phone like '".$phone."' LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {


        echo " ".$row["Name"]." ";


    }

}


?>

