<?php
include('include/db.php');
require "./include.php"   ;

$output="";
$seachText = isset($_POST['searchBox'])?$_POST['searchBox']:"";
 

function suggestionslink ($input){
	if((trim($input))==""){return "";}

	$spellcheckObject = new PHPSpellCheck();
	// $spellcheckObject -> LicenceKey = "TRIAL";
	$spellcheckObject -> DictionaryPath = ("./dictionaries/");
	$spellcheckObject -> LoadDictionary("English (International)") ;  //OPTIONAL//
	$spellcheckObject -> LoadCustomDictionary("custom.txt");
    $suggestionText = $spellcheckObject ->didYouMean($input);

	if($suggestionText==""){return "";}
	if(isset($_POST['searchBox'])){
		
	
	return "<input type='text' name='searchBox' id='searchBox1' value='".$suggestionText."' hidden />
			Did You Mean:&nbsp<i><button type='submit' id='button'>".$suggestionText."</button></i>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>Thesis and Capstone Archive</title>
	<link rel="icon" type="image" href="img/ccs.png">
	
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	
	
    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
	<style>
	 html, body, div {
        max-width: 100%;
        overflow-x: hidden;
    }
		#button {
     background:none!important;
     color:blue;
     border:none; 
     padding:0!important;
     font: inherit; 
     cursor: pointer;
		}
		#button:hover{
			text-decoration: underline;
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
		mark {
  padding: 0;
  background: #007bff;
  color: #fff;  
}
	</style>

  </head>

  <body>
<br>
<div>
 <a href="index.php"> <img src="assets/img/logo.png" style="height:50px; width:100px;margin-left:20px; float:left;"></a>
	<h4 style="margin-top:10px;margin-left:130px;">Thesis and Capstone Archive</h4>
	</div>
<br>
 <form id="search-form" action="search.php" method="post" name="search-form">
              <div class="form-row">
                <div class="col-6" style="margin-left:30px;">
                  <input type="text" name="searchBox"  id="searchBox" value="<?php echo $seachText;?>" class="form-control form-control-lg" placeholder="Search" required>
                </div>
                <div>
                  <input type="submit" class="btn btn-block btn-lg btn-primary" value="Search">
                </div>
              </div>
							<div style="margin-bottom:10px;">
							<h5 style="color:red;margin-left:30px;margin-top:10px;padding:1px;"><?php echo suggestionslink($seachText) ;?></h5>
							</div>
            </form>
						<a href="home-advance.php" style="margin-left:30px;"><strong><u>Advance Search</u></strong></a><br>
			<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
				if(isset($_POST['searchBox'])){
				
				$searchq = $_POST['searchBox'];
				$meta_searchq = metaphone($searchq);
				$query = mysqli_query($conn, "SELECT * FROM tblthesis 
				WHERE TYear >=YEAR(NOW())-10 AND adminApproval='APPROVED' AND (
				 meta_tags LIKE '%".$meta_searchq."%' OR 
						 tcname LIKE '%".$searchq."%' OR
						 Author LIKE '%".$searchq."%' ) ORDER BY CASE
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '".$meta_searchq."%') THEN 1
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."%') THEN 2
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."') THEN 3
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '".$meta_searchq."%') THEN 4
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."%') THEN 5
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."') THEN 6
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '".$meta_searchq."%') THEN 7
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '%".$meta_searchq."%') THEN 8
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '%".$meta_searchq."') THEN 9
						 ELSE 10 END");
				$sqlfind = "SELECT * FROM tblthesis 
				WHERE TYear >=YEAR(NOW())-10 AND adminApproval='APPROVED' AND (
				 meta_tags LIKE '%".$meta_searchq."%' OR
						 tcname LIKE '%".$searchq."%' OR
						 Author LIKE '%".$searchq."%') ORDER BY CASE
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '".$meta_searchq."%') THEN 1
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."%') THEN 2
						 WHEN (tcname LIKE '".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."') THEN 3
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '".$meta_searchq."%') THEN 4
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."%') THEN 5
						 WHEN (tcname LIKE '%".$searchq."%' AND meta_tags LIKE '%".$meta_searchq."') THEN 6
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '".$meta_searchq."%') THEN 7
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '%".$meta_searchq."%') THEN 8
						 WHEN (tcname LIKE '%".$searchq."' AND meta_tags LIKE '%".$meta_searchq."') THEN 9
						 ELSE 10 END";
				$count = mysqli_num_rows($query);
				$table='';
			if($count == 0){
			$output = '<br><h4 align="center">There was no search results!</h4>';
		}else{
			$table = '<thead>
							<tr>
							<th>Call Number</th>
							<th>Title</th>
							<th>Author</th>
							<th>Tags</th>
							<th>Copyright</th>
							<th>Details</th>
							</tr>
						 </thead>';
			print("$table");
			echo'<tbody>';
		
			$result = $conn->query($sqlfind);
			while($row = $result->fetch_assoc()){
	
		 $tid=$row["tid"] ;

		 echo '<tr>';

		 echo'<td class="context">'.$row["tcno"].'</td>';
		echo'<td class="context">'.$row["tcname"].'</td>';
		echo'<td class="context">'.$row["Author"].'</td>';
		echo'<td class="context">'.$row["tags"].'</td>';
		echo'<td class="context">'.$row["TYear"].'</td>';
		
		
		
		 echo '<td>';								 						
			echo "<button id='getUser' style='border-color:#007bff;background-color:#007bff;' class='btn btn-sm btn-info'  data-toggle='modal' data-id='{$tid}' data-target='#view{$tid}'>";
		 echo '<i class="fa fa-eye">';									
		 echo '</i> View';
		 echo'</button>';							
			include('./include/advanceModal.php');
		 echo'</td>';
		 echo'</tr>';
 }
		
 echo'</tbody>';

		
	}
}

print("$output");
		
			
			?>
			
				  </table>
              </div>
            </div>
			 </body>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
	<script src="js/jquery-mark/jquery.mark.min.js"></script>
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
	$('#searchBox').keyup(function (){
    $('#searchBox1').val($(this).val()); // <-- reverse your selectors here
});
</script>
<!-- <script>
$(function() {

var mark = function() {

  // Read the keyword
  var keyword = $("input[name='searchBox']").val();

  // Determine selected options
  var options = {
  "separateWordSearch":true,
  "diacritics": false,
  };
 

  // Remove previous marked elements and mark
  // the new keyword inside the context
  $(".context").unmark({
	done: function() {
	  $(".context").mark(keyword, options);
	}
  });
};

$(document).ready(mark);


});

</script>  -->

</html>
