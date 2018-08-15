<?php
session_start();
 
if (!isset($_SESSION['mysesi']) &&  !isset($_SESSION['mytype'])=='writer')
{
  echo "<script>window.location.assign('index.php')</script>";
}

include "config.php";
include "header.php";
?>
<div class="container">
 	<div class="panel-header clearfix">
        <div class="form-group">
		
		<div class="col-sm-1">
			<h2><a href="main.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Back</a></h2>
	    </div>
		<div class="col-sm-1">
			<h2><a href="login.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign in</a></h2>
	    </div>
		<div class="col-sm-1">
			<h2><a href="reg.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign up</a></h2>
	    </div>
		<div class="col-sm-1">
			<h2><a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Add post</a></h2>
	    </div>
		<div class="col-sm-6">
		
		</div>
	   <div class="col-sm-1">
			<br><h4> <?php echo $_SESSION['mysesi'] ?></h4>
       </div>
	   <div class="col-sm-1">
            <br><a class="btn btn-primary btn-md" href="logout.php" role="button">Exit</a>
       </div>
	   </div>
	</div>
 

<div class="col-sm-4 col-md-2 sidebar">
</div>
<div class="col-sm-6 col-sm-offset-2 col-md-8 col-md-offset-1 main">

		      <div class="row placeholders">
<?php

if(isset($_GET['u'])):
     if(isset($_POST['bts'])):
          $stmt = $mysqli->prepare("UPDATE text SET theme=?, text=? WHERE ids=?");
          $stmt->bind_param('sss', $nm, $gd, $id);
 
          $nm = $_POST['nm'];
          $gd = $_POST['gd'];
         
          $id = $_POST['id'];
 
          if($stmt->execute()):
               echo "<script>location.href='main.php'</script>";
          else:
               echo "<script>alert('".$stmt->error."')</script>";
          endif;
     endif;
     $res = $mysqli->query("SELECT * FROM text WHERE ids=".$_GET['u']);
     $row = $res->fetch_assoc();
?>
 
    <center> <font  size=5 color="white"></font> </center> 
 <div class="panel panel-primary">
       <div class="panel-body">
        
    <form role="form" method="post">
    <input type="hidden" value="<?php echo $row['ids'] ?>" name="id"/>
    <div class="form-group">
      <label for="nm">Theme<span style="color:red">*</span></label>
      <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $row['theme'] ?>" required />
    </div>
    <div class="form-group">
      <label for="gd">Text<span style="color:red">*</span></label>
      <textarea rows="12" class="form-control" id="gd" name="gd" required ><?php echo $row['text'] ?></textarea> 
    </div>
  
     <button type="submit" name="bts" class="btn btn-primary btn-md">Change</button>
    </form>
         </div>
  </div>
 </div> 
 </div> 
</div>
<?php
endif;
include "footer.php";
?>
 
