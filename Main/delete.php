<?php
// Establish database connection
require 'connection.php';

// Check if the ID parameter is set
if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // Perform the delete operation
    $sql = "DELETE FROM user_data WHERE id = $userId";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // Delete operation successful
        echo "User deleted successfully.";
    } else {
        // Delete operation failed
        echo "Error deleting user.";
    }
} else {
    // No ID parameter provided
    echo "Invalid request.";
}
?>
