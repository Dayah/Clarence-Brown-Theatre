<?php
// Michael Dayah
// mdayah@utk.edu
// (865) 974-4987

require "xmlfunctions.php";
$structure = GetXMLTree("../xml/structure.xml");
$search = array (" ", "/", "[", "]", "-");
?>

var lastIn1 = 0;
var lastIn2 = 0;
var usingMenu = 0;

// Hide menus when document clicked

document.onmousedown = function() {
	if (!usingMenu) {
		if (lastIn1) document.getElementById(lastIn1).style.visibility = "hidden";
		if (lastIn2) document.getElementById(lastIn2).style.visibility = "hidden";
	}
}

// Turn off CSS in IE 4

if (!document.layers && !document.getElementById) document.styleSheets[0].disabled = true;

// Control menu rollover

function howHigh(id) {
	switch (id) {
<?php
function menuHeight($menus, $oneline, $twoline) {
	foreach ($menus as $key => $menu) {
		if ($menu["HIDDEN"] != "true") {
			if (strlen($menu["TITLE"]) > 15) $menuRunningTotal += $twoline;
			else $menuRunningTotal += $oneline;
		}
	}
	return $menuRunningTotal;
}

$menuRunningTotal = -15;
$menuOneLine = 20;
$menuTwoLine = 30;
$submenuOneLine = 18;
$submenuTwoLine = 18;

foreach ($structure as $key => $menu) {
	if (array_key_exists("DIR", $menu))
		$menu = insertDirIntoNavArray($menu);

	if ($menu["HIDDEN"] != "true") {
		if ($menu["MENU"]) {
			echo "\t\tcase \"" . str_replace($search, "", $menu["TITLE"]) . "\":\treturn " . (($menuRunningTotal + menuHeight($menu["MENU"], $submenuOneLine, $submenuTwoLine) > menuHeight($structure, $menuOneLine, $menuTwoLine)) ? menuHeight($structure, $menuOneLine, $menuTwoLine) - menuHeight($menu["MENU"], $submenuOneLine, $submenuTwoLine) - 30: $menuRunningTotal) . ";\n";
			$submenuRunningTotal = -8;
			foreach ($menu["MENU"] as $key => $submenu) {
				if ($submenu["HIDDEN"] != "true") {
					if ($submenu["MENU"]) {
						echo "\t\t\tcase \"" . str_replace($search, "", $submenu["TITLE"]) . "\":\treturn " . $submenuRunningTotal . ";\n";
						if (strlen($submenu["TITLE"]) > 23) $submenuRunningTotal += $submenuOneLine;
						else $submenuRunningTotal += $submenuTwoLine;
					}
				}
			}
		}
		if (strlen($menu["TITLE"]) > 15) $menuRunningTotal += $menuTwoLine;
		else $menuRunningTotal += $menuOneLine;
	}
}
?>
	}
}

function swapIn1(byid) {
	if (document.getElementById) {
		if (lastIn1) {
			document.getElementById(lastIn1).style.visibility = "hidden";
//			document.getElementById(lastIn1 + "A").style.visibility = "hidden";
			usingMenu = 1;
		}
		if (lastIn2) {
			document.getElementById(lastIn2).style.visibility = "hidden";
			usingMenu = 1;
		}
		if (byid) {
			document.getElementById(byid).style.visibility = "visible";
//			document.getElementById(byid + "A").style.visibility = "visible";
			document.getElementById(byid).style.top = howHigh(byid) + menuTopOffset;
		}
	}
}

function swapIn2(byid) {
	if (document.getElementById) {
		if (lastIn2) {
			document.getElementById(lastIn2).style.visibility = "hidden";
		}
		if (byid) {
			document.getElementById(byid).style.visibility = "visible";
			document.getElementById(byid).style.top = howHigh(byid);
		}
		usingMenu = 1;
	}
}

function swapIn3(byid) {
	usingMenu = 1;
}

function rememberLast1(byid) { lastIn1 = byid; usingMenu = 0; }
function rememberLast2(byid) { lastIn2 = byid; usingMenu = 0; }
function rememberLast3(byid) { usingMenu = 0; }
