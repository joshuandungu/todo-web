<?php 
require_once('includes/db-connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_title = trim($_POST['item_title']);
    $item_body = trim($_POST['item_body']);

    if (empty($item_title) || empty($item_body)) {
        echo '<script>alert("Missing fields. Ensure you fill in all the fields.");</script>';
    } else {
        // Use prepared statements for security
        $stmt = $conn->prepare("INSERT INTO todo_list (item_title, item_body) VALUES (?, ?)");
        $stmt->bind_param("ss", $item_title, $item_body);

        if ($stmt->execute()) {
            echo '<script>alert("Item successfully added to the database.");</script>';
            echo "<Script>window.location='view-list.php'</Script>";
            exit();
        } else {
            echo '<script>alert("Failed to insert the item into the database.");</script>';
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>
<body>
<?php include ('includes/header.php') ?>

    <div class="content">
        <div class="form-container">
            <form action="add-item.php" method="POST" enctype="multipart/form-data">
                <label for="title">TITLE</label>
                <input type="text" id="title" name="item_title" 
                       placeholder="Enter Item Name" 
                       minlength="2" maxlength="100" required>

                <label for="body">ITEM BODY</label>
                <textarea id="body" name="item_body" 
                          placeholder="Enter Content" 
                          minlength="2" maxlength="1000" required></textarea>

                <button class="btn" type="submit" name="submit">Add Item</button>
            </form>
        </div>
    </div>
</body>
<script src="includes/navbar.js" defer></script>
</html>
