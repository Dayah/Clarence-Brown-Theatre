<?
$base_slashes = 3;
$dir = str_repeat("../", substr_count($REQUEST_URI, "/") - $base_slashes);
?>
<div id="First"><a <?php if (stristr($REQUEST_URI, "/about/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('About');" onMouseOut="rememberLast1('About');">About CBT</a><span class="Active" id="AboutA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="About">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>Facilities</div>
    <div><span>- </span>Directions/Parking</div>
    <div><span>- </span>Staff</div>
    <div><span>- </span>Advisory Board</div>
    <div><span>- </span>History</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/academics/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('Academics');" onMouseOut="rememberLast1('Academics');">Academics</a><span class="Active" id="AcademicsA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="Academics">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>General Information</div>
    <div><span>- </span><a href="." onMouseOver="swapIn2('TheatreDesign');" onMouseOut="rememberLast2('TheatreDesign');">Theatre Design MFA</a></div>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="TheatreDesign">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
        <div><span>-- </span>General Information</div>
        <div><span>-- </span>Costume Design MFA</div>
        <div><span>-- </span>Boene Design MFA</div>
        <div><span>-- </span>Lighting Design MFA</div>
        <div><span>-- </span>How to Apply</div>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
    <div><span>- </span><a href="." onMouseOver="swapIn2('PerformanceMFA');" onMouseOut="rememberLast2('PerformanceMFA');">Performance MFA</a></div>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="PerformanceMFA">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
        <div><span>-- </span>General Information</div>
        <div><span>-- </span>How to Apply</div>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
    <div><span>- </span>Theatre BA major/minor</div>
    <div><span>- </span>Faculty</div>
    <div><span>- </span>Alumni</div>
    <div><span>- </span>Guest Artists</div>
    <div><span>- </span>Current Graduate Students</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/boxoffice/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('BoxOffice');" onMouseOut="rememberLast1('BoxOffice');">Box Office</a><span class="Active" id="BoxOfficeA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="BoxOffice">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>General Information</div>
    <div><span>- </span><a href="." onMouseOver="swapIn2('Tickets');" onMouseOut="rememberLast2('Tickets');">Tickets</a></div>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="Tickets">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
        <div><span>-- </span>Season Tickets</div>
        <div><span>-- </span>Individual Tickets</div>
        <div><span>-- </span>Group Sales</div>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
    <div><span>- </span>Opening Night Club</div>
    <div><span>- </span>Dinner Theatre</div>
    <div><span>- </span>Directions/Parking</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/community/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('Community');" onMouseOut="rememberLast1('Community');">Community/ Outreach</a><span class="Active" id="CommunityA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="Community">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>General Information</div>
    <div><span>- </span>Season for Youth</div>
    <div><span>- </span>In the Classroom</div>
    <div><span>- </span>Theatre Talk</div>
    <div><span>- </span>Volunteer Opportunities</div>
    <div><span>- </span>Backstage Tours</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/contact/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1();">Contact Us</a></div>
<div><a <?php if (stristr($REQUEST_URI, "/international/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('International');" onMouseOut="rememberLast1('International');">International Initiatives</a><span class="Active" id="InternationalA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="International">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>Guest Artists</div>
    <div><span>- </span>Avignon</div>
    <div><span>- </span>Salzburg</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/lort/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('LORT');" onMouseOut="rememberLast1('LORT');">League of Resident Theatres [LORT]</a><span class="Active" id="LORTA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="LORT">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>Company Members</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/performance/")) { ?> class="Active" <?php } ?> href="<?= $dir ?>performance/" onMouseOver="swapIn1('Performance');" onMouseOut="rememberLast1('Performance');">Performance</a><span class="Active" id="PerformanceA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="Performance">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>General Information</div>
    <div><span>- </span><a <?php if (stristr($REQUEST_URI, "/performance/2001season/")) { ?> class="Active" <?php } ?> href="<?= $dir ?>performance/2001season/" onMouseOver="swapIn2('Season2001');" onMouseOut="rememberLast2('Season2001');">2001-2002 Season</a></div>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="Season2001">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
        <div><span>-- </span>The Rainmaker</div>
        <div><span>-- </span>The Illusion</div>
        <div><span>-- </span>A Child's Christmas in Wales</div>
        <div><span>-- </span>The Crucible</div>
        <div><span>-- </span>Three Sisters</div>
        <div><span>-- </span>Oklahoma!</div>
        <div><span>-- </span>All in the Timing</div>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
    <div><span>- </span><a href="." onMouseOver="swapIn2('Season2002');" onMouseOut="rememberLast2('Season2002');">2002-2003 Season</a></div>
     <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level2" id="Season2002">
      <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level2-top.gif" alt="" width="127" height="25"></th></tr>
      <tr>
       <td>
        <div><span>-- </span>Title</div>
        <div><span>-- </span>Title</div>
        <div><span>-- </span>Title</div>
        <div><span>-- </span>Title</div>
        <div><span>-- </span>Title</div>
        <div><span>-- </span>Title</div>
       </td>
      </tr>
      <tr><th valign="top"><img src="<?= $dir ?>images/nav/level2-bottom.gif" alt="" width="127" height="18"></th></tr>
     </table>
    <div><span>- </span>Opening Night Club</div>
    <div><span>- </span>Workshps/Special Works</div>
    <div><span>- </span>All Campus Theatre</div>
    <div><span>- </span>Auditions</div>
    <div><span>- </span>Other Events</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
<div><a <?php if (stristr($REQUEST_URI, "/support/")) { ?> class="Active" <?php } ?> href="." onMouseOver="swapIn1('Support');" onMouseOut="rememberLast1('Support');">Support</a><span class="Active" id="SupportA"><img src="<?= $dir ?>images/nav/active.gif" alt="" width="9" height="11"></span></div>
 <table width="100" border="0" cellspacing="0" cellpadding="0" class="Level1" id="Support">
  <tr><th valign="bottom"><img src="<?= $dir ?>images/nav/level1-top.gif" alt="" width="146" height="23"></th></tr>
  <tr>
   <td>
    <div><span>- </span>General Information</div>
    <div><span>- </span>Make a Donation</div>
    <div><span>- </span>Opening Night Club</div>
    <div><span>- </span>Sponsors</div>
    <div><span>- </span>Playbill Advertising</div>
   </td>
  </tr>
  <tr><th valign="top"><img src="<?= $dir ?>images/nav/level1-bottom.gif" alt="" width="146" height="18"></th></tr>
 </table>
