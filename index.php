
<?php
session_start();
include "header.html" ?>
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Login Stmarys</h3>
  

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">

    <div class="input-group">
      

      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="number" name="key" value="" class="form-control" placeholder="Mobile Number">
      <div class="input-group-btn">
        <button name="submit"  value="ok" type="submit" class="btn btn-success">Get OTP</button>
      </div>
    </div>
  </form>
<br>
<?php 
$name="null";
$id="";
$num="";
$otp="";
if(isset($_POST['submit'])){
include('config.php');
$num =$_POST['key'];
$sql="SELECT * FROM all_students WHERE phone= '".$num."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

    $id=$row['htno'];
    $name=$row['name'];
    $num=$row['phone'];
    $otp= rand(100000, 999999);
    $_SESSION['session_otp'] = $otp;

}

mysqli_close($conn);

if($name!="null"){
  
$url="https://2factor.in/API/V1/88963718-2656-11e9-9ee8-0200cd936042/SMS/$num/$otp/teststmarys";
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_POST,1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
//execute post
$result = curl_exec($ch);
$msg="";
if(curl_exec($ch) === false) {
    $msg= 'Curl error: ' . curl_error($ch);
} else {
    $msg='OTP Sent Successfull !';
}
//close connection
curl_close($ch);
  echo "<div class='alert alert-success'>
  <strong>".$msg."</strong> We found your details .<br> Name :<strong> ".$name."</strong><br> Your ID :<strong> ".$id."</strong>
  </div>";
 echo "<div class='error'></div>
 <div class='success'></div>
 <form id='frm-mobile-verification'>
   <div class='form-row'>
     <label>OTP is sent to Your Mobile Number</label>		
   </div>
 
   <div class='form-row'>
     <input type='number'  id='mobileOtp' class='form-input' placeholder='Enter the OTP'>		
   </div>
 
   <div class='row'>
     <input id='verify' type='button' class='btnVerify' value='Verify' onClick='verifyOTP();'>		
   </div>
 </form>
 
 <script src='jquery-3.2.1.min.js' type='text/javascript'></script>
   <script src='verification.js'></script>";

}
else{
 echo "<div class='alert alert-danger'>
  <strong>Sorry!</strong> No Account found with that contact <br><strong>".$num."</strong>
  </div>"; }


}else{
echo "<div class='alert alert-info'>
<strong>Info:</strong> Please enter your personal mobile number to Login.
</div>"; }

?>

 
<?php include "footer.html" ?>