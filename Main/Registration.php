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
        display: flex;
        align-items: center;
        justify-content: center;
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
        text-align: center;
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

    .text-danger {
        color: red;
        margin-top: 10px;
    }

    .signup-link {
        text-align: center;
        margin-top: 10px;
    }

    .signup-link a {
        display: inline-block;
        padding: 10px 20px;
        background-color: yellow;
        color: black;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

    <title>Signup Page</title>
</head>
<body>
<div class="container">
    <h3>Signup Page</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="getname">Name:</label>
            <input type="text" class="form-control" name="getname" required>
        </div>
        <div class="form-group">
            <label for="getemail">Email:</label>
            <input type="email" class="form-control" name="getemail" required>
        </div>
        <div class="form-group">
            <label for="getpass">Password:</label>
            <input type="password" class="form-control" name="getpass" required>
        </div>
        <div class="form-group">
            <label for="conpass">Confirm Password:</label>
            <input type="password" class="form-control" name="conpass" required>
        </div>
        <button type="submit" class="btn btn-primary" name="sub">Sign up</button>
    </form>

    <?php
    if (isset($_POST['sub'])) {
        require 'connection.php';

        $getname = $_POST['getname'];
        $getemail = $_POST['getemail'];
        $getpass = $_POST['getpass'];
        $conpass = $_POST['conpass'];

        $sql = "SELECT email_id FROM user_data WHERE email_id = '$getemail'";
        $sqlres = mysqli_query($connect, $sql);

        if ($sqlres) { // Check if the query was successful
            $rowcount = mysqli_num_rows($sqlres);

            if ($rowcount != 0) {
                echo "<p class='text-danger'>User email is not available. Please try another one.</p>";
            }
            if ($getpass != $conpass) {
                echo "<p class='text-danger'>Please confirm the password properly.</p>";
            }
            if ($rowcount == 0 && $getpass == $conpass) {
                echo "<p class='text-success'>You have successfully signed up.</p>";
                $gotologin = "<a href='Login.php' class='btn btn-link'>Go to Login</a>";
                echo $gotologin;

                $sql = "INSERT INTO user_data (full_name, email_id, password) VALUES ('$getname', '$getemail', '$getpass')";
                $sqlres = mysqli_query($connect, $sql);
            }
        } else {
            echo "Query execution failed. Error: " . mysqli_error($connect);
        }
    }
    ?>
</div>
</body>
</html>
