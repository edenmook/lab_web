<?php 
    //echo $_GET['id'];
    //connect db
     require_once("dbcon.php");

     $sql = "SELECT * FROM movie WHERE movie_id='{$_GET['id']}' ";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
     }

?>

<h3>แก้ไขภาพยนต์<small><a href=".">ย้อนกลับ</a></small></h3>

<form action="update.php" method="post">
    <label for="">รหัสภาพยนต์ :</label>
    <?php echo $row['movie_id'];?>
    <input type="hidden" name="movie_id" id="movie_id" value="<?php echo $row['movie_id'];?>">
    <br><br>
    <label for="movie_name">ชื่อภาพยนต์ :</label>
    <input type="text" name="movie_name" id="movie_name" value="<?php echo $row['movie_name'];?>">
    <br><br>
    <label for="movie_date">เดือน/วัน/ปี :</label>
    <input type="datetime" name="movie_date" id="movie_date" value="<?php echo $row['movie_date'];?>">
    <br><br>
   <button type="submit">ยืนยัน</button>
   <button type="reset">ล้างข้อมูล</button>
</form>
