<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบภาพยนต์</title>
</head>
<body>
    <?php
    require_once("dbcon.php");
    session_start();
    if(isset($_POST['login'])) {
        $sql = "SELECT * FROM movie WHERE movie_cust = '{$_POST['movie_cust']}' AND movie_pin = '{$_POST['movie_pin']}'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["movie_cust"] = $row['movie_cust'];
        } else {
            echo "<p>รหัสผิด</p>";
        }
    }

    if(isset($_POST['logout'])){

        session_unset();
    }

    if(isset($_SESSION['movie_cust'])){
        require_once("table1.php"); 
        //นี่คือหน้าแรกที่เชื่อไป ไฟล์ table1.php

    }else{
        require_once("login.php");
    }
    
    ?>
</body>
</html>