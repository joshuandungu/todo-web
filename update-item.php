<?php
require_once('includes/db-connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_id = $_POST['update_id']; // Use POST to get the update ID
    $item_title = mysqli_real_escape_string($conn, $_POST['item_title']);
    $item_body = mysqli_real_escape_string($conn, $_POST['item_body']);

    // Prepare the SQL query
    $query = "UPDATE todo_list SET item_title = ?, item_body = ? WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $item_title, $item_body, $update_id);

    if ($stmt->execute()) {
        echo '<script>alert("Item updated successfully");</script>';
        echo "<script>window.location='view-list.php'</script>";
        exit();
    } else {
        echo '<script>alert("Failed to update data item. Please try again later.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
    <?php include ('includes/header.php') ?>

    <?php
    if (isset($_GET['updateid'])) {
        $item_id = intval($_GET['updateid']);
        $query = $conn->prepare("SELECT * FROM todo_list WHERE item_id = ?");
        $query->bind_param("i", $item_id);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <div class="content">
                <div class="form-container">
                    <form action="update-item.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?php echo $row['item_id']; ?>">
                        <label for="title">TITLE</label>
                        <input type="text" id="title" name="item_title" value="<?php echo htmlspecialchars($row['item_title']); ?>"
                            placeholder="Enter Item Name" minlength="2" maxlength="100" required>
                        <label for="body">ITEM BODY</label>
                        <textarea id="body" name="item_body" placeholder="Enter Content" minlength="2" maxlength="1000" required>
                            <?php echo htmlspecialchars($row['item_body']); ?>
                        </textarea>
                        <button class="btn" name="submit" value="update"
                            onclick="return confirm('Do you want to update this data item?');">Update</button>
                    </form>
                </div>
            </div>
    <?php
        } else {
            echo '<p>Item not found.</p>';
        }
    }
    ?>

</body>
<script src="includes/navbar.js" defer></script>

</html>