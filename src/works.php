<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport">
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="works-style.css">
	<title>Works</title>
</head>
<body>

	<?php include"navigation.php" ?>

	<div id="wrapper"  class="">
			<div class="container">
				<div class="row">
					<h1 id="projects-header" class="col-lg-9 "> Projects and Work </h1>
				</div>

				<div class ="row">
					<div class="col-lg-9">
						<h2> Kymi Design & Business </h2>
						<p> This was my first internship position in web development with real website 
					   projects for two clients, Kymiring and Luoteis-Venäjä Rahasto Oy.
					In these projects, I learned how to build a website from ground up using HTML and 
					 CSS and how to use Wordpress to create a custom theme from start to finish.
					   The internship was also an excellent learning experience for customer 
					     interaction and teamwork.
						</p>

						<p>Languages used: HTML, CSS, PHP</p>
						<p>Tools: Wordpress, jQuery </p>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-9">
						<h2> Camera2DVD </h2>
						<p> 
                        A jointly funded project for a web application that produces automatically edited movies
                        based on principles and techniques of audiovisual production.

                        My job was to design the user interface for the website and do small-scale user testing for feedback. The project was a great learning experience on designing UI and user experience. 
						</p>

						<p>Languages used: HTML, CSS</p>
						<p>Tools: Photoshop, Illustrator, Pen and Paper</p>
					</div>
				</div> <!-- row end -->
			</div> <!-- container end -->


		<div class="container">
			<div class="row">
				<h1 class="col-lg-9"  id="projects-header"> Other Stuff </h1>
			</div>
			
			 <?php 
			 	//load the xml file containing all works/project info
				$xml=simplexml_load_file("works.xml") or die("Error: Cannot create object");

				//loop handling the creation of project elements to the site and getting data from the xml file
				foreach($xml->category as $category)
				{
					$work_type = $category->work_type;
					echo '<div class="row">';	
					echo '<div class="col-lg-8">';	
					echo '<h3 class="dashed">'.$work_type.'</h3>'; //work type header, for example 2D Art, Animation, Web dev..
					echo '</div>';
					echo '</div>';

					foreach($category as $value)
					{
						//skip the empty work items 
						if($value->title == "")
						{
							continue;
						}

						$link_ext = "";
						if($value->link != "")
						{				
							$link_ext = $value->link;							
						}

						echo '<div class="row project-item">';
						echo '<div class="col-lg-2">';

						$image_src = $value->image;


						echo '<a href='.$link_ext.'> <img src="thumbnails/'.$image_src.'" class="project-image"> </a>';
						echo '</div>';

						echo '<div class="col-lg-6">';
						$project_title = $value->title;
						echo "<h3>".$project_title."</h3>";

						$description = $value->description;

						echo "<p>".$description."</p>";
						echo "<a href='$link_ext'>$link_ext</a>";

						if($value->gitlink != "")
						{
							$github = $value->gitlink;
							echo "<p><a href='$github'>Github</a></p>";
						}
						echo '</div>';
						echo '</div>';
					}
				} 
			?> 

		</div>
	</div> <!-- wrapper end -->


	<?php include "footer.php" ?>


</body>
		<?php include"scripts.php" ?>
</html>