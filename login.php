<?php include "header.html" ?>
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Login Stmarys</h3>
  

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">

    <div class="input-group">
      

      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="email" name="key" value="" class="form-control" placeholder="Email ID">
      <div class="input-group-btn">
        <button name="submit"  value="ok" type="submit" class="btn btn-success">Get OTP</button>
      </div>
    </div>
  </form>
<br>
<?php 
$name="null";
$id="";
$mail="";
if(isset($_POST['submit'])){
include('config.php');
$mail =$_POST['key'];
$sql="SELECT * FROM all_students WHERE email= '".$mail."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

    $id=$row['htno'];
    $name=$row['name'];
    $mail=$row['email'];

}

mysqli_close($bd);

if($name!="null"){
  echo "<div class='alert alert-success'>
  <strong>OTP Sent Successfull !</strong> We found your details .<br> Name :<strong> ".$name."</strong><br> Your ID :<strong> ".$id."</strong>
  </div>";
}
else{
 echo "<div class='alert alert-danger'>
  <strong>Sorry!</strong> No Account found with that contact <br><strong>".$mail."</strong>
  </div>"; }


}else{
echo "<div class='alert alert-info'>
<strong>Info:</strong> Please enter your personal mobile number to Login.
</div>"; }

?>
 </div>




<?php include "footer.html" ?>