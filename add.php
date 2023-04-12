<!DOCTYPE html>
<html lang="en">
<head>
  <title>Free Shop Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    // Get the form element
var itemForm = document.getElementById("item-form");

// Add submit event listener to the form
itemForm.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission




  

    // Add new form (clone) after successful data insertion
    var clonedForm = itemForm.cloneNode(true); // Set "true" to clone with event handlers
    var formContainer = document.container; // Use the appropriate container for your form
    formContainer.appendChild(clonedForm); // Append the cloned form to the container

    // Clear input values in the cloned form
    clonedForm.querySelector("input[name='name']").value = "";
    clonedForm.querySelector("input[name='price']").value = "";
    clonedForm.querySelector("input[name='quantity']").value = "";
  
  
});


</script>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique";
$name =  "";
$price = 0;
$quantity =0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$name =  $_POST['name'];
$price = $_POST['price'];
$quantity =$_POST['quantity'];
$sql= "INSERT INTO article (name, price, quantity) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $name, $price, $quantity);
if ($stmt->execute() ) {
    echo "<h3>New record created successfully</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
  }


$conn->close();
}

?>
<div class="container">
  <h2>Add new item</h2>
  <form id ="item-form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Item:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="text" placeholder="Enter Item's name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Price:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="text" placeholder="Enter Item's price" name="price">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Quantity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="text" placeholder="Enter Item's quantity" name="quantity">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add new item</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </div>
    
  </form>
</div>


</body>