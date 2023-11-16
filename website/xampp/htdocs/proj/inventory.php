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
    // Your PHP logic to display items goes here
    ?>
</div>

</body>
</html>
