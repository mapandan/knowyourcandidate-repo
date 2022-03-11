<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="images/jade-dragon-logo.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- CSS Style -->
	<link rel='stylesheet' type='text/css' href='../css/__webpage-styling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__dropdown-menu.css'>
	<link rel='stylesheet' type='text/css' href='../css/__tooltip.css'>
	<link rel='stylesheet' type='text/css' href='../css/__textStyling.css'>
	<link rel='stylesheet' type='text/css' href='../css/__infoPopup.css'>
	
	<style>
	body{
	background-image: url('background/webpage-background.png');
	/*margin-left: 20px;
	margin-right: 20px;*/
	}
	footer{
	background-image: url('background/footer-background.png');
	}
	</style>

</head>

<body>
	<!-- Header-->
	<div id="header_UI">
		<!-- Codes for Navigation Bar located in ../snippets/header.html -->
	</div>	
	<br>
	
<!----------------------------------------------------------------------------------------------------------------------------------->
	<h1 class="Title">Presidential Candidates</h1>
	<br>

	<div class = "container-fluid" id="cand_selector">
		<!-- Code is at ../snippets/candidate_block.php -->
	</div>

<!------------------------data input here------------------------------------not edited yet------------------------------------------------------------------------------------->
	
	<div id="cand_content">
		<!-- Code is at ../snippets/candidates_info.html -->
	</div>
	<br><br><br>

	<script>
		<?php
			include_once '../snippets/url_id_decoder.php';
		?>
		var id= "<?= $id ?>";
		var candidate = "<?= $array_id[0] ?>";
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../js/president-scripts.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<!--<footer>
<br>
	<h2 class = "forFooter"><img src = "jade-dragon-logo.png">Jade Dragons</h2>
	<br><br><br>
</footer>-->

			<!-- <div class = "presidentials-img"> 
				<ul>
					<li> <figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_abella.png" alt="Candidate1"
							style = "width:160px; height:100px;">
						</a><figcaption class="subheadingTextSize subheadingTextHome">Ernie Abella</figcaption>
					</figure> </li> 

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_deguzman.png" alt="Candidate2"
							style = width:160px;
							height:160px;>
						</a> <figcaption class="subheadingTextSize subheadingTextHome">Leody De Guzman</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_domagoso.png" alt="Candidate3"
							style = width:160px;
							height:160px;>
						</a> <figcaption class="subheadingTextSize subheadingTextHome">Isko Moreno Domagoso</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_gonzales.png" alt="Candidate4"
							style = width:160px;
							height:100px;>
						</a> <figcaption class="subheadingTextSize subheadingTextHome">Norberto Gonzales</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_lacson.png" alt="Candidate5"
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Ping Lacson</figcaption>
					</figure></li>

				<div class="pres-row">
					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_faisal.png" alt="Candidate6" 
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Faisal Mangondato</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_marcos.png" alt="Candidate7"
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Bongbong Marcos</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_montemayor.png" alt="Candidate8"
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Jose Montemayor JR.</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_pacquiao.png" alt="Candidate9"
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Manny Pacman Pacquiao</figcaption>
					</figure></li>

					<li><figure>
						<a href="samplepage.html"> <img src = "presidentials/pres_robredo.png" alt="Candidate10"
							style = width:160px;
							height:100px;>
						</a><figcaption class="subheadingTextSize subheadingTextHome">Leni Robredo</figcaption>
					</figure></li>
				</div>
				</ul>
			</div> -->