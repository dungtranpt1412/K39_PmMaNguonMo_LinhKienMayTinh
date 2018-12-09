<?php
$conn= mysqli_connect("localhost", "root", "", "linhkien");
        $sql="select * from loailinhkien";
        $result = $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }

        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                var_dump($row);
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
?>

