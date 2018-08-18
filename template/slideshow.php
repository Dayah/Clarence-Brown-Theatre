<?php
$slideshow = GetXMLTree("../content/" . $current_array["CONTENT"]);
$current_image = $uri[sizeof($uri) - 1];

$search = array ("DIRECTOR", "SCENE", "LIGHTING", "COSTUME", "CONDUCTOR", "CHOREOGRAPHER", "PHOTOGRAPHER", "SOUND", "ORIGINAL", "DESCRIPTION");
$replace = array ("<br>Directed by", "Scene Design by", "Lighting Design by", "Costume Design by", "Conducted by", "Choreography by", "Photo by", "Sound Design by", "Original Design by");

if (is_numeric($current_image)) {
/*	if ($current_image != 1) { ?>
	<a href="1">|&lt;&lt;</a>
	<?php } else { ?>
	|&lt;&lt;
	<?php }
*/
	if (array_key_exists($current_image - 2, $slideshow)) { ?>
	<a href="<?= $current_image - 1 ?>">&larr;</a>
	<?php } else { ?>
	&larr;
	<?php } ?>

	<a href="./">Index</a>

	<?php if (array_key_exists($current_image, $slideshow)) { ?>
	<a href="<?= $current_image + 1 ?>">&rarr;</a>
	<?php } else { ?>
	&rarr;
	<?php }
/*
	if ($current_image != sizeof($slideshow)) { ?>
	<a href="<?= sizeof($slideshow) ?>">&gt;&gt;|</a>
	<?php } else { ?>
	&gt;&gt;|
	<?php }
*/
	foreach ($slideshow as $key => $item) {
		if ($key + 1 == $current_image) {
			$image_size = getimagesize("../content/images/" . $current_array["IMAGEDIR"] . "/" . $item["SRC"]); ?>
			<p><img src="<?= $dir . "content/images/" . $current_array["IMAGEDIR"] . "/" . $item["SRC"] ?>" <?= $image_size[3] ?> border="1" alt=""></p>
		<?php	unset ($item["SRC"]);
			foreach ($item as $by => $attrib) { ?>
			<div><?= str_replace($search, $replace, $by) . " " . $attrib ?></div>
			<?php }
		}
	}
} else { ?>
	<h2><a href="<?= (($uri[sizeof($uri) - 1] == "") ? "" : $current_array["ADDRESS"] . "/") . 1 ?>">Start</a></h2>
	<ol>
<?php	foreach ($slideshow as $key => $item) {
			if ($item["DESCRIPTION"]) { ?>
		<li><a href="<?= (($uri[sizeof($uri) - 1] == "") ? "" : $current_array["ADDRESS"] . "/") . ($key + 1) ?>"><?= $item["DESCRIPTION"] ?></a></li>
<?php	}	}?>
	</ol>
<?php } ?>
