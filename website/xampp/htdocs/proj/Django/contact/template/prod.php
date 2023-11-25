<?php
// File upload configuration
$targetDir = "uploads/";
$allowTypes = array('jpg','png','jpeg');

// Check if the target directory is writable
if (!is_writable($targetDir)) {
    echo "The 'uploads/' directory is not writable. Please change its permissions to allow file uploads.";
    exit;
}

// Database connection configuration
$host = 'localhost';
$db = 'users';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Connect to the database
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the file extension
$fileName = $_FILES['image']['name'];
$fileExt = explode('.', $fileName);
$fileExt = strtolower(end($fileExt));

// Check if the file type is allowed
if (in_array($fileExt, $allowTypes)) {
    // Check if the file was uploaded successfully
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir.$fileName)) {
        // Insert the image details into the database
        $stmt = $pdo->prepare('INSERT INTO products (username, name, price, count, image, desc) VALUES (:username, :name, :price, :count, :image, :desc)');
        $stmt->execute([
            'username' => $_POST['username'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'count' => $_POST['count'],
            'desc' => $_POST['desc'],
            'image' => $targetDir.$fileName
        ]);

        echo "The file was uploaded successfully.";
    } else {
        echo "There was a problem uploading the file. Please try again.";
    }
} else {
    echo "File type is not allowed. Only 'jpg', 'png', and 'jpeg' files are allowed.";
}
?>