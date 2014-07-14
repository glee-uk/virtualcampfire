<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="song_styles.css" rel="stylesheet" type="text/css" />


<title>Virtual Campfire</title>
<script src="sorttable.js"></script>

<script>

function choose(elementName) { 
  if (typeof window.currentAudioElement === 'undefined') { 
  } else {
    window.currentAudioElement.pause();
    window.currentAudioElement.currentTime = 0;   
  }
  window.currentAudioElement = document.getElementById(elementName);
  window.currentAudioElement.play();
}

</script>


</head>
<body>

<div id="logo" style='float:left; '>
<p style='height:260px'></p>
<ul class="para">
<li>Click on song titles to play them</li>
<li>Click on headings to sort the list</li>
<li>Email <a href="mailto:fergus@virtualcampfire.co.uk">Fergus</a> to contribute songs or feedback</li>
</ul>
</div>
<h1 align='center'>Virtual Campfire</h1>

<table id="songlist" class="sortable">
<tr><th>Song</th><th class="download">mp3</th><th class="filesize">Size (MB)</th></tr>
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
	print 
'<tr class="song">
  <td>
   <div class="song">
    <audio id="'.urlencode($title).'" loop>
     <source src="'.rawurlencode($filename).'" type="audio/mpeg">
     <a href="'.rawurlencode($filename).'">'.$title.'</a>
    </audio>

    <a onclick="choose(\''.urlencode($title).'\')">'.$title.'</a>
   </div>
  </td>
  <td class="download">
     <a href="'.$filename.'" title="On some systems you\'ll need to right-click the \'Download\' link and choose \'Save as\' or similar, to stop it just playing the song in your browser.">Download</a>
  </td>
  <td class="filesize">'.$file_mb.'</td>
</tr>
';
}
?>
</table>
<p class="para">
This page was originally put together by <a href="http://leomurray.co.uk">Leo Murray</a> and Jack Freedman. <a href="http://oolong.co.uk">Fergus</a> just took over the development of it in September 2009.
</p>

<p class="para">
The table-sorting code is thanks to <a href="http://www.kryogenix.org/code/browser/sorttable/">Stuart Langridge</a>.
</p>

</body>
</html>
