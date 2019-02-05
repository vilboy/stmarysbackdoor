<?php
$ts="-";
$tm="-";
$tf="-";
$tsf="-";
$tv="-";
$tu="-";

include('config.php');
//fetch count log details
$sql = "SELECT COUNT(DISTINCT ip) as tu , COUNT(sno) as tv FROM `log`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $tu=$row["tu"];
        $tv=$row["tv"];
    }
} 

//$sql = "SELECT  chtno FROM `r18`UNION SELECT  sno,name,htno from all_students ;



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statistics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2>Praveen Gadikoppula Stmarys Statistics</h2>
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Total Students</div>
      <div class="panel-body"><?php echo $ts ?></div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">Total Male Students</div>
      <div class="panel-body"><?php echo $tm ?></div>
    </div>

    <div class="panel panel-success">
      <div class="panel-heading">Total Female Students</div>
      <div class="panel-body"><?php echo $tf ?></div>
    </div>

    <div class="panel panel-info">
      <div class="panel-heading">Total Staff</div>
      <div class="panel-body"><?php echo $tsf ?></div>
    </div>

    <div class="panel panel-warning">
      <div class="panel-heading">Total Page Visits</div>
      <div class="panel-body"><?php echo $tv ?></div>
    </div>

    <div class="panel panel-danger">
      <div class="panel-heading">Total Users Visits</div>
      <div class="panel-body"><?php echo $tu ?></div>
    </div>

    <div class="panel panel-info">
      <div class="panel-heading">Recent Devices</div>
      <div class="panel-body">
         <?php 
         $sql = "SELECT DISTINCT u_agent from `log`";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
         // output data of each row
          while($row = $result->fetch_assoc()) {
           // echo "<p>".$row['date']."</p><br> ";
            echo "<p>".$row['u_agent']."</p><br> ";
            //echo "<p>".$row["tv"]."</p><br>";
    }
}  ?>
         
         
         
         
         
         
         </div>
    </div>
  </div>
</div>

</body>
</html>
