<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

        .btn-primary {
            background-color: yellow;
            color: black;
        }

        .form-group label {
            color: yellow;
        }

        .form-control {
            background-color: white;
            color: black;
        }
    </style>
    <title>View User</title>
</head>
<body>
    <div class="container">
        <h3>User Details</h3>
        <?php
        // Establish database connection
        require 'connection.php';

        // Check if the ID parameter is set
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch user details from user_data table based on ID
            $sql = "SELECT * FROM user_data WHERE id = $id";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<p><strong>Name:</strong> " . $row['full_name'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row['email_id'] . "</p>";
                echo "<p><strong>Password:</strong> " . $row['password'] . "</p>";
            } else {
                echo "<p>No user found with the provided ID.</p>";
            }
        } else {
            echo "<p>No user ID provided.</p>";
        }
        ?>
    </div>
</body>
</html>
