<?php
include "script/xmlfunctions.php";
$news = GetXMLTree("xml/news.xml");
$images = GetXMLTree("xml/images.xml");
$structure = GetXMLTree("xml/structure.xml");

foreach ($news as $item)
	if ($item["SHOW"] == "true")
		$news_count++;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
  <title>Clarence Brown Theatre</title>
  <script type="text/javascript">var menuTopOffset = 315;</script>
  <script src="script/swapmenu.js.php" type="text/javascript"></script>
  <link href="style/navigation.css" rel="stylesheet" type="text/css" media="screen">
  <link href="style/mainpage.css" rel="stylesheet" type="text/css" media="screen">
  <meta name="ICBM" content="35.95321,-83.93065">
 </head>
 <body marginwidth="0" marginheight="0">
  <table border="0" cellspacing="0" cellpadding="0" width="600">
   <tr valign="top">
    <td rowspan="<?= 7 + $news_count ?>">
     <?= Image("Main", "border='0'") ?>
     <table width="523">
      <tr valign="top">
       <td width="120" class="Navigation">
<?php
$background = "black";
include "template/navigation.php";
?>
       </td>
       <td valign="top">
        <hr>
        <div><?= Image("Now Playing", "hspace='20' vspace='5'") ?></div>
        <?= LinkTo("2002season.xml", Image("Current Play", "border='0' align='right' hspace='10'")) ?>
        <div class="PlayTitle">Midwives</div>
        <div class="PlayByline">by Dana Yeaton</div>
       <div class="PlayByline">
									based on the best-selling novel, <i>Midwives</i>, by Chris Bohjalian</div>
        <div class="PlayDate">Feb. 28 - March 15</div>
        <div class="PlayDescription">An inspiring midwife in a remote New England county makes a decision and finds herself the target of a criminal investigation. She struggles to convince the jury, the medical community, her daughter and herself that her hasty decision was the right one. Based on the original novel by Chris Bohjalian, selected for Oprah's Book Club and produced as a Lifetime Channel movie.</a></div>
        <hr>
       </td>
      </tr>
     </table>
    </td>
    <td colspan="2"><?= Image("Theatre Department") ?></td>
   </tr>
   <tr>
				<td colspan="2" id="Date"><?= date("F j, Y") ?></td>
			</tr>
   <tr>
				<td colspan="2" valign="bottom"><?= Image("What's New") ?></td>
			</tr>
<?php foreach ($news as $item) {
if ($item["SHOW"] == "true") { ?>
   <tr valign="top">
    <th class="News"><?= Image("Bullet", "hspace='5' vspace='6'") ?></th>
				<td class="News">
     <div><?= $item["TITLE"] ?></div>
     <?= $item["TEXT"] ?>
    </td>
			</tr>
<?php } } ?>
<!--   <tr><th colspan="2" class="News">&nbsp;</th></tr> -->
   <tr>
				<td colspan="2" valign="top"><?= Image("News Bottom") ?></td>
			</tr>
   <tr>
				<td colspan="2" valign="middle"><a href="http://www.utk.edu/"><?= Image("UT Logo", "border='0' align='left' vspace='24'") ?></a><?= Image("CBT Logo", "align='right'") ?></td>
			</tr>
   <tr>
				<td colspan="2"><?= LinkTo("onstage.xml", Image("On Stage", "border='0'")) ?></td>
			</tr>
   <tr>
				<td colspan="2">&nbsp;</td>
			</tr>
  </table>
 </body>
</html>
