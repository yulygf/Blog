<?php
session_start();
 
if(!isset($_SESSION['mysesi']) || $_SESSION['mytype']!='writer'){
	echo "<script>window.location.assign('index.php')</script>";
}
?>


<?php
include "config.php";
if(isset($_GET['d'])):
     $stmt = $mysqli->prepare("DELETE FROM text WHERE ids=?");
     $stmt->bind_param('s', $id);
 
     $id = $_GET['d'];
 
     if($stmt->execute()):
          echo "<script>location.href='main.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
