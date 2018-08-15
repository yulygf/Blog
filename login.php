<?php
session_start();
 
if (isset($_SESSION['mysesi']) && $_SESSION['mytype']=='user'):
	echo "<script>window.location.assign('home.php')</script>";
	
	else :
		if (isset($_SESSION['mysesi']) && $_SESSION['mytype']=='writer'):
			echo "<script>window.location.assign('main.php')</script>";
		endif;

endif;

?>
<?php
include "header.php";
?>
<body>
<div class="container"> 
  
<?php
error_reporting(0);
$email=$_POST['email'];  
$password=$_POST['password'];
$login=$_POST['login'];
if(isset($login)){
	include "config.php";
	$res = $mysqli->query("SELECT * FROM user where email='$email' and password='$password'");
	$row = $res->fetch_assoc();
	$id = $row['iduser'];
	$user = $row['email'];
	$name = $row['nameuser'];
	$pass = $row['password'];
	$type = $row['tlogin'];
	if($user==$email && $pass==$password){
		session_start();
		if($type=="writer"){
			$_SESSION['mysesi']=$name;
			$_SESSION['myses']=$id;
			$_SESSION['mytype']=$type;
			echo "<script>window.location.assign('main.php')</script>";
		}
			else if($type=="user"){
				$_SESSION['mysesi']=$name;
				$_SESSION['myses']=$id;
				$_SESSION['mytype']=$type;
				echo "<script>window.location.assign('home.php')</script>";
			}
				else{
					?>
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<strong></strong>Filled in the required fields
					</div>
					<?php
				}
	}
		else{
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong></strong>Password or email entered incorrectly
			</div>
			<?php
		}
}
?>
<div class="col-sm-4 ">

</div>
<div class="col-sm-4 ">
<br>
<div class="panel panel-primary">
<div class="panel-body">
<form role="form" method="post">
	<br><center><font  size=6 >Sign in</font></center>
	<h5><a href="reg.php" ><span class="glyphicon glyphicon" aria-hidden="true"></span>Don’t have an account? Join now!</a></h5>
	<div class="form-group">
		<input  type="email"  class="form-control" id="email" name="email" placeholder="Email Address">
	</div>
	<div class="form-group">
		<input type="password"  class="form-control" id="password" name="password" placeholder="Password">
	</div>
	<div class="form-group">
		<button type="submit"  class="btn btn-primary btn-md" name="login">Sign in</button>
	</div>
</form>
</div>
</div>
</div>
<?php
include "footer.php";
?>
</html> 