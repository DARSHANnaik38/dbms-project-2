<?php
session_start();
$con=mysqli_connect("localhost","root","","user1");
$usertrim=trim($_POST['username']);
$usertrip=stripcslashes($usertrim);
$finaluser=htmlspecialchars($usertrip);


$passtrim=trim($_POST['password']);
$passtrip=stripcslashes($passtrim);
$finalpass=htmlspecialchars($passtrip);


//cmparison
$sql="SELECT * FROM user_table where username='$finaluser' AND password='$finalpass'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>=1)
{
    $_SESSION["myuser"]=$finaluser;
    header("Location:newpage.html");
}
else
{
    $_SESSION["error"]="you are not valid user";
    header("Location:error.html");

}
?>