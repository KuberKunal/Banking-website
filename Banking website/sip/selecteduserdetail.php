 <?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width,initial-scale-1.0">
        <title>Transaction</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integeri>
        <link rel="stylesheet" type="text/css" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">

        <style type="text/css">

            button{
                border:none;
                background: #d9d9d9;
            }
            button:hover{
                background-color:#777E8B;
                trasform: scale(1.1);
                color:white;
            }

            </style>
            </head>

            <body style="background-color : #E59866;">

            <?php
            include 'navbar.php';
            ?>
           
           <div class="container">
            <h2 class="text-centre pt-4" style="color : black;">Transaction</h2>
            <?php
            include 'config.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM users where id=$sid";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div>
                <table class="table table-striped table-condensed table-bordered">\
                    <tr style="color : black;">
                    <th class="text-centre">Id</th>
                    <th class="text-centre">Username</th>
                    <th class="text-centre">Email</th>
                    <th class="text-centre">Balance</th>
        </tr>
        <tr style="color : black;">
        <td class="py-2"><?php echo $rows['id'] ?></td>
        <td class="py-2"><?php echo $rows['username'] ?></td>
        <td class="py-2"><?php echo $rows['email'] ?></td>
        <td class="py-2"><?php echo $rows['balance'] ?></td>
        </tr>
        </table>
        </div>
        <br><br><br>
        <label style="color: black;"><b>Transfer To:</b></label>
<select name="to" class="form-control" required>
    <option value="" disabled selected>choose</option>
    <?php
    include 'config.php';
    $sid = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id != $sid"; // Corrected the WHERE clause
    $result = mysqli_query($conn, $sql); // Corrected $con to $conn
    if (!$result) {
        echo "Error " . $sql . "<br>" . mysqli_error($conn);
    }
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
        <option class="table" value="<?php echo $rows['id']; ?>">
            <?php echo $rows['username'] . " (Balance: " . $rows['balance'] . ")"; ?>
        </option>
    <?php
    }
    ?>
</select>

        <br>
        <br>
        <label style="color : black;"><b>Amount:</b></label>
        <input type="number" class="form-control" name="amount" required>
        <br><br>
        <div class="text-centre">
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button>
        </div>
        </form>
        </div>
        <footer class="text-centre mt-5 py-2">
            <p>&copy 2023. Made by <b>Abhishek</b> <br>Abhishek Foundation</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384.DfXdz2htPH01sSSs5nCTpuj/zy4C+o">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-">
            </body>
            </html>