

<?php


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "stmarys";
$htno="-";
$branch="-";
$cid="-";
$sname="-";
$fname="-";
$dob="-";
$br="-";
$sr="-";
$err="";

if(isset($_GET['submit']))
{
$htno=$_GET["htno"];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `ecet_results` where HALLTICKET_NO=$htno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $htno=$row["HALLTICKET_NO"];
        $cid=$row["CANDIDATE_ID"];
        $branch=$row["RESULT_BRANCH"];
        $sname=$row["CANDIDATE_NAME"];
        $fname=$row["FATHERS_NAME"];
        $dob=$row["DOB"];
        $br=$row["RESULT_BRANCH_RANK"];
        $sr=$row["RESULT_STATE_RANK"];
    }
} else {
     $err="Please Check the Hallticket";
}
$conn->close();
}
?>



<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
    <title>SINGLE WINDOW ECET RESULTS by Praveen Gadikoppula </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77014190-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-77014190-3');
</script>

    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>::::::: Welcome to ECET Results SW-III :::::::::</h1>
    <br>
    <form action="index.php" method="get">
   <strong> Hallticket No:</strong> <input type="number" name="htno" value="" placeholder="Enter your Hallticket No"></input>
    <input type="submit" name="submit"></input>
    </form><br><br>
    <div> 
    <center>
        
    <table>
        <caption>SW-III ECET RESULTS </caption><br><br>
        <p><?php echo $err; ?></p>
    <tr>
        <th>Halltickets :</th><td><?php echo $htno; ?></td><th>Candiate ID :</th><td><?php echo $cid; ?></td><th>Branch :</th><td><?php echo $branch; ?></td>
    </tr>
    <tr>
        <th>Name :</th><td><?php echo $sname; ?> </td><th>Father    :</th><td><?php echo $fname; ?> </td><th>DOB :</th><td><?php echo $dob; ?></td>
    </tr>
    <tr><td colspan="6">***************************************************************************************************************************</td></tr>

        <tr>
            <th  class="results" colspan="3">BRANCH RANK</th><th class="Results" colspan="3">STATE RANK</th>
        </tr>
        <tr>
            <td colspan="3" ><?php echo $br; ?></td><td colspan="3"><?php echo $sr; ?></td>
        </tr>
   
    </table>
    <?php 

       if($br==0){
             echo "<img src='images/fail.png' alt='fail' width='100' height='100'></img>";
             echo  "<p class='fail'>Better Luck Next Time...</p>";
           
        
       }else{
        echo "<img src='images/pass.gif' alt='pass'></img><br>";
       echo "<audio controls autoplay>
            <source src='pass.mp3' type='audio/mpeg'>
             Your browser does not support the audio element.
            </audio>";
       }
    ?>

</center>
</div>


</body>
</html>