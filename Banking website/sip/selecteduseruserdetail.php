 <?php
include 'config.php';

if (isset($_POST['submit'])) {
    $form = $_GET['ID'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    if ($amount < 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    } elseif ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo 'alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    } elseif ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users SET balance=$newbalance WHERE id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users SET balance=$newbalance WHERE id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['username'];
        $receiver = $sql2['username'];
        $sql = "INSERT INTO transaction (sender, receiver, balance) VALUES ('$sender', '$receiver', $amount)";
        mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>alert('Transaction successful');
            window.location='transactionhistory.php';
            </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body style="background-color: #E59866;">

<?php include 'navbar.php'; ?>

<div class="container">
    <!-- Rest of the content -->
</div>

<footer class="text-center mt-5 py-2">
    <p>&copy; 2023. Made by</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384.DfXdz2htPH01sSSs5nCTpuj/zy4C+o"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-"></script>
</body>
</html>
