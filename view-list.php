<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
    <?php include ('includes/header.php') ?>

    <div class="content">
        <?php
        require_once("includes/db-connection.php");
        function limitWords($text, $wordLimit)
        {
            $words = explode(' ', $text);
            if (count($words) > $wordLimit) {
                return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
            }
            return $text;
        }

        $query = $conn->prepare("SELECT * FROM todo_list");
        $query->execute();
        $result = $query->get_result();
        $items_count = $result->num_rows;

        if ($items_count > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="card">
                    <h1><?php echo htmlspecialchars($row['item_title']); ?></h1>
                    <h3><?php
                        echo date('F j, Y, g:i A', strtotime($row['date_inserted'])); // Example: November 18, 2024, 2:45 PM
                        ?>
                    </h3>
                    <p><?php echo htmlspecialchars(limitWords($row['item_body'], 20)); ?>....</p> <!-- Limit to 20 words -->
                    <div class="button-group">
                        <a class="btn-primary" href="delete-item.php?deleteid=<?php echo $row['item_id']; ?>">View More</a>
                        <a class="btn-primary" href="update-item.php?updateid=<?php echo $row['item_id']; ?>">Update</a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="empty-list">
                <h3 style="color:red; font-weight:bold">No items found.</h3>
                <a class="btn-primary" href="add-item.php">Add Item</a>
            </div>
        <?php
        }
        ?>
    </div>
</body>
<script src="includes/navbar.js" defer></script>

</html>