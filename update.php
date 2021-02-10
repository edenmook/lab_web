<h1>Update data</h1>

<?php 
    require_once("dbcon.php");

    $sql = "UPDATE movie SET 
    
    movie_name = '{$_POST['movie_name']}',
    movie_date = '{$_POST['student_date']}'
    WHERE movie_id = '{$_POST['movie_id']}'  ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close(); 

?>