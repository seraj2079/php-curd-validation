<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit User</title>
    <style>
        body {
            background: linear-gradient(to bottom, #007BFF, #00BFFF);
            background-color: rgba(0, 0, 255, 0.2);
            height: 100vh;
        }
        .container {
            background: linear-gradient(navy, black);
            color: white;
            border: 2px solid black;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px; /* Adjust the width as needed */
            margin: auto;
            margin-top: 50px;
        }
        h3 {
            color: yellow;
        }
        .form-group label {
            color: yellow;
        }
        .form-control {
            background-color: white;
            color: black;
        }
        .btn-primary {
            background-color: yellow;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Edit User</h3>
        <?php
        // Establish database connection
        require 'connection.php';
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Fetch user data based on the provided ID
            $sql = "SELECT * FROM user_data WHERE id = $id";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
            
            if ($row) {
                $name = $row['full_name'];
                $email = $row['email_id'];
                $password = $row['password'];
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
        <?php
            } else {
                echo "User not found.";
            }
        } else {
            echo "Invalid request.";
        }
        
        if (isset($_POST['update'])) {
            // Get the updated data
            $updatedName = $_POST['name'];
            $updatedEmail = $_POST['email'];
            $updatedPassword = $_POST['password'];
            
            // Update the user data in the database
            $updateSql = "UPDATE user_data SET full_name = '$updatedName', email_id = '$updatedEmail', password = '$updatedPassword' WHERE id = $id";
            $updateResult = mysqli_query($connect, $updateSql);
            
            if ($updateResult) {
                echo "<p class='text-success'>User updated successfully.</p>";
            } else {
                echo "<p class='text-danger'>Failed to update user. Please try again.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
