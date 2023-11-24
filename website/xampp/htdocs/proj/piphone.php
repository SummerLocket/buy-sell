<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$item_name = 'iphone'; 
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
