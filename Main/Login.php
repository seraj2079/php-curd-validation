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
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h3>Login Page</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="getemail">Email</label>
                <input type="text" class="form-control" name="getemail" required>
            </div>
            <div class="form-group">
                <label for="getpass">Password</label>
                <input type="password" class="form-control" name="getpass" required>
            </div>
            <button type="submit" class="btn btn-primary" name="sub">Login</button>
            <div class="signup-link">
                <p>Don't have an account? <a href="Registration.php">Sign Up</a></p>
            </div>
        </form>
        <?php
        if (isset($_POST['sub'])) {
            require 'connection.php';
        
            $getemail = $_POST['getemail'];
            $getpass = $_POST['getpass'];
        
            $sql = "SELECT * FROM user_data WHERE email_id='$getemail' AND password='$getpass'";
            $sqlres = mysqli_query($connect, $sql);
            $countrows = mysqli_num_rows($sqlres);
        
            if ($countrows == 0) {
                echo "<p class='text-danger'>Account not registered. Please <a href='Registration.php'>Sign up</a>.</p>";
            } else {
                header("Location: home.php");
                exit;
            }
        }
        ?>
    </div>
</body>
</html>
