
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
    <title>Staff Search By  by Praveen Gadikoppula </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77014190-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-77014190-3');
</script>

    <!--- bootstrap  3 head --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!---bootstrap end -->

    <link rel="stylesheet" type="text/css" media="screen" href="css/search.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1> STMARYS  STAFF SEARCH</h1>
    <br>

    <!-- Search Bar -->
    <form action="staff.php" method="get">

     <div class="container">
  <div class="input-group">
    <input type="text" class="form-control" name="q" placeholder="Enter Search word">
    <div class="input-group-btn">
      <button class="btn btn-info" type="submit" name="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
</div>
</form>


      </div>      
        


 

<div class="container">


<table class="table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Faculty Name</th>
        <th>Contact</th>
        <th>EmpID</th>
      </tr>
    </thead>
    <tbody>


<?php

 include('log.php');

$key="NULL";


if(isset($_GET['submit']))
{
$key=$_GET["q"];
include('config.php');

//$sql = "SELECT DISTINCT a.sno,a.name,a.htno FROM `d0`  d, all_students a where a.name LIKE '%$key%' or d.name LIKE '%$key%'or d.sno='$key' or d.htno='$key' or d.college_code='$key' ";
$sql = "SELECT  * FROM `staff` where name LIKE '%$key%' or empid='$key' or contact='$key'";
$result = $conn->query($sql);
$c=$result->num_rows;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     echo "<tr class='success'>";
     echo "<td>". $row["sno"]. "</td><td>". $row["name"]. "</td><td>". $row["contact"]. "</td><td><a href='student.php?htno=" . $row['empid'] . "&submit='>" . $row["empid"] .  "</a></td></tr>";
    }
}

$conn->close();
}
?>  
</tbody>


         <?php if ($c > 0) {
                           echo "<div class='alert alert-success alert-dismissible fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success! </strong>" .$c. "  Record Found, Showing Results for ".$key."</div>";
    
                       } else {
                           echo  "<div class='alert alert-danger alert-dismissible fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error! </strong> No Results Found </div>";

                          }
          ?>
</table>
</div>



        
</body>
</html>