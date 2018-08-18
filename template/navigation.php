<?php
$search = array (" ", "/", "[", "]", "-");

foreach ($structure as $key => $menu) {
if (array_key_exists("DIR", $menu))
	$menu = insertDirIntoNavArray($menu);

if ($menu["HIDDEN"] != "true") { ?>
<div<?php if ($key == 0) { ?> id="First"<?php } ?>><a <?php if ($uri[0] == $menu["ADDRESS"]) { ?>class="Active" <?php } if (($uri[0] != $menu["ADDRESS"]) || ($uri[1] != "")) { ?>href="<?= $dir . ($menu["ADDRESS"] == "" ? "./" : $menu["ADDRESS"]) ?>"<?php } if ($menu["MENU"]) { ?>onMouseOver="swapIn1('<?= str_replace($search, "", $menu["TITLE"]) ?>');" onMouseOut="rememberLast1('<?= str_replace($search, "", $menu["TITLE"]) ?>');"<?php } else { ?> onMouseOver="swapIn1();"<?php } ?>><?= $menu["TITLE"] ?></a><!-- <span class="Active" id="<?= str_replace($search, "", $menu["TITLE"]) ?>A"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span> --></div>
<?php if ($menu["MENU"]) { ?>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="<?= str_replace($search, "", $menu["TITLE"]) ?>">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top-<?= $background ?>.gif" alt="" width="146" height="18"></th></tr>
  <tr>
   <td>
<?php foreach ($menu["MENU"] as $submenu) {
if ($submenu["HIDDEN"] != "true") { ?>
    <div><span>- </span><a <?php if (($uri[0] == $menu["ADDRESS"]) && ($uri[1] == $submenu["ADDRESS"])) { ?>class="Active" <?php } if (($uri[0] != $menu["ADDRESS"]) || ($uri[1] != $submenu["ADDRESS"]) || ($uri[2] != "")) { ?>href="<?= $dir . $menu["ADDRESS"] . "/" . $submenu["ADDRESS"] ?>" <?php } if ($submenu["MENU"]) { ?>onMouseOver="swapIn2('<?= str_replace($search, "", $submenu["TITLE"]) ?>');" onMouseOut="rememberLast2('<?= str_replace($search, "", $submenu["TITLE"]) ?>');"<?php } else { ?> onMouseOver="swapIn2();" onMouseOut="rememberLast2();"<?php } ?>><?= $submenu["TITLE"] ?></a></div>
<?php if ($submenu["MENU"]) { ?>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="<?= str_replace($search, "", $submenu["TITLE"]) ?>">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
<?php foreach ($submenu["MENU"] as $subsubmenu) {
if ($subsubmenu["HIDDEN"] != "true") { ?>
        <div><span>-- </span><a <?php if (($uri[0] == $menu["ADDRESS"]) && ($uri[1] == $submenu["ADDRESS"]) && ($uri[2] == $subsubmenu["ADDRESS"])) { ?>class="Active" <?php } else { ?>onMouseOver="swapIn3();" onMouseOut="rememberLast3();" href="<?= $dir . $menu["ADDRESS"] . "/" . $submenu["ADDRESS"] . "/" . $subsubmenu["ADDRESS"] ?>"<?php } ?>><?= $subsubmenu["TITLE"] ?></a></div>
<?php } } ?>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
<?php } } } ?>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom-<?= $background ?>.gif" alt="" width="146" height="18"></th></tr>
 </table>
<?php } } }

// when linking from /1/2/3 to /1/2 use ".."
// when linking from /1/2/3 to /1/2/4 use "4"
// missing href = no rollover on mac

?>
