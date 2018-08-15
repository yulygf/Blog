
<?php


include "config.php";
include "header.php";
?>
<div class="container">
<div class="panel-header clearfix"> 
<div class="col-sm-8">
	
</div>
	  
</div> 

<div class="row">
<div class="col-sm-6 col-sm-offset-2 col-md-8 col-md-offset-1 main">

		      <div class="row placeholders">
	

<?php

if(isset($_GET['u'])):
    
     $res = $mysqli->query("SELECT text.*,user.nameuser  FROM text,user WHERE text.iduser=user.iduser AND ids=".$_GET['u']  );
     $row = $res->fetch_assoc();
?> 
<div class="row">
	 <br> <br><a href="index.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Back</a>
	</div>
	<br> <br>
<div class="panel panel-default">

  <div class="panel-heading">
  
    <h3 class="panel-title"><center>  <font align="left" size=5 color="07522c"><?php echo $row['theme'] ?> </font>  </center> </h3>
  </div>
  <div class="panel-body">
  <input type="hidden" value="<?php echo $row['ids'] ?>" name="id"/>
  <td>  <h3> <?php echo '<img  align="left" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="180" width="180" class="img-thumnail" /> '?> </h3></td>
  
  <?php echo $row['text'] ?>
  	<hr size=3px width=500px align="left">
 <h4><?php echo $row['data'] ?> by <?php echo $row['nameuser'] ?> </h4>
  </div>
</div>     
                 </div>
  </div>
  </div>
 
<?php
endif;
include "footer.php";
?>
 