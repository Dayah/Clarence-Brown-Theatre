// Michael Dayah
// mdayah@utk.edu
// (865) 974-4987

// Turn off CSS in IE 4

if (!document.layers && !document.getElementById) { document.styleSheets[0].disabled = true; }

// Control menu rollover

var holdId1 = 0;
var lastIn1 = 0;
var holdId2 = 0;
var lastIn2 = 0;

function howHigh(id) {
	switch (id) {
		case "About":			return -20; //305
		case "Academics":		return 0;
			case "TheatreDesign":	return 15;
			case "PerformanceMFA":	return 35;
		case "BoxOffice":		return 20;
			case "Tickets":			return 15;
		case "Community":		return 40;
		case "International":	return 95;
		case "LORT":			return 125;
		case "Performance":		return 25;
			case "Season2001":		return 15;
			case "Season2002":		return 35;
		case "Support":		return 80;
	}
}

function swapIn1(byid) {
	if (!holdId1) {
		if (document.getElementById) {
			if (lastIn1) {
				document.getElementById(lastIn1).style.visibility = "hidden";
				document.getElementById(lastIn1 + "A").style.visibility = "hidden";
			}
			if (lastIn2) document.getElementById(lastIn2).style.visibility = "hidden";
			if (byid) {
				document.getElementById(byid).style.visibility = "visible";
				document.getElementById(byid + "A").style.visibility = "visible";
				document.getElementById(byid).style.top = howHigh(byid);
			}
/*		} else if (document.layers) {
			if (lastIn1) document.layers[lastIn1].visibility = "hide";
			if (lastIn2) document.layers[lastIn2].visibility = "hide";
			document.layers[byid].visibility = "show";
			document.layers[byid].top = howHigh(byid);
*/		}
	}
}
function swapIn2(byid) {
	if (!holdId2) {
		if (document.getElementById) {
			if (lastIn2) document.getElementById(lastIn2).style.visibility = "hidden";
			if (byid) {
				document.getElementById(byid).style.visibility = "visible";
				document.getElementById(byid).style.top = howHigh(byid);
			}
/*		} else if (document.layers) {
			if (lastIn2) document.layers[lastIn2].visibility = "hide";
			document.layers[byid].visibility = "show";
			document.layers[byid].top = howHigh(byid);
*/		}
	}
}

function rememberLast1(byid) { lastIn1 = byid; }
function rememberLast2(byid) { lastIn2 = byid; }

/*
function hold1(byid) {
	if (document.getElementById) {
		if (holdId1) document.getElementById(holdId1).style.visibility = "hidden";
		if (holdId2) document.getElementById(holdId2).style.visibility = "hidden";
		document.getElementById(byid).style.visibility = "visible";
		document.getElementById(byid).style.top = howHigh(byid);
	} else if (document.layers) {
		if (holdId1) document.layers[holdId1].visibility = "hide";
		if (holdId2) document.layers[holdId2].visibility = "hide";
		document.layers[byid].visibility = "show";
	}
	holdId1 = byid;
}
function hold2(byid) {
	if (document.getElementById) {
		if (holdId2) document.getElementById(holdId2).style.visibility = "hidden";
		document.getElementById(byid).style.visibility = "visible";
		document.getElementById(byid).style.top = howHigh(byid);
	} else if (document.layers) {
		if (holdId2) document.layers[holdId2].visibility = "hide";
		document.layers[byid].visibility = "show";
	}
	holdId2 = byid;
}
*/