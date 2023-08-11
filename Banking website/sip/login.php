<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input values from the form
    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Use your chosen password hashing method to compare the passwords.
        // if (username_verify($password, $hashedPasswordFromDB)) {
            // Authentication successful. Create a session (replace this with your actual session management code).
            session_start();
            $_SESSION['username'] = $username;

            // Redirect the user to the home page after successful login.
            header("Location: transfermoney.php");
            exit;
        } 
            // Authentication failed. Display an error message (replace this with your actual error handling code).
            $error_message = "Invalid credentials. Please try again.";
        }
     else {
        // Authentication failed. Display an error message (replace this with your actual error handling code).
        $error_message = "Invalid credentials. Please try again.";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" >
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">forgot password</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="createuser.php">Register</a></p>
            </div>

        </form>
    </div>
</body>
</html>
