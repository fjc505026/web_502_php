<?php
session_start();

$username=$_SESSION['session_user'];
include ('../config/db_conn.php');
$oldpasd=isset($_POST['oldpsd'])?$_POST['oldpsd']:' ';
$newpsd=isset($_POST['newpsd'])?$_POST['newpsd']:' ';
$password1=$mysqli->real_escape_string(strip_tags(substr($oldpasd,0,32)));
$password2=$mysqli->real_escape_string(strip_tags(substr($newpsd,0,32)));
$hashpassword1=crypt($password1,'$2y$07$SuperSecretSaltIsSexy$');
$hashpassword2=crypt($password2,'$2y$07$SuperSecretSaltIsSexy$');
$valid=false;
$password_changed=false;

//check the old password is match
$query="SELECT  `password` FROM `user` WHERE `username` = '$username';";
$result=$mysqli->query($query);
//echo  $query;
while($row =$result->fetch_array(MYSQLI_ASSOC))
{
 if (hash_equals($row['password'],$hashpassword1))   //success
    $valid=true;
 else   $valid=false;
}
$result->free();

if($valid){
//update new password
$query="UPDATE `user`  SET `password`= '$hashpassword2'  WHERE `username` = '$username';";
//echo  $query;
if($result=$mysqli->query($query))
    $password_changed=true;
}
$mysqli->close();

?>
<html>

<?php if($password_changed){ ?>
<p>PASSWORD already change to: <?php echo $newpsd;?></p>
<?php } else{?>
<p>PASSWORD change fail!<?php echo $valid;?> </p>
<?php }?>
    <a href="../php/info.php" type="button" class="btn btn-secondary">Return</a>
</html>