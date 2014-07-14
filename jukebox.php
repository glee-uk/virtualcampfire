<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="song_styles.css" rel="stylesheet" type="text/css" />


<title>Virtual Campfire</title>
<script type="text/JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=400,left = 440,top = 250');");
}

</script>
<script src="sorttable.js"></script>
</head>
<body>
<?php
if(isset($_GET['vid']))
{
	$show = $_GET['vid'];
}else{
$show = "flagident.swf";
}
?>

<!--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="800" height="150" title="virt">
  <param name="movie" value="../jukbo_banner.swf" />
  <param name="quality" value="high" />
  <embed src="../jukbo_banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="150"></embed>
</object>-->
<a href="/" id="logo">Virtual Campfire</a>
<div style="width:800px;" align="center">
<!--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="520" height="350">
  <param name="movie" value="jukebox.swf" />
  <param name="quality" value="high" />
  <embed src="jukebox.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="520" height="350"></embed>
</object>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1" height="1">
  <param name="movie" value="musicer.swf?imageFilename=<?php echo $show; ?>" />
  <param name="quality" value="high" />
  <embed src="musicer.swf?imageFilename=<?php echo $show; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1" height="1"></embed>
</object>-->


<object type="application/x-shockwave-flash" data="player_mp3_maxi.swf" id="player" width="200" height="20" style="position:fixed; left:20px; top:180px;">
    <param name="movie" value="player_mp3_maxi.swf" />
    <param name="bgcolor" value="#004000" />
    <param name="FlashVars" value="mp3=Woad.mp3&amp;bgcolor1=004000&amp;showvolume=1&amp;showstop=1" />
</object>
<script>
<!--
document.getElementById('player').SetVariable('player:mp3', unescape(self.document.location.hash.substring(1))+'.mp3');
-->
</script>
</div>
<p>
</p>
<ul class="para">
<li>Click on song titles to play them</li>
<li>Click on headings to sort the list</li>
<li>Email <a href="mailto:fergus@virtualcampfire.co.uk">Fergus</a> to contribute songs or feedback</li>
<li><a href="javascript:popUp('http://www.virtualcampfire.co.uk/mp3_songs/player.html')">Launch Stand Alone Player to put together a playlist</a></li>

</ul>
<table id="songlist" class="sortable">
<tr><th>Song</th><th class="download">mp3</th><th class="date">Date</th><th class="filesize">Size (MB)</th></tr>
<?php	
	$handle = opendir(".");

while ($filename = readdir($handle)) {
	if (preg_match("/mp3$/", $filename) )
	{
		$files[] = $filename;
	}
}

natcasesort($files);

foreach($files as $filename) {
    $filetime=filemtime($filename);
    $file_mb = round((filesize($filename) / 1048576), 2);
	$title=str_replace(".mp3", "", $filename );	
	$title=str_replace("_", " ", $title );	
	$title=str_replace("-", " ", $title );	
	print '<tr class="song"><td class="songname">
		<a name="'.urlencode($title).'" href="#'.urlencode($title).'" onClick="document.getElementById(\'player\').SetVariable(\'player:jsUrl\', 
			\''.rawurlencode($filename).'\'); document.getElementById(\'player\').SetVariable(\'player:jsPlay\', \'\')">'.$title.'</a> 
	</td>
	<td class="download">
		<a href="'.$filename.'" title="On some systems you\'ll need to right-click the \'Download\' link and choose \'Save as\' or similar, to stop it just playing the song in your browser.">Download</a>
	</td>
	<td class="date">'.date("Y-m-j", $filetime).'</td>
	<td class="filesize">'.$file_mb.'</td>
	</tr>
';
}
?>
</table>
<p class="para">
This page was originally put together by <a href="http://leomurray.co.uk">Leo Murray</a> and Jack Freedman. <a href="http://oolong.co.uk">Fergus</a> just took over the development of it in September 2009.
The mp3 player is thanks to <a href="http://flash-mp3-player.net/">neolao</a>. The table-sorting code is thanks to <a href="http://www.kryogenix.org/code/browser/sorttable/">Stuart Langridge</a>.


<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=5229283; 
var sc_invisible=1; 
var sc_partition=59; 
var sc_click_stat=1; 
var sc_security="29bf3e04"; 
</script>

<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script><noscript><div
class="statcounter"><a title="counter to iweb"
href="http://www.statcounter.com/iweb/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/5229283/0/29bf3e04/1/"
alt="counter to iweb" ></a></div></noscript>
<!-- End of StatCounter Code -->
</body>
</html>
