<?php
include('./include/db.php');
if(isset($_POST['back'])){
	header('location:index.php');
}
if(isset($_POST['search'])){
$asc = $_POST['advanceSearch'];
$course = $_POST['course'];
$major= $_POST['major'];
$myear= $_POST['myear'];
$xcondition='';


If ($asc ==1){
	if ($course == 0 and $major == 0 and $myear == 0 ){
		$asc= " where adminApproval='APPROVED' AND TYear >=((YEAR(CURRENT_DATE()))-10) GROUP BY  tblthesis.tid ORDER BY countx desc";
	}
	else{
		$asc= "and adminApproval='APPROVED' and TYear >=((YEAR(CURRENT_DATE()))-10) GROUP BY  tblthesis.tid ORDER BY countx desc";
	}
}


else If ($asc == 2){

if ($course == 0 and $major == 0 and $myear == 0 ){
		$asc= "where adminApproval='APPROVED' AND TYear >=((YEAR(CURRENT_DATE())) -10) GROUP BY  tblthesis.tid ORDER BY countx asc";
	}
	else{
		$asc= " and adminApproval='APPROVED' AND  TYear >=((YEAR(CURRENT_DATE())) -10) GROUP BY  tblthesis.tid ORDER BY countx asc";
	}	
	
}


else If ($asc ==3){
	if ($course==0 and $major ==0 and $myear ==0 ){
	$asc = " where adminApproval='APPROVED' AND  TYear >=((YEAR(CURRENT_DATE()))-10) AND MONTH(logdate) = MONTH(CURRENT_DATE()) AND YEAR(logdate) = YEAR(CURRENT_DATE()) GROUP BY  tblthesis.tid ORDER BY countx desc";
	}
	else{
		$asc = "  and adminApproval='APPROVED' AND TYear >=((YEAR(CURRENT_DATE()))-10) AND MONTH(logdate) = MONTH(CURRENT_DATE()) AND YEAR(logdate) = YEAR(CURRENT_DATE()) GROUP BY  tblthesis.tid ORDER BY countx desc";
	}
}


else If ($asc ==4){
		if ($course==0 and $major ==0 and $myear ==0 ){
	$asc = " where  adminApproval='APPROVED' AND  TYear >=((YEAR(CURRENT_DATE()))-10) AND MONTH(logdate) = MONTH(CURRENT_DATE()) AND YEAR(logdate) = YEAR(CURRENT_DATE()) GROUP BY  tblthesis.tid ORDER BY countx asc";
	}
	else{
		$asc = "  and adminApproval='APPROVED' AND TYear >=((YEAR(CURRENT_DATE()))-10) AND MONTH(logdate) = MONTH(CURRENT_DATE()) AND YEAR(logdate) = YEAR(CURRENT_DATE()) GROUP BY  tblthesis.tid ORDER BY countx asc";
	}
	
	
}

 if (($course==0) && ($major==0) &&  ($myear == 0)){
					$xcondition="";
					
				}else if (($course != 0) && ($major == 0) &&  ($myear == 0)){
					$xcondition="where Course=".$course." ";
					
				}
				else if (($course!=0) && ($major!=0) &&  ($myear == 0)){
					$xcondition="where Course=".$course." and Major = ".$major.' ';
					
				}
				else if (($course!=0) && ($major==0) &&  ($myear != 0)){
					$xcondition="where Tyear=".$myear." and Course = ".$course. " ";
					
				}
				else if (($course!=0) && ($major!=0) &&  ($myear != 0)){
					$xcondition="where Tyear=".$myear. " and Major = ".$major ." and Course=".$course." ";
					
					}
				else if (($course == 0) && ($major!=0) &&  ($myear == 0)){
					$xcondition="where Major= ".$major .' ';
					
				}
				else if (($course == 0) && ($major != 0) &&  ($myear != 0)){
					$xcondition="where Tyear=".$myear." and Major = ".$major  .' ';
					
				}
				else if (($course == 0) && ($major == 0 ) &&  ($myear != 0)){
					$xcondition="where Tyear=".$myear . ' ';
				}
		
}	 
					
					
			
