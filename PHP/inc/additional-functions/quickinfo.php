<?php
function quickinfo()
{
  global $db,$sql_prefix;

  $qrys = db("SELECT * FROM ".$sql_prefix."quickinfo WHERE status = '1' ORDER BY RAND()");
        $get = _fetch($qrys);

	if($get['more']!="") {
	$more='<a href="'.$get['more'].'">'._quickinfo_more.'</a>';
	} else { $more = '';}

    $quickinfo = show("menu/quickinfo", array("title" => $get['title'],
                                               "content"    => bbcode($get['content']),
											   "more"    => $more));
 
  return empty($quickinfo) ? '' : '<table class="navContent" cellspacing="0">'.$quickinfo.'</table>';
}
?>
