<?php

include 'config.php'; // Add a semicolon at the end of this line

$sql = "SELECT * FROM transaction";

$query = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_assoc($query)) {
    ?>
    <tr style="color: black">
        <td class="py-2"><?php echo $rows['sno']; ?></td>
        <td class="py-2"><?php echo $rows['sender']; ?></td>
        <td class="py-2"><?php echo $rows['receiver']; ?></td>
        <td class="py-2"><?php echo $rows['balance']; ?></td>
        <td class="py-2"><?php echo $rows['datetime']; ?></td>
    <?php
}
?>


<?php
                include 'config.php';

                $sql = "select * from transaction";
                $query = mysqli_query($conn, $sql);

                while ($rows = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr style="color: black;">
                        <td class="py-2"><?php echo $rows['sno']; ?></td>
                        <td class="py-2"><?php echo $rows['sender']; ?></td>
                        <td class="py-2"><?php echo $rows['receiver']; ?></td>
                        <td class="py-2"><?php echo $rows['balance']; ?></td>
                        <td class="py-2"><?php echo $rows['datetime']; ?></td>
                    </tr>
                <?php
                }