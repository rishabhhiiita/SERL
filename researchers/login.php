<?php
session_start(); // Start the session for storing user information

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect the user to the dashboard or another authorized page
    header("Location: dashboard.php");
    exit;
}

// Include the database connection file
require_once "db_connection.php";

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to validate user credentials    
    $query = "SELECT * FROM researchers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);    

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $_SESSION['loggedin'] = true;

        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];               
        
        // Redirect the user to the dashboard or another authorized page
        header("Location: dashboard.php");
        exit;
    } else {
        // Login failed
        $error = "Invalid email or password";
    }
}

// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .container form label {
            margin-bottom: 10px;
        }

        .container form input[type="text"],
        .container form input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 95%;
        }

        .container form button {
            padding: 12px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .container form button:hover {
            background-color: #333;
        }

        .container .message {
            color: #f00;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>       

        <?php if (isset($error)) { echo "<p class='message'>$error</p>"; } ?>

        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <br>

            <button type="submit" value="Login">Login</button>
        </form>
    </div>    
</body>
</html>
