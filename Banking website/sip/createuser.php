<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="createuser.css">
</head>

<body>
    <?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];

        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users(username, email,password, balance) VALUES ('{$username}', '{$email}','$hashedPassword','{$balance}')";
        
        // This function is used to execute a SQL query on the connected database.
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header ("location: transfermoney.php");
        }
        else{
            echo"something went wrong";
        }
    }
    ?>

  <?php 
    // include 'navbar.php';
    ?>

<div class="outer-box">
        <div class="inner-box">
            <header class="signup-page">
                <h1>Signup</h1>
            </header>
            <main class="signup-body">
            <form class="#" method="post">
                    <p>
                        <label for="Username">Username</label>
                        <input type="text" id="Username" placeholder="abc" type="text" name="username" required>
                    
                    <p>
                        <label for="Email">Email</label>
                        <input type="text" id="fullname" placeholder="abc@gmail.com" type="email" name="email" required>
                    </p>
                    <p>
                        <label for="Password">Password</label>
                        <input type="password" id="Password" placeholder="Enter your password" name="password" required>
                        <!-- <input type="checkbox" onclick="togglePasswordVisibility()"> -->
                    </p>
                    <p>
                        <label for="balance">balance</label>
                        <input type="text" id="fullname" placeholder="balance" type="number" name="balance" required>
                    </p>
                    <p>
                        <input type="submit" id="submit" value="CREATE" name="submit" required>
                    </p>
                </form>
            </main>
            <footer class="signup-footer">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </footer>
        </div>
        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
    <!-- <script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("Password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script> -->

</body>
</html>