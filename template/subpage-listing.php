<dl>
<?php foreach ($current_array["MENU"] as $menu) {
if ($menu["HIDDEN"] != "true") { ?>
 <dt><a href="<?= (($uri[sizeof($uri) - 1] == "") ? "" : $current_array["ADDRESS"] . "/") . $menu["ADDRESS"] ?>"><?= $menu["TITLE"] ?></a></dt>
<?php if ($menu["MENU"]) foreach ($menu["MENU"] as $submenu) {
if ($submenu["HIDDEN"] != "true") { ?>
 <dd><a href="<?= (($uri[sizeof($uri) - 1] == "") ? "" : $current_array["ADDRESS"] . "/") . $menu["ADDRESS"] . "/" . $submenu["ADDRESS"] ?>"><?= $submenu["TITLE"] ?></a></dd>
<?php } } } } ?>
</dl>
