<?php
session_start();
 
if(!isset($_SESSION['mysesi']) || $_SESSION['mytype']!='writer'){
	echo "<script>window.location.assign('index.php')</script>";
}
?>
<?php
include "config.php";
include "header.php";
?>   <div class="container">
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

<div class="col-sm-2">
</div>
<div class="col-sm-8">

		      <div class="row placeholders">
	
<br>
<?php

if(isset($_GET['u'])):
    
     $res = $mysqli->query("SELECT text.*,user.nameuser  FROM text,user WHERE text.iduser=user.iduser AND ids=".$_GET['u']  );
     $row = $res->fetch_assoc();
?> 

            <div class="panel panel-default">
            <div class="panel-heading">
    <h3 class="panel-title"><center>  <font align="left" size=5 color="07522c"><?php echo $row['theme'] ?> </font>  </center> </h3>
            </div>
             <div class="panel-body">
		<h3><?php echo '<img align="left" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="180" width="180" class="img-thumnail" /> '?> </h3>
		
            <?php echo $row['text'] ?>
			<hr size=3px width=500px align="left">
   <br> <h4><?php echo $row['data'] ?> by <?php echo $row['nameuser'] ?></h4> 
            </div>
            
<?php
endif;
?>
               
<div class="col-sm-2">
</div>
  <!--------------------------------------------------------------------------->
 <?php  
 
 if(isset($_GET['u'])):
 if(isset($_POST["bts"]))  
 {  
if($_POST['nm']!=null && $_POST['nc']!=null  ){
	  $nm = $_POST['nm'];
	  $nc = $_POST['nc'];
	  $id = $_POST['id'];
      $query = "INSERT INTO comment(comm,namecomm,ids) VALUES ('$nm','$nc','$id ')";  
      if(mysqli_query($mysqli, $query)) {  
      echo '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong></strong>Comment added
            </div>';}  
	  else {  
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong></strong>Could not add comment
             </div>';
			} 
 }
else {
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong></strong> Fill in all the fields
	</div>'; }	 
 }  
     $res = $mysqli->query("SELECT * FROM text WHERE ids=".$_GET['u']);
     $row = $res->fetch_assoc();
 ?>  
      <div class="container-fluid">
	  <div class="col-sm-1">
      </div>
	  <div class="col-sm-11">
     <div class="panel panel-primary">
        <div class="panel-body">
        
                <form method="post" enctype="multipart/form-data">  
					   <div class="form-group">
      <input type="text" class="form-control" name="nm" id="nm"  placeholder="My comment to the post" required />
                       </div>
      <input type="hidden" value="<?php echo $_SESSION['mysesi'] ?>" name="nc"/>
      <input type="hidden" value="<?php echo $row['ids'] ?>" name="id"/>
      <input type="submit" name="bts" id="bts" value="Add Post" class="btn btn-info" />  
                </form>  
        </div>
		</div>
		</div>
		
     
	 </div>
<?php
endif;
?>
  <!--------------------------------------------------------------------------->
 <?php
if(isset($_GET['u'])):
    
    $res = $mysqli->query("SELECT comment.*,user.nameuser,text.* FROM text, user, comment WHERE   comment.ids=text.ids AND text.iduser=user.iduser AND .comment.ids=".$_GET['u']);
   while ($row = $res->fetch_assoc()):
?> 
 <div class="container-fluid">
	  <div class="col-sm-1">
      </div>
<div class="col-sm-8">
<div class="panel panel-default">
           <div class="panel-heading">
		   <div class="panel-body">
           <?php echo $row['comm'] ?>
      <br> <?php echo $row['datacomm'] ?>    <?php echo $row['namecomm'] ?> 
	   <a onclick="return confirm('Do you want to delete this comment')" href="deletecomm.php?d=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	   <a href="updatecomm.php?b=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
           </div>
		 
          </div>    
</div> 
</div>
		<div class="col-sm-3">
       </div>
     
	 </div>

<?php
endwhile;
endif;
?>
<!--------------------------------------------------------------------------->
                    </div>
                    </div> 
</div>
