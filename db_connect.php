<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "ai_tugas15");
        if (mysqli_connect_errno()){
            echo "Failed To Connect to MySQL: " . mysqli_connect_errno();
            exit();
        }
        ?>