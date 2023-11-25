<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$item_name = 'bottle'; 
$sql = "SELECT price FROM items WHERE name = '$item_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
   
    $price = $row['price'];
    
    echo "The price of $item_name is: $" . $price;
} else {
    echo "Item not found!";
}

mysqli_close($conn);
?>
