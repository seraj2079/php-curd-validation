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
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
        }

        h3 {
            color: yellow;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        table thead {
            background-color: yellow;
            color: black;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            color: white;
        }

        .btn-primary {
            background-color: "primary";
        }

        .btn-primary:hover {
            background-color: #f0ad4e;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
    <title>Home Page</title>
</head>
<body>
    <div class="container">
        <h3>Users List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish database connection
                require 'connection.php';
                
                // Fetch data from user_data table
                $sql = "SELECT * FROM user_data";
                $result = mysqli_query($connect, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['email_id'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>";
                        echo "<a href='view.php?id=" . $row['id'] . "' class='btn btn-success'>View</a> ";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                        echo "<button class='btn btn-danger' onclick='deleteUser(" . $row['id'] . ")'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Perform an AJAX request to delete.php
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Display the response message
                        alert(this.responseText);
                        // Reload the page to reflect the updated user list
                        location.reload();
                    }
                };
                xhttp.open("POST", "delete.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id=" + userId);
            }
        }
    </script>
</body>
</html>
