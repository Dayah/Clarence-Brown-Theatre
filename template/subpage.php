<?
$uri = explode("/", $_GET["uri"]);
$dir = str_repeat("../", sizeof($uri) - 1);

require "../script/xmlfunctions.php";
$structure = GetXMLTree("../xml/structure.xml");
$images = GetXMLTree("../xml/images.xml");
$current_array = FindItem($structure, $uri, "array");
$current_title = FindItem($structure, $uri, "TITLE");
$current_address = FindItem($structure, $uri, "ADDRESS");

ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
  <title>Clarence Brown Theatre - <?= (($current_title) ? implode(" - ", $current_title) : "404 - Page Not Found") ?></title>
  <script type="text/javascript">var menuTopOffset = 85;</script>
  <script src="<?= $dir ?>script/swapmenu.js.php" type="text/javascript"></script>
  <link href="<?= $dir ?>style/navigation.css" rel="stylesheet" type="text/css">
  <link href="<?= $dir ?>style/subpage.css" rel="stylesheet" type="text/css">
 </head>
 <body marginwidth="0" marginheight="0">
  <map name="UTlogo"><area alt="UT" coords="201,59,230,78" href="http://www.utk.edu/" shape="RECT"></map>
  <table border="0" cellspacing="0" cellpadding="0" width="753"><tr><td><img src="<?= $dir ?>images/sub/main.jpg" alt="" width="513" height="78"></td><td><img src="<?= $dir ?>images/sub/performance.gif" alt="Theater Department" width="230" height="78" hspace="10" border="0" usemap="#UTlogo"></td></tr></table>
  <table border="0" cellspacing="0" cellpadding="0" width="753">
   <tr valign="top">
    <td width="120" rowspan="4" class="Navigation">
<?
$background = "yellow";
include "navigation.php";
?>
    </td>
    <td width="10" rowspan="4"></td>
    <td><img src="<?= $dir ?>images/sub/top-slant.gif" alt="" width="621" height="18"></td>
   </tr>
   <tr valign="top">
    <td height="200" class="Body">
     <div class="BodyMargin">
<?
if ($current_array["CONTENT"] && file_exists("../content/" . $current_array["CONTENT"])) {
	$type = GetXMLType("../content/" . $current_array["CONTENT"]);
	$template_library = GetXMLTree("../xml/templates.xml"); ?>
	<h1><?= $current_title[sizeof($current_title) - 1] ?></h1>
<?	foreach ($template_library as $template)
		if (strtoupper($type) == strtoupper($template["NAME"])) {
			include "../template/" . $template["SRC"];
			$usingTemplate = 1;
		}
	if (!$usingTemplate)
		include "../content/" . $current_array["CONTENT"];
} elseif ($current_array["MENU"]) { ?>
	<h1><?= $current_title[sizeof($current_title) - 1] ?></h1>
	<?php include "subpage-listing.php";
} else {
	include "404.php";
} ?>
<br>
     </div>
    </td>
   </tr>
   <tr><td align="right"><img src="<?= $dir ?>images/sub/bottom-slant.gif" alt="" width="621" height="18"></td></tr>
  </table>
 </body>
</html>
<?php ob_end_flush(); ?>
