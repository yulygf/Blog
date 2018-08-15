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
include "config.php";
include "header.php";
?>
<body>
<div class="container">
	<div class="panel-header clearfix">
	
	   <div class="col-sm-9">
	
	   </div>
	</div>



<div class="col-sm-4 ">

</div>		
<div class="col-sm-4 ">      
<div class="row placeholders">
  <?php
    
if(isset($_POST['bts'])):

  if($_POST['nm']!=null  && $_POST['tl']!=null  && $_POST['tc']!=null && $_POST['tl']=$_POST['tc'] && $_POST['el']!=null  ){
	  
	 $nm = $_POST['nm'];
	 $tc= $_POST['tc'];
	 $el = $_POST['el'];
	 
     $stmt = $mysqli->prepare("INSERT  INTO user(nameuser,password,email,tlogin) VALUES (?,?,?,'user') ");
     $stmt->bind_param('sss', $nm, $tc,$el);
     if($stmt->execute()):
   ?>
<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong></strong>Registration completed successfully


</div>
	 
	 <?php  
     else:
?>
<p></p>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong></strong>Registration failed<?php echo $stmt->error; ?>
</div>
<?php
     endif;
	  
	 
	 
  } else{
?>
<p></p>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong></strong>Not all data is full or passwords do not match
</div>
<?php
  }
  
  endif; 
?>





     <br><br><div class="panel panel-primary">
	 
       <div class="panel-body">
        
  <form role="form" method="post">
  <center><font  size=5 >Sign up</font>  </center> 
  	 <h5><a href="login.php"><span class="glyphicon glyphicon" aria-hidden="true"></span>Already registered? Sign in.</a></h5>
     <div class="form-group">
      <input type="text" class="form-control" name="nm" id="nm" pattern="^([a-zA-Z]{1})([a-zA-Z0-9]){2,15}$" title="Must start with a letter. A-Z,a-z,0-9. Maximum 16 characters."  placeholder="Username" required / >
    </div>
    
	<div class="form-group">
      <input type="email" class="form-control" name="el" id="el" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" title="Example@site.com" placeholder="Email Address" required / >
    </div>
	
    <div class="form-group">
      <input type="password" class="form-control" name="tl" id="tl"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="A-Z,a-z,0-9. Minimum 8 characters." placeholder="Password" required / >
    </div>
	  <div class="form-group">
      <input type="password" class="form-control" name="tc" id="tc"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="A-Z,a-z,0-9. Minimum 8 characters."  placeholder="Confirm Password" required / >
    </div>

	
   
	
	
    <button type="submit" name="bts" class="btn btn-primary btn-md">Sign Up</button>
	</div>
  </form>
  
	 
  </div>
  </div>
  <div class="col-sm-4">
</div>
  
<?php
include "footer.php";
?>
