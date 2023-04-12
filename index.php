<!DOCTYPE html>
<html lang="en">
<head>
  <title>Free Shop Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div  style = "display: flex; justify-content: center;">
    <a href="add.php" class="btn btn-default">Add new item</a>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
   echo'<div class="container">';
        echo '<h2>Store aticles</h2>';
                       
            echo'<table class="table table-hover">';
                
                echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Item</th>";
                    echo "<th>Price</th>";
                    echo "<th>Quantity</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                
  while($row = $result->fetch_assoc()) {
  
   
            
                echo "<tr>";
                    echo'<td>'.$row["id"].'</td>';
                    echo'<td>'.$row["name"].'</td>';
                    echo'<td>'.$row["price"].'</td>';
                    echo'<td>'.$row["quantity"].'</td>';
                 
                echo "</tr>";
            
  };
            echo "</tbody>";                
            echo "</table>";
    echo "</div>";
} else 
{
  echo "0 results";
};

$conn->close();

?>


</body>
</html>
