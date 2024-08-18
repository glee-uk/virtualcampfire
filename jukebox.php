<html>
 <head>
  <title>Virtual Campfire</title>
  <script type="text/javascript" src="tools.js"></script>
  <link href="song_styles.css" rel="stylesheet" type="text/css" />

</head>
<body>

<a href="https://github.com/timp/virtualcampfire"><img decoding="async" width="149" height="149" src="https://github.blog/wp-content/uploads/2008/12/forkme_right_green_007200.png?resize=149%2C149" class="attachment-full size-full" alt="Fork me on GitHub" loading="lazy" data-recalc-dims="1"></a>


<audio 
  id="player" 
  type="audio/mpeg"
  loop >
</audio>
<div id="left" style='float:left; width:20%; textalign:left;'>
<div id="logo"></div>
<ul>
<li>Email <a href="mailto:fergus@virtualcampfire.co.uk">Fergus</a> to contribute songs or feedback</li>
<li>
Or make a <a href="https://github.com/timp/virtualccampfire">pull request</a>
</li>
</ul>
</div>
<div align='center'>
<h1>Virtual Campfire</h1>
<p>
A place for <a href="http://fsc.org.uk/">Forest School Campers</a> 
to learn and teach traditional songs online. 
</p>
<table id="songlist" class="sortable">
<?php	
// Install with: sudo apt-get install php-getid3
// or use  getid3/getID3-1.9.12/getid3/ if local
require_once('getid3/getid3.php');

// Initialize getID3 engine 
$getID3 = new getID3;


$handle = opendir(".");

while ($filename = readdir($handle)) {
	if (preg_match("/mp3$/", $filename) )
	{
		$files[] = $filename;
	}
}

natcasesort($files);
$dateStamp = date('l jS \of F Y H:i:s');

foreach($files as $filename) {
  $ThisFileInfo = $getID3->analyze($filename);

  $filetime = filemtime($filename);
  $file_mb = round((filesize($filename) / 1048576), 2);
  $title = str_replace(".mp3", "", $filename );	
  $title = str_replace("_", " ", $title );	
  $title = str_replace("-", " ", $title );
  print 
'<tr class="song">
  <td class="songname">
    <a onclick="choose(\''.rawurlencode($filename).'\')"
       title="['.$ThisFileInfo['playtime_string'].']"
    >
    <img src="playbutton.png" alt="Play '.$title.'">
     '.$title.'



    </a>
  </td>
  <td class="download">
    <a href="'.$filename.'" title="Download '.$file_mb.'Mb mp3">
      <img src="downloadButton.png" alt="Download raw mp3">
    </a>
  </td>
</tr>
';

}
?>
</table>
<p>
This page was originally put together by <a href="http://leomurray.co.uk">Leo Murray</a> and Jack Freedman. 
</p>
<p>
<a href="http://oolong.co.uk">Fergus</a> just took over the development of it in September 2009.
</p>
<p>
<a href="http://tim.pizey.uk/">Tim</a> updated the site in July 2014, November 2017, April 2024
</p>
<p>
<?php
print 'Last updated '.$dateStamp;
?>
</p>
</div>
</body>
</html>