if(!isset($_POST['search'])) {		
	$sqlfind ="SELECT count(tblsearch.thesisid) as countx ,tblthesis.*,tblmajor.*,tblcourse.* FROM((tblthesis 
					 LEFT JOIN tblsearch ON tblthesis.tid= tblsearch.thesisid)
					 LEFT JOIN tblmajor ON tblthesis.Major= tblmajor.mid)
					 LEFT JOIN tblcourse ON tblthesis.Course= tblcourse.cid  
					 where adminApproval='APPROVED' AND  TYear >=((YEAR(CURRENT_DATE())) -10)  GROUP BY  tblthesis.tid ORDER BY countx desc LIMIT 5";
}
else{
	 $sql ="SELECT count(tblsearch.thesisid) as countx ,tblthesis.*,tblmajor.*,tblcourse.* FROM((tblthesis 
					 LEFT JOIN tblsearch ON tblthesis.tid= tblsearch.thesisid)
					 LEFT JOIN tblmajor ON tblthesis.Major= tblmajor.mid)
					 LEFT JOIN tblcourse ON tblthesis.Course= tblcourse.cid ";
					 
					$sql =  $sql.' '.$xcondition;
					  $sqlfind =$sql.''.$asc;
}			
		
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Thesis and Capstone Archive</title>
		<link rel="icon" type="image" href="img/ccs.png">
			
		<script src="ajax/js/jquery.min.js"></script>
		<script src="ajax/js/bootstrap.min.js"></script>
		<link href="ajax/js/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		 <script src="assets/js/jquery.js"></script>
		<style>
			select{
				padding:5px;
				border-radius:5px;
			}
			select:hover{
				border-color:#595959;
			}
			#int-button{
				background-color:#007bff;
				border-color:#007bff;
				padding:8px;
				font-size:15px;
			}
			#int-button:hover{
				background-color: #0069d9;
   				 border-color: #0062cc;
			}
			#disable{
			cursor: not-allowed;
			background-color: #eee;
			opacity: 1;
			-webkit-touch-callout: none; /* iOS Safari */
			-webkit-user-select: none;   /* Chrome/Safari/Opera */
			-khtml-user-select: none;    /* Konqueror */
			-moz-user-select: none;      /* Firefox */
			-ms-user-select: none;       /* Internet Explorer/Edge*/
			user-select: none;          /* Non-prefixed version, currently 
                                  not supported by any browser */
		}
			</style>
	</head>
	<body>
	<div oncontextmenu="return false" onkeydown="if ((arguments[0] || window.event).ctrlKey) return false">
		<div class="container">
			<br/>
			<br/>
			<br/>
			<a href="index.php"><center><img src="assets/img/logo.png" style="height:100px; width:175px;"></center></a>
			<h2 align="center">Thesis and Capstone Archive</h2><br />
			<FORM method="POST" action="">
		
			
			
			<div class="form-group">
				
				<select name="advanceSearch">
			
					<option value="1">Most Search</option>
					<option value="2">Least Search</option>
					<option value="3">Most Search of the Month</option>
					<option value="4">Least Search of the Month</option>
					</select>&emsp;
				
				Course:&nbsp; <select  name="course" id="course">
					<option id="course"value="0">-----</option>
					<?php
							  $sql = "SELECT * FROM tblcourse";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
										$mid=$row["cid"] ;									
										$mname=$row["cname"];								
							echo'<option value="'.$mid.'">'.$mname.'</option>';							  
								}}
							  ?>
							 
				
					</select>&emsp;
				Major:&nbsp; <select name="major" id="major">
					<option id="major" value="0">-----</option>
					<?php
							  $sql = "SELECT * FROM tblmajor";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
										$mid=$row["mid"] ;									
										$mname=$row["mname"];								
							echo'<option value="'.$mid.'">'.$mname.'</option>';							  
								}}
							  ?>
			
				
				</select>&emsp;
				Copyright:&nbsp; <select name="myear">
					<option value="0">----</option>				
					<?php
							  $sql = "SELECT distinct(TYear) as TYear FROM tblthesis where TYear >=(YEAR(CURDATE())-10) and adminApproval='APPROVED' ORDER BY TYear ASC";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {								   
										while($row = $result->fetch_assoc()) {
										$tyear=$row["TYear"] ;																
							echo'<option value="'.$tyear.'">'.$tyear.'</option>';							  
								}}
							  ?>
					
				
				</select>
				
			</div>
			<div class="form-group" >
			<input type="submit" name ="search" value="Browse" id="int-button" class='btn btn-sm btn-info'>
			<input type="submit" name ="back" value="Back" id="int-button" class='btn btn-sm btn-info'>
			</div>
			
		</FORM>
	
                      <div class="form-panel">
                          <table class="table table-striped table-advance table-hover">
					
                              <thead>
                              <tr>
                                  <th>Call Number</th>
                                  <th>Title</th>
                                  <th>Course</th>
								  <th>Major</th>
								  <th>Copyright</th>
								  <th>Views</th>
								  <th>Details</th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  
							
								$result = $conn->query($sqlfind);
								if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
										
										$tid=$row["tid"] ;

									 echo '<tr>';
						
									 echo'<td>'.$row["tcno"].'</td>';
									echo'<td>'.$row["tcname"].'</td>';
									echo'<td>'.$row["ccode"].'</td>';
									echo'<td>'.$row["mcode"].'</td>';
									echo'<td>'.$row["TYear"].'</td>';
									echo'<td>'.$row["countx"].'</td>';
									
									 echo '<td>';								 						
									  echo "<button class='btn btn-sm btn-info' id='getUser' style='border-color:#007bff;background-color:#007bff;' data-toggle='modal' data-target='#view{$tid}' data-id='{$tid}'>";
									 echo '<i class="fa fa-eye">';									
									 echo '</i> View ';
									 echo'</button>';							
									  include('./include/advanceModal.php');
									 echo'</td>';
									 echo'</tr>';
									
									 
							 }
									 echo '</table>';
									 
							}
							
							
						
						

									 
							  ?>
					<div id="hello"></div>		  
							  
						
                     
              </div>	
				  
	</div>
	</body>
	<!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
	<script type="text/javascript">
	$(document).on('click', '#getUser', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$.post(
			"advance.php",
			{uid:uid}
			);
	});
	</script>
	<script>
	$('table').dataTable({searching: false,
	"ordering": false
	});
	</script>
	<script>
	$(function() {
		$("#course").change(function() {
			if ($(this).val() == "75") {
					$("#major option[value='41']").attr("disabled","disabled");
					$("#major option[value='42']").attr("disabled","disabled");
					$("#major option[value='43']").attr("disabled","disabled");
					$("#major option[value='44']").attr("disabled","disabled");
                }
                else if ($(this).val() == "76") {
                    $("#major option[value='41']").attr("disabled","disabled");
					$("#major option[value='42']").attr("disabled","disabled");
					$("#major option[value='43']").attr("disabled","disabled");
					$("#major option[value='44']").attr("disabled",false);
				}else if ($(this).val() == "74") {
					$("#major option[value='44']").attr("disabled","disabled");
					$("#major option[value='41']").attr("disabled",false);
					$("#major option[value='42']").attr("disabled",false);
					$("#major option[value='43']").attr("disabled",false);
				}else{
					$("#major option").attr("disabled", false);
				}
            });
        });
	</script>

</html>