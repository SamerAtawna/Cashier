<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db="turkish";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset('utf8mb4');       // object oriented style
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik');
        body{
              box-sizing: border-box;
        overflow: hidden;
        font-family: "Rubik";
            background-image: url(img/back.jpg);
          
            margin:0px;
            border:0px;
        }
        .container{
        padding:20px;
            width:100%;
            height:100%;
        }
        .title{
            text-align: center;
            font-size: 48px;
           background-color:rgba(148,150,255, 0.1);
            
        }
        .container ul {
            position: absolute;
            list-style: none;
            display: inline-block;
            width:100%;
            left:10%;
            height:100%;     padding-top:0px;
          
            
            
        }
           .container ul li {
            position: relative;
            border:1px solid black;
            display: inline-block;
               width:20%;
               text-align: center;
               margin-bottom: 20px;
               margin-right:20px;
               height:20%;
              padding-top:0px;
               background-color:white;
               
              

        }
        .subbtn{position: relative;
            background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
            margin:0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin:0px;
    cursor: pointer;
            width:100%;
            height:50%;
          
        }
        form{
            margin:0px;
            padding:0px;
        }
        .ab{
            position: absolute;
            text-decoration: none;
          font-size: 72px;
            background-color:404b69;
            color:white;
      
        
            top:0px;
            display: block;
            width: 100%;
            bottom:0px;
        }
        .newtbl{
            position: absolute;

            width: 50%;

            height:50%;
            background-color:red;
            bottom:0px;
            float:left;
            background-color:7b3c3c;
            color:white;
            font-size: 200%;
            line-height: 90px;

        }
        .sametbl{
            position: absolute;
            width: 50%;
            height:50%;
            background-color:red;
            bottom:0px;
            float:right;top:inherit;
            right:0px;
            background-color:db5f29;
            color:white;
            font-size: 200%;
            line-height: 90px;



        }
        .newtbl a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="title">שולחנות</div>
  
    <div class="container">
        <ul>
            
        <?php

           $sql = "SELECT * from tables";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
             /*   <a href='index1.php?tbl=".$row["TableID"]."'>".$row["TableID"].*/
                  echo "<li><div class='ab'>".$row["TableID"]."
                    <a href='index1.php?tbl=".$row["TableID"]."&status=new'></div><div class='newtbl'>הזמנה חדשה</div></a>
                    
                   <a href='index1.php?tbl=".$row["TableID"]."&status=same'><div class='sametbl'>הזמנה קיימת</div></a> 
                    </li>";
              
            }
        } else {
            echo "0 results";
        }?>
            
        </ul>
    </div>
  
    
</body>
</html>

<img src="img/logo1.jpeg" class="logo">
<div class="tblid">שולחן


















</div>