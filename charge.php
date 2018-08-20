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


    $tableid = $_POST['tableid1'];
$total= $_POST['total1'];
    $name = $_POST['name1'];


    $phone = $_POST['phone1'];

    $ista = $_POST['ista1'];
    $status= $_POST['status'];



$date = date('Y-m-d H:i:s');


$items = array();


if($status=="new") {
    $sql = "INSERT INTO orders (Date, IsTA,Total, TableID, Name, Phone) VALUES ('" . $date . "' , '" . $ista . "', '" . $total . "', '" . $tableid . "', '" . $name . "','" . $phone . "')";

    $query = mysqli_query($conn, $sql);


    $sql = mysqli_query($conn, "SELECT * from orders where tableid=" . $tableid . " ORDER BY OrderID desc LIMIT 1");
    $row = mysqli_fetch_array($sql);


    $data = json_decode(stripslashes($_POST['data']));
    foreach ($data as $d) {

        $sql = "INSERT INTO orderdetails (OrderID, ItemID , TableID, Date) VALUES('" . $row["OrderID"] . "','" . $d . "','" . $tableid . "','" . $date . "')";
        $query = mysqli_query($conn, $sql);

    }

}
elseif ($status=="same")
{
    $sql = mysqli_query($conn, "SELECT * from orders where tableid=" . $tableid . " ORDER BY OrderID desc LIMIT 1");
    $row = mysqli_fetch_array($sql);

    $data = json_decode(stripslashes($_POST['data']));
    foreach ($data as $d) {

        $sql = "INSERT INTO orderdetails (OrderID, ItemID , TableID, Date) VALUES('" . $row["OrderID"] . "','" . $d . "','" . $tableid . "','" . $date . "')";
        $query = mysqli_query($conn, $sql);

    }
}

mysqli_close($conn);
?>