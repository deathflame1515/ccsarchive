<?php
	include('include/db.php');
if($_REQUEST["uid"]){	
	$id=$_REQUEST['uid'];
	$query= "INSERT INTO tblsearch (thesisid, logdate) VALUES('".$id."', NOW())";
	mysqli_query($conn, $query);
}			
	?>
<!-- <html>
<head>
<script>
	function move(){
		window.history.go(-1);
	}
</script>
</head>
<body onload="move()">
</body>
</html> -->