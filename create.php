<?php
session_start();
 
if(!isset($_SESSION['myses']) || $_SESSION['mytype']!='writer'){
	echo "<script>window.location.assign('index.php')</script>";
}
?>
<?php
include "config.php";
include  "header.php";
?> 
 <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
      <body>  
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
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-4 ">
 
  </div>

<div class="col-sm-6 ">

		<div class="row placeholders">
 <?php  
 
 
 if(isset($_POST["bts"]))  
 {  
if($_POST['nm']!=null && $_POST['gd']!=null   ){
	  $nm = $_POST['nm'];
     $gd = $_POST['gd'];
	  $id = $_POST['id'];
	
      $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO text(name,theme,text,iduser) VALUES ('$image','$nm','$gd','$id')";  
      if(mysqli_query($mysqli, $query)) {  
      echo '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong></strong> Post added
            </div>';}  
	  else {  
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong></strong>Could not add post
             </div>';
			} 
 
	   
	  
 }
else {
	echo '<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong></strong>Fill in all the fields
	</div>'; }	 
 }  
 ?>  
     <div class="panel panel-primary">
       <div class="panel-body">
        
 <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
					   <div class="form-group">
                      <input type="text" class="form-control" name="nm" id="nm"  placeholder="Theme" required />
                      </div>
      <div class="form-group">
      <textarea rows="12"  input type="text" class="form-control" id="gd" name="gd" placeholder="Text" required /></textarea>
      </div>
      <input type="hidden" value="<?php echo $_SESSION['myses'] ?>" name="id"/>
                     <input type="submit" name="bts" id="bts" value="Add Post" class="btn btn-info" />  
                </form>  
           </div>
</div>
</div> 
</div>
  </div>
<?php
include "footer.php";
?>
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 