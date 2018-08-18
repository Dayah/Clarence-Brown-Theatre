<?
$season = GetXMLTree("../content/" . $current_array["CONTENT"]);
$current_image = $uri[sizeof($uri) - 1];
$sponsor_links = array(
	"WBIR" => "http://www.wbir.com/"
	,"Comcast" => "http://www.comcast.com/"
	,"News-Sentinel" => "http://www.knoxnews.com/"
	,"NewsTalk" => "http://www.newstalk99.com/"
	,"WUOT" => "http://www.wuot.org/"
	,"B-97.5" => "http://www.b975.com/"
	,"Wild 98.7" => "http://www.wild987.net/"
	,"WIVK" => "http://www.wivk.com/"
	,"Moxley Carmichael" => "http://www.moxleycarmichael.com/"
);
?>

<p>The Clarence Brown Theatre season consists of seven productions performed in either the Clarence Brown Theatre or the Ula Love Doughty Carousel Theatre.  For every production, professionals and students work side-by-side to create an exciting performance for the entire audience.</p>

<?php foreach ($season as $key => $play) {
$calendar_size = getimagesize(Image("Calendar " . $play["IMAGE"], "", TRUE));
?>
<a name="<?= substr($current_array["MENU"][$key]["ADDRESS"], 1) ?>"></a>
<hr size="4" color="black">
<img src="<?= $dir ?>images/sub/hr.gif" alt="-" width="449" height="12" align="left">
<table border="0" cellspacing="0" cellpadding="0" align="right" class="Details">
 <tr><td><img src="<?= $dir ?>images/sub/bullet.gif" alt="&gt; " width="8" height="9" hspace="10"><a href="http://www.tickets.com/venue_info.cgi?vid=201551">Ticket&nbsp;Sales</a></td><td rowspan="3" valign="top"><img src="<?= $dir ?>images/sub/detailsbox-right.gif" alt="" width="16" height="67"></td></tr>
 <tr><td><img src="<?= $dir ?>images/sub/bullet.gif" alt="&gt; " width="8" height="9" hspace="10"><a href="<?= Image("Calendar " . $play["IMAGE"], "", TRUE) ?>" onClick="open('<?= Image("Calendar " . $play["IMAGE"], "", TRUE) ?>', 'calendar', '<?= str_replace("\"", "", str_replace(" ", ",", $calendar_size[3])) ?>,toolbar=no,status=no,scrollbars=no,menubar=no,resizable=no'); return false;">Play&nbsp;Calendar</a></td></tr>
 <tr><td><img src="<?= $dir ?>images/sub/bullet.gif" alt="&gt; " width="8" height="9" hspace="10">More&nbsp;Details</td></tr>
 <tr><td valign="top"><img src="<?= $dir ?>images/sub/detailsbox-bottom.gif" alt="" width="115" height="3"></td><td bgcolor="#FFCC33"></td></tr>
</table>
<br>
<div class="Title"><?= $play["TITLE"] ?></div>
<?php if ($play["BYLINE"]) { ?><div>by <?= $play["BYLINE"] ?></div><?php } ?>
<?php if ($play["BASED"]) { ?><div><?= $play["BASED"] ?></div><?php } ?>
<?php if ($play["DATE"]) { ?><div><?= $play["DATE"]["FROM"] ?> - <?= $play["DATE"]["TO"] ?></div><?php } ?>
<?php if ($play["IMAGE"]) { ?><?= Image($play["IMAGE"], "align='right' style='clear: right; border: thin solid rgb(153, 51, 0);' vspace='10'") ?><?php } ?>
<?php if ($play["THEATER"]) { ?><div><?= $play["THEATER"] ?></div><?php } ?>
<?php if ($play["SUBTITLE"]) { ?><div><?= $play["SUBTITLE"] ?></div><?php } ?>
<?php if ($play["DESCRIPTION"]) { ?><p><?= $play["DESCRIPTION"] ?></p><?php } ?>
<?php if ($play["SPONSORS"]) {
	$sponsors = explode(",", $play["SPONSORS"]);
	foreach ($sponsors as $sponsor)
		echo "<a href=\"" . $sponsor_links[$sponsor] . "\">" . Image("Sponsor " . $sponsor, "hspace=3 vspace=3 align=middle border=0") . "</a> ";
} ?>
<br clear="right">
<?php } ?>
