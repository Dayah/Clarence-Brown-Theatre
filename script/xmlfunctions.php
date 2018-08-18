<?php
// Michael Dayah
// mdayah@utk.edu
// (865) 974-4987

function GetChildren($vals, &$i) {
	$unique_keys = array ("DATE", "INTRO");
	$children = array ();

	if ($vals[$i]["attributes"])
		foreach ($vals[$i]["attributes"] as $key => $attribs)
			$children[$key] = $attribs;

	while (++$i < count($vals)) {
		switch ($vals[$i]["type"]) {
			case "complete":
				if ($vals[$i]["value"] || array_search($vals[$i]["tag"], $unique_keys) !== FALSE)
					$children[$vals[$i]["tag"]] = $vals[$i]["value"];
				if ($vals[$i]["attributes"]) {
					if (array_search($vals[$i]["tag"], $unique_keys) !== FALSE)
						$children[$vals[$i]["tag"]] = $vals[$i]["attributes"];
					else
						array_push($children, $vals[$i]["attributes"]);
				}
				break;

			case "open":
				if ($vals[$i]["tag"] == "MENU")
					$children[$vals[$i]["tag"]] = GetChildren($vals, $i);
				else
					array_push($children, GetChildren($vals, $i));
				break;

			case "close":
				return $children;
		}
	}
}

function GetXMLTree($file) {
	$data = implode("", file($file));
	$p = xml_parser_create();
	xml_parser_set_option($p, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($p, $data, $vals, $index);
	xml_parser_free($p);

	$i = 0;
	return GetChildren($vals, $i);
}

function GetXMLType($file) {
	$data = implode("", file($file));
	$p = xml_parser_create();
	xml_parser_set_option($p, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($p, $data, $vals, $index);
	xml_parser_free($p);
	return $vals[0]["tag"];
}

function FindItem($menus, $uri, $type) {
	foreach ($menus as $menu) {
		if ($uri[0] == $menu["ADDRESS"])
			if ($type == "array") $return = $menu;
			else $return = array ($menu[$type]);

		if ($menu["MENU"]) foreach ($menu["MENU"] as $submenu) {
			if (($uri[0] == $menu["ADDRESS"]) && ($uri[1] == $submenu["ADDRESS"]))
				if ($type == "array") $return = $submenu;
				else $return = array ($menu[$type], $submenu[$type]);

			if ($submenu["MENU"]) foreach ($submenu["MENU"] as $subsubmenu)
				if (($uri[0] == $menu["ADDRESS"]) && ($uri[1] == $submenu["ADDRESS"]) && ($uri[2] == $subsubmenu["ADDRESS"]))
					if ($type == "array") $return = $subsubmenu;
					else $return = array ($menu[$type], $submenu[$type], $subsubmenu[$type]);
		}
	}
	return $return;
}

function LinkTo($file, $text) {
	global $structure, $dir;

	foreach ($structure as $menu)
		if ($file == $menu["CONTENT"])
			$result = $menu["ADDRESS"];
		else
			if ($menu["MENU"]) foreach ($menu["MENU"] as $submenu)
				if ($file == $submenu["CONTENT"])
					$result = $menu["ADDRESS"] . "/" . $submenu["ADDRESS"];
				else
					if ($submenu["MENU"]) foreach ($submenu["MENU"] as $subsubmenu)
						if ($file == $subsubmenu["CONTENT"])
							$result = $menu["ADDRESS"] . "/" . $submenu["ADDRESS"] . "/" . $subsubmenu["ADDRESS"];

	return "<a href=\"" . $dir . $result . "/\">" . $text . "</a>";
}

function GetDirArray($sPath) {
	$handle = opendir($sPath);
	while ($file = readdir($handle)) {
		if ($file != "." && $file != "..") {
			if (is_dir($sPath . "/" . $file)) $retVal[$file] = GetDirArray($sPath . "/" . $file);
			else $retVal[] = $file;
		}
	}
	closedir($handle);
	return $retVal;
}

function insertDirIntoNavArray($menu) {
	$temp_menu = GetDirArray("../content/" . $menu["DIR"]);
	$x = 0;
	foreach ($temp_menu as $temp_key => $nothing) {
		$menu["MENU"][$x]["TITLE"] = $menu["MENU"][$x]["ADDRESS"] = $temp_key;
		$temp_submenu = GetDirArray("../content/" . $menu["DIR"] . "/" . $temp_key);
		$y = 0;
		foreach ($temp_submenu as $nothing => $temp_subkey) {
			$menu["MENU"][$x]["MENU"][$y]["TITLE"] = $menu["MENU"][$x]["MENU"][$y++]["ADDRESS"] = basename($temp_subkey, ".html");
		}
		$x++;
	}

	return $menu;
}

// fix this function later so it can index the array on name instead of looping through
function Image($name, $attribs = "", $just_src = FALSE) {
	global $images, $dir;

	foreach ($images as $item) {
		if ($name == $item["NAME"]) {
			$image_size = getimagesize(($dir ? "../" : "") . "content/images/" . $item["SRC"]);
			if ($just_src == TRUE)
				return array ($dir . "content/images/" . $item["SRC"], $image_size);
			else
				return "<img src=\"" . $dir . "content/images/" . $item["SRC"] . "\" alt=\"" . $item["ALT"] . "\" " . $image_size[3] . " " . $attribs . ">";
		}
	}
}

function distance($one, $two) {
	return levenshtein(metaphone($one), $two);
}

?>
