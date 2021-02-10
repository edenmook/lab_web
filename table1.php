<?php
require_once("dbcon.php");

  //เช็คว่ามีการกดปุ่มรึป่าว 
  if(isset($_GET['delete'])){
    echo $_GET['id'];
    // sql to delete a record
$sql = "DELETE FROM movie WHERE movie_id = '{$_GET['id']}'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);}

  }
$sql = "SELECT * FROM movie";


    //เช็คค้นหา  
  if(isset($_GET['search_click'])){
    //แสดงข้อมูลค้นหา
    $sql = "SELECT * FROM movie WHERE movie_name LIKE '%{$_GET['search']}%'";
    echo "<p>คุณกำลังค้นหา : {$_GET['search']}</p>";
  }
$result = $conn->query($sql);

      ?>
<form action="." method="get">
    <label for="search">ช่องค้นหา</label>
    <input type="text" name="search" id="search" placeholder="ช่องค้นหา...">
    <button type="submit" name="search_click">ค้นหา</button>
</form>

<a href="insert_form.php">เพิ่มภาพยนต์</a>
<table style="width:100%" border="1">
  <tr>
    <th>รหัสภาพยนต์</th>
    <th>ชื่อภาพยนต์</th>
    <th>เวลาที่ฉาย</th>
    <th>ชื่อผู้ใช้</th>
    <th>PIN</th>
    <th>Tool</th>
  </tr>
  <?php

  //เช็คว่ามีข้อมูลในดาต้าเบสไหม
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  ?>
 
  <tr>
    <td><?php  echo $row['movie_id']; ?></td>
    <td><?php  echo $row['movie_name']; ?></td>
    <td><?php  echo $row['movie_date']; ?></td>
    <td><?php  echo $row['movie_cust']; ?></td>
    <td><?php  echo $row['movie_pin']; ?></td>
    <td align="center">
      <a href="update_form.php?id=<?php  echo $row['movie_id']; ?>">แก้ไข</a>
      <a href="?delete=1&id=<?php  echo $row['movie_id']; ?>">ลบ</a>
    </td>
  </tr>
<?php
   
  }
} else {
  echo "0 results";
}
$conn->close();

?>

 
</table>