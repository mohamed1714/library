<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Book</title>
<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
					<style media="screen">
						body{
							background: url('https://www.rd.com/wp-content/uploads/2017/11/How-Much-Does-a-Book-Need-to-Sell-to-Be-a-Bestseller-509582812-Billion-Photos-1024x683.jpg') no-repeat center center fixed;

								-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;
								}
						</style>
			<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>


	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["addbook"]["BookTittle"].value == "" )
	         {
	            alert( "Please provide Book Tittle!" );
	            return false;
	         }

	         if( document.forms["addbook"]["NumOfPages"].value == "" )
	         {
	            alert( "Please provide number of pages!" );
	            return false;
	         }
					 if( document.forms["addbook"]["NumOfPages"].value <= 0 )
	         {
	            alert( "Please provide Number of pages greater than 0!" );
	            return false;
	         }
					 if( document.forms["addbook"]["Quantity"].value <= 0 )
					 {
							alert( "Please provide Quantity greater than 0!" );
							return false;
					 }
					 if( document.forms["addbook"]["Quantity"].value == "" )
					 {
							alert( "Please provide quantity!" );
							return false;
					 }

	      }
	   //-->
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
	<div><h1 style="font-size: 3vw; text-align: center; color: #fff" class="m-3">Edit Book || <?php echo $items->BookTittle?> ||</h1>	</div>
	<form name="addbook" action="<?php echo base_url(); ?>index.php/library/updatebook" onsubmit="return validateForm()" method="post">

	<p style="color: #fff; font-size: 16pt"> Book Title:</p>  <input type="text" name="BookTittle" pattern="[A-Za-z\s]{1,15}" title="no numbers allowed" value="<?php echo $items->BookTittle ?>" placeholder="Book title" class=" btn-block  mt-2"><br><br>
	<p style="color: #fff; font-size: 16pt"> Number Of Pages:</p> <input type="text" name="NumOfPages" pattern="[0-9]+" title="no letters allowed" value="<?php echo $items->NumOfPages ?>" placeholder="Number of pages" class=" btn-block  mt-2"><br><br>
	 <p style="color: #fff; font-size: 16pt">Publishing Date:</p> <input type="date" name="PublishingDate" value="<?php echo $items->PublishingDate ?>" ><br><br>
	 <p style="color: #fff; font-size: 16pt">Quantity:<p> <input type="text" name="Quantity" pattern="[0-9]+" title="no letters allowed" value="<?php echo $items->Quantity ?>" placeholder="Number of books" class=" btn-block  mt-2"><br>
	 <p style="color: #fff; font-size: 16pt">Best Of Collection:</p>
	 <div>
	  <input type="radio" name="BestOfCollection" value"Best"><p1 style="color: #fff; font-size: 12pt">Best</p1><br>
		<input type="radio" name="BestOfCollection" value="no"><p1 style="color: #fff; font-size: 12pt">normal</p1><br><br>
</div>

<div style="color: #E1E18E;">
	<?php
echo "Authors<br>";
  foreach ($authorslist as $author)
 		 {
 			 $isthere = 0;
 			 foreach($bookauthor as $selected)
 			 {
 				 if($author->AuthorID == $selected->AuthorID)
 				 {
 					 $isthere = 1;
 					 break;
 				 }
 			 }
 			 if($isthere == 1)
 			 {
 				 echo '<input checked type="checkbox" name="libauthors[]" value="'.$author->AuthorID.'"> '.$author->AuthorName.'<br>';
 			 }
 			 else
 			 {
 				 echo '<input type="checkbox" name="libauthors[]" value="'.$author->AuthorID.'"> '.$author->AuthorName.'<br>';
 			 }
 		 }
echo "<br><br>";
   echo "Type<br>";

		 foreach ($typeslist as $type)
	  		 {
	  			 $isthere = 0;
	  			 foreach($books_has_type as $selected)
	  			 {
	  				 if($type->TypeID == $selected->TypeID)
	  				 {
	  					 $isthere = 1;
	  					 break;
	  				 }
	  			 }
	  			 if($isthere == 1)
	  			 {
	  				 echo '<input checked type="checkbox" name="type[]" value="'.$type->TypeID.'"> '.$type->NameOfType.'<br>';
	  			 }
	  			 else
	  			 {
	  				 echo '<input type="checkbox" name="type[]" value="'.$type->TypeID.'"> '.$type->NameOfType.'<br>';
	  			 }
	  		 }
echo "<br><br>";

				 echo "Genre<br>";

					foreach ($genrelist as $genre)
							{
								$isthere = 0;
								foreach($genre_has_books as $selected)
								{
									if($genre->GenreID == $selected->GenreID)
									{
										$isthere = 1;
										break;
									}
								}
								if($isthere == 1)
								{
									echo '<input checked type="checkbox" name="genre[]" value="'.$genre->GenreID.'"> '.$genre->GenreName.'<br>';
								}
								else
								{
									echo '<input type="checkbox" name="genre[]" value="'.$genre->GenreID.'"> '.$genre->GenreName.'<br>';
								}
							}
		  echo' <input type="hidden" name="BookID" value="'.$items->BookID.'">
			<input type="reset" value="Reset" class="btn btn-btn	 mt-2">

			<input type="submit" value="Submit"class="btn btn-primary btn-block mt-4 col-md-8 offset-md-2"/>
		  </form>';



	?>
	<br> <br>
</div>
	<a href="<?php echo base_url();?>library/mainpage" /><input type="button" value=" Back To mainpage >>" class="btn btn-success btn-block mt-4 col-md-6 offset-md-3" /></a>

	<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" class="btn btn-danger btn-block mt-2 mt-2 col-md-4 offset-md-4" /></a>
	<br><br><br><br><br>
	<br>
	<br>


</div>
</div>
</div>



</body>
</html>
