<?php
session_start();
 
if(!isset($_SESSION['mysesi']) || $_SESSION['mytype']!='writer'){
	echo "<script>window.location.assign('index.php')</script>";
}
?>
<?php
include "config.php";
include "header.php";
?> 
<body>
<?php
include "header.php";
?>
<div class="container">
	<div class="panel-header clearfix">
        <div class="form-group">
		<div class="col-sm-1">
			<h2><a href="login.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign in</a></h2>
	    </div>
		<div class="col-sm-1">
			<h2><a href="reg.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Sign up</a></h2>
	    </div>
		<div class="col-sm-1">
			<h2><a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon" aria-hidden="true"></span>Add post</a></h2>
	    </div>
		<div class="col-sm-7">
		
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
<font  size=6 >Blog</font> 
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
		 <td> <h3> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="180" width="180" class="img-thumnail" /> '?> </h3></td>
		 <td>  <h3> <?php echo  $row['theme'] ?> </h3>
		 <br> <?php  echo substr($row['text'],0,220) ?>
		 <br> <?php echo $row['data'] ?> by <?php echo $row['nameuser'] ?>     <a href="readwr.php?u=<?php echo $row['ids'] ?>"><span class="glyphicon glyphicon" aria-hidden="true"></span>Read More...</a>
	     <a href="update.php?u=<?php echo $row['ids'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
         <a onclick="return confirm('Do you want to delete this post?)" href="delete.php?d=<?php echo $row['ids'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
<div class="col-sm-4">
</div>

<?php
include "footer.php";
?>