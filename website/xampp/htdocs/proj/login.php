<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
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
        $stmt = $conn->prepare("SELECT * FROM items WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display items in table format
        echo "<h2>Items for Username: $username</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Price</th><th>Count</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
           // echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["count"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No items found for username: " . $username;
    }

      }

    }

    
?>

    <h2>Login</h2>
    <form action="login.php" method="post"> <!-- Change 'items.php' to your target PHP file -->
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
