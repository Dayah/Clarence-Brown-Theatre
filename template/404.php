<?php header("HTTP/1.0 404 Not Found"); ?>
<h1>404 - Page Not Found</h1>
<p>Perhaps you were looking for one of the following, ranked by relevance:</p>
<ol>
<?
$bad_uri = metaphone(($uri[sizeof($uri) - 1] == "") ? $uri[sizeof($uri) - 2] : $uri[sizeof($uri) - 1]);

foreach ($structure as $menu) {
	$distances[$menu["ADDRESS"]] = distance($menu["ADDRESS"], $bad_uri);
	if ($menu["MENU"]) foreach ($menu["MENU"] as $submenu) {
		$distances[$menu["ADDRESS"] . "$" . $submenu["ADDRESS"]] = distance($submenu["ADDRESS"], $bad_uri);
		if ($submenu["MENU"]) foreach ($submenu["MENU"] as $subsubmenu)
			$distances[$menu["ADDRESS"] . "$" . $submenu["ADDRESS"] . "$" . $subsubmenu["ADDRESS"]] = distance($subsubmenu["ADDRESS"], $bad_uri);
	}
}

asort ($distances);
$x = 1;
foreach ($distances as $key => $item) {
	if ($x++ > 3) break; ?>
	<li value="<?= 5 - $item ?>"><a href="<?= $dir . implode("/", FindItem($structure, explode("$", $key), "ADDRESS")) ?>"><?= implode(" - ", FindItem($structure, explode("$", $key), "TITLE")) ?></a></li>
<?php } ?>
</ol>
