<?php
	include "config.php"

?>

<?php
	include "header.php"

?>


<main>
					<img class="people" src="img/people.jpg">
					<div class="firstsection">

						<h1>GALLERY</h1>
						<h4><a href=SQLInjection.php>Upload images here!</a></h3>
						<?php
							

							//Following code has been borrowed from "https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them", 27-09-2017 11.04
							//But also changed to fit my code, so it's not exactly the copied code.

							$dirname = "uploadedfiles";
							$images = scandir($dirname);

							//Following line has to be here, otherwise two weird images appears..?
							$ignore = Array(".", "..",".DS_Store");

							echo "<div class='imagegrid'>";

							foreach($images as $curimg){
								if(!in_array($curimg, $ignore)) {
									
									echo "<img class='imagesInGrid' src='uploadedfiles/$curimg' />\n";
									
								};
							}

							echo "</div>";


						?>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Philosophi autem in suis lectulis plerumque moriuntur. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Sit enim idem caecus, debilis.
						</p>
						<p>
							An nisi populari fama? Duarum enim vitarum nobis erunt instituta capienda. Nihilo beatiorem esse Metellum quam Regulum. Ut aliquid scire se gaudeant? Idemne potest esse dies saepius, qui semel fuit? Materiam vero rerum et copiam apud hos exilem, apud illos uberrimam reperiemus.
						</p>

<?php
	include "footer.php"
	
?>