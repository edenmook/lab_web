<?php
    
   require_once("dbcon.php");
    $sql = "INSERT INTO movie (movie_id, movie_name, movie_date)
    VALUES ('{$_POST['movie_id']}', '{$_POST['movie_name']}', '{$_POST['movie_date']}')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();   

?>