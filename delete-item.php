<?php
require_once('includes/db-connection.php');
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_item = mysqli_query($conn, "DELETE FROM todo_list WHERE item_id = '$delete_id'");
    if ($delete_item) {
        echo '<script>alert("Item deleted from the database successfully");</script>';
        echo "<script>window.location='view-list.php'</script>";
        exit();
    } else {
        echo '<script>alert("Failed to delete the data item");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Item</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
<?php include ('includes/header.php') ?>
    <div class="content">
        <div class="card">
            <?php require_once("includes/db-connection.php");
            if (isset($_GET['deleteid'])) {
                $item_id = $_GET['deleteid'];
                $query = mysqli_query($conn,  "SELECT * FROM todo_list WHERE item_id='$item_id'");
                while ($row = mysqli_fetch_array($query)) {
            ?>
                    <div class=" card-h1">
                        <h1><?php echo $row['item_title']; ?></h1>
                    </div>
                    <div class=" card-content">
                        <?php echo $row['item_body']; ?>
                    </div>
                    <button class="btn-danger" onclick="return confirm('Do you want to delete this data item');"><a href="delete-item.php?delete_id=<?php echo $row['item_id']; ?>">Delete</a></button>
            <?php }
            }

            ?>
        </div>
    </div>
</body>
<script src="includes/navbar.js" defer></script>

</html>