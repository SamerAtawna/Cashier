<?php



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
echo "<div class='noty'> מחובר לשרת <font color=#00FF23><i class='far fa-dot-circle'></i></font></font></div>";
?>

<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


<script type="text/javascript" src="JS\script.js"></script>


    <script>

        $(document).ajaxStart(function(){
            $("#loading").html("<img src='img/loading.gif' class='loadimg'>");
        });
        $(document).ajaxStop(function(){
            $("#loading").html("");
        });


        function find(){
            $.ajax({
                type: "POST",

                url: "findname.php",
                data: {data : $("#phone").val()},
                cache: false,
                datatype:"html",
                success: function(result){
                    document.getElementById("usrname").innerText = result;
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);

                }
            });



        }


        var total = parseInt(document.getElementById("total1").value);
        var tableid = $("#tableid").val();
        var name =  document.getElementById("name").value;
        var phone =  $("#phone").val();
        var status = $("#status").val();




        function charge() {
            if(document.getElementsByName("ta")[0].checked==true){ista=1}
            else{
                ista=0;
            }
            jsonString=   JSON.stringify(items);
            $.ajax({
                type: "POST",
                url: "charge.php",
                data: {data : jsonString, total1:parseInt(document.getElementById("total1").value), tableid1:$("#tableid").val(), name1:document.getElementById("name").value, phone1:$("#phone").val(), ista1:ista, status:$("#status").val()},
                cache: false,

                success: function(result){

                    console.log(result);
                }
            });

        }




    </script>
      <link rel="stylesheet"  href="Style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<meta charset="utf-8">
</head>
<body>
    <script>
     
    </script>
    <div class="topnav">

          <img src="img/logo1.jpeg" class="logo">
            <div class="tblid">שולחן <?php     echo       $_GET['tbl'];
                                                if($_GET['status']=="new")
                                                {
                                                    echo "<div class='sts'>הזמנה חדשה</div>";
                                                }
                                               if($_GET['status']=="same")
                                                {
                $sql = mysqli_query($conn, "SELECT * from orders where tableid=".$_GET['tbl']." ORDER BY OrderID desc LIMIT 1");
                                                    $row = mysqli_fetch_array($sql);
                                                    if($sql->num_rows>0) {
                                                        echo "<div class='sts'>מספר הזמנה " . $row["OrderID"] . " </div><br>";
                                                    }


            /*    $result = $conn->query($sql);
                if ($result->num_rows > 0)
                    while ($row = $result->fetch_assoc()) {
                    echo $row["OrderID"]."<br>";

}*/
                }
                                                ?>
                                    </div>
       <?php  echo " <input type='hidden' id='tableid' value='".$_GET['tbl']."'>";
       echo " <input type='hidden' id='status' value='".$_GET['status']."'>";


       ?>

    </div>



    <div class="container">

        <div class="items">
           
            <ul><?php
                
   $sql = "SELECT * from items where category=1";
           
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<li id=".$row["ItemID"]."  onclick='addtoarray(this.id, ".$row["Price"].",\"".$row["Name"]."\")'>".$row["Name"]."<div class='price''>".$row["Price"]."</div></li>";


    }
} else {
    echo "0 results";
}

                ?>
            </ul>
        </div>
    
    
            <div class="items1">
            <ul>
          <?php
                
   $sql = "SELECT * from items where category=2";
           
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<li id=".$row["ItemID"]."  onclick='addtoarray(this.id, ".$row["Price"].",\"".$row["Name"]."\")'>".$row["Name"]."<div class='price''>".$row["Price"]."</div></li>";
    }
} else {
    echo "0 results";
}

                ?>
           
            </ul>
        </div>
        
         <div class="items3">
            <ul>
                    <?php
                
   $sql = "SELECT * from items where category=3";
           
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<li id=".$row["ItemID"]."  onclick='addtoarray(this.id, ".$row["Price"].",\"".$row["Name"]."\")'>".$row["Name"]."<div class='price''>".$row["Price"]."</div></li>";
    }
} else {
    echo "0 results";
}
$conn->close();
                ?>
                
           
            </ul>
        </div>

            <div class="clientinfo">מספר טלפון<input class="inputphone" type="text" size=30 id="phone" onkeyup="find()"><br><br>
                שם      <input class="inputname" type="text" size=30 id="name">


        <div class="TA">לקחת <input class="ta" name="ta" type="radio" value="yes"> 
                לשבת <input class="ta" name="ta" type="radio" value="no"> 
                </div>
            <div class="username" id="usrname"></div>
                <div class="load" id="loading"></div>
</div>
   
          <div  class="listitems">
            <ul id="basket">
      
                
           
            </ul>
        </div>
          <input type="text" size=20 class="total" id="total1">
        <input type="button" value="reset" style="position:absolute;bottom:20px;left:13%; height:10%;width:10%;" onclick="clear1()">
        <input type="submit" value="תשלום" onclick="charge()">
    </div>
    <script>
    
        var items=[];
         document.getElementById("total1").value=0;
function addtoarray(x, prc, itm)
{
    items.push(x);
   document.getElementById("total1").value = parseInt(prc)+parseInt(document.getElementById("total1").value);
    $("#basket").append("<li>  "+itm+"<div class=\"price\">"+prc+"</li>");
}
         function clear1(){
            
           $( "#basket" ).children().remove();      
            document.getElementById("total1").value=0;
             items=[];
         }
    
    </script>
<script>



</script>
</body>
</html>