
<!DOCTYPE html>
<html lang="en">
 
 <?php
include "header.php";
include "config.php";
?>
  <body>


 <div class="container"> 
 	       <div class="panel-header clearfix">
<div class="form-group">
	    <div class="col-sm-10">
	    </div>
	    <div class="col-sm-1">
		<h2><a href="login.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign in</a></h2>
	    </div>
	 
	   <div class="col-sm-1">
	   <h2><a href="reg.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign up</a></h2>
	   </div>
	   
</div>
	      </div>
	   
      <div class="col-sm-10"> 
       <div class="col-sm-1 col-md-1 sidebar">
       </div>

<div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-1 main">

		      <div class="row placeholders">
<font  size=6 >Blog</font> 

<br><br><br><br><br>
<table class="table table-striped" id="tabeldata">
<thead>   
</thead>
<tfoot>
</tfoot>
<tbody>
<?php
$res = $mysqli->query("SELECT text.*,user.nameuser FROM text, user WHERE text.iduser=user.iduser ORDER BY text.data DESC");
while ($row = $res->fetch_assoc()):
?>
     <tr>
            <td><h3> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="150" width="150" class="img-thumnail" /> '?> </h3></td>
		    <td>  <h3> <?php echo $row['theme'] ?> </h3>
		 <br> <?php  echo substr($row['text'],0,220) ?>
		 <br> <?php echo $row['data'] ?> by <?php echo $row['nameuser'] ?>     <a href="read.php?u=<?php echo $row['ids'] ?>"><span class="glyphicon glyphicon" aria-hidden="true"></span>Read More</a>
		    </td>
          
     </tr>
<?php
endwhile;
?>
</tbody>
</table>  
</form>
                     </div>
</div>

</div> 
 
<div class="col-sm-12"></div>
</div>
<?php
include "footer.php";
?>
</html> 