<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Genre</title>
	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>


	<style media="screen">
	body{
	background: url('https://comms.worldreader.org/wp-content/uploads/2014/09/authors-thin1.jpg') no-repeat center center fixed;

	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
	</style>

	<script type="text/javascript">
		 <!--
				// Form validation code will come here.
				function validateForm()
				{

					 if( document.forms["searchgenre"]["GenreName"].value == "" )
					 {
							alert( "Please provide genre name !" );
							return false;
					 }
				}
		 //-->
	</script>


</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">



<div><h1 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Search for Genres</h1></div>

<form name="searchgenre" action="<?php echo base_url(); ?>library/search_genre_by_name" method="post" onsubmit="return validateForm()" >
 <p style="color: #fff; font-size: 18pt;" class=" btn-block  mt-2">Search:</p> <input type="text" name="GenreName" placeholder="Genre name">
 <input type="submit" value="Search" class="btn btn-info btn-sm ">
</form><br>



<?php
 if(isset($genre))
 {
	 if(count($genre) == 0)
	 {
		 echo '<div style="color: #fff; font-size: 18pt;">No results found.</div>';
	 }
	 else {
	 	echo '<div><h1>Search result</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
    <div class="divTableHead">Genre Name</div>
    <div class="divTableHead">Delete </div>

	  </div>
	  </div>
	  <div class="divTableBody">';


	  			foreach ($genre as $genres) {

	  				echo '<div class="divTableRow" style="color: #000000; background-color:#DEDEA2;">';
						echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;">'.$genres->GenreName.'</div>';
						echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/delete_genre/'.$genres->GenreID.'">delete</a></div>';

	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }

	}
 ?>
 <a href="<?php echo base_url();?>library/showallgenres" /><br><input type="button" value=" Back To All Genres >>" class="btn btn-success  mt-2" /></a>

 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>"  class="btn btn-success  mt-2" /></a>
 <a href="<?php echo base_url();?>library/logout" /><br><input type="button" value="Logout"  class="btn btn-danger  mt-2" /></a>

</div>
</div>
</div>
</body>
</html>
