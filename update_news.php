<?php
$newsfile = "xml/news.xml";
include "script/xmlfunctions.php";
$news = GetXMLTree($newsfile);
$fields = array ("title", "text", "show");

function no_magic_quotes_gpc(&$var) {
	if (is_string($var))
		$var = stripslashes($var);
	elseif (is_array($var))
		foreach($var as $key => $value)
			no_magic_quotes_gpc ($var[$key]);
	elseif (is_object($var))
		foreach(get_object_vars($var) as $key => $value)
			no_magic_quotes_gpc($var->$key);
}

if (get_magic_quotes_gpc())
	no_magic_quotes_gpc($_POST);

if (!$_POST) {
	echo $newsfile . " last modified on " . date("F j, Y,", filemtime($newsfile)) . " has been imported. \"Save\" writes to news. Navigate away at any time before clicking \"Save\" to cancel changes.";

	foreach ($news as $key => $item)
		foreach ($fields as $attribute)
			$_POST[$attribute][$key + 1] = $item[strtoupper($attribute)];
}

$items = ($_POST["items"] ? $_POST["items"] + ($_POST["add"] ? 1 : 0) - ($_POST["sub"] ? 1 : 0) : sizeof($news));

if ($_POST["up"] || $_POST["down"]) {
	$shift = ($_POST["up"] ? -1 : 1);
	$temp["keys"] = array_keys(($_POST["up"] ? $_POST["up"] : $_POST["down"]));
	foreach ($fields as $attribute)
		$temp[$attribute] = $_POST[$attribute][$temp["keys"][0] + $shift];
	foreach ($fields as $attribute)
		$_POST[$attribute][$temp["keys"][0] + $shift] = $_POST[$attribute][$temp["keys"][0]];
	foreach ($fields as $attribute)
		$_POST[$attribute][$temp["keys"][0]] = $temp[$attribute];
}

if ($_POST["del"]) {
	$temp["keys"] = array_keys($_POST["del"]);
	for ($x = $temp["keys"][0]; $x < $items; $x++) {
		foreach ($fields as $attribute)
			$_POST[$attribute][$temp["keys"][0]] = $_POST[$attribute][$temp["keys"][0] + 1];
	}
	$items--;
}

if ($_POST["submit"] == "Save") {
	$fp = fopen($newsfile, "w");
	fwrite($fp, "<?xml version=\"1.0\"?>\n");
	fwrite($fp, "<news>\n");
	for ($x = 1; $x <= $items; $x++) {
		fwrite($fp, "\t<item show=\"" . ($_POST["show"][$x] ? "true" : "false") . "\">\n");
		fwrite($fp, "\t\t<title>" . htmlspecialchars($_POST["title"][$x]) . "</title>\n");
		fwrite($fp, "\t\t<text>" . htmlspecialchars($_POST["text"][$x]) . "</text>\n");
		fwrite($fp, "\t</item>\n");
	}
	fwrite($fp, "</news>\n");
	fclose($fp);

	echo "Write successful. News saved. <a href=\"/\">Continue to the front page</a>.";
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
  <title>Update News for Clarence Brown Theatre</title>
 </head>
 <body>

<form action="<?= $HTTP_SERVER_VARS['PHP_SELF'] ?>" method="post">
<?php for ($x = 1; $x <= $items; $x++) { ?>
 <fieldset>
  <legend>News Item <?= $x ?> <?php if ($x > 1) { ?><input type="submit" name="up[<?= $x ?>]" value=" &uarr; "><?php } ?> <?php if ($x < $items) { ?><input type="submit" name="down[<?= $x ?>]" value=" &darr; "><?php } ?> <?php if ($items > 1) { ?><input type="submit" name="del[<?= $x ?>]" value=" X "><?php } ?></legend>
  <div><input type="checkbox" name="show[<?= $x ?>]" id="show<?= $x ?>" value="true" <?= ($_POST["show"][$x] == "true" ? "checked" : "") ?>> <label for="show<?= $x ?>">Show</label></div>
  <div><label for="title<?= $x ?>">Title:</label> <input type="text" name="title[<?= $x ?>]" id="title<?= $x ?>" value="<?= htmlentities($_POST["title"][$x]) ?>" size="25"></div>
  <div><textarea cols="60" rows="" name="text[<?= $x ?>]" id="text<?= $x ?>"><?= htmlentities($_POST["text"][$x]) ?></textarea></div>
 </fieldset>
<?php } ?>
<input type="hidden" name="items" value="<?= $items ?>">
<p>
<input type="submit" name="add" value=" + "> <?php if ($items > 1) { ?><input type="submit" name="sub" value=" - "><?php } ?>

<input type="submit" name="submit" value="Save">
</p>
</form>
 </body>
</html>
