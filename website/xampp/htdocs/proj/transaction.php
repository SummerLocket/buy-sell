<!DOCTYPE html>
<html>
<head>
    <title>Items Page</title>
    <style>
        /* Style for the navigation bar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>

<!-- Navigation bar -->
<ul>
    <li><a href="items.php">Items</a></li>
    <li><a href="inventory.php">Inventory</a></li>
    <li><a href="transaction.php">Transaction</a></li>
</ul>

<!-- Display items related to the username (you can include your PHP logic here) -->
<div>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "users";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $username = $_POST['username'];
        $stmt = $conn->prepare("SELECT * FROM transaction WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display items in table format
        echo "<h2>Items for Username: $username</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>balance</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           // echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["balance"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No items found for username: " . $username;
    }

      }

    }

    
?>
</div>

</body>
</html>
