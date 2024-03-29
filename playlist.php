<html>
 <head>
  <title>Virtual Campfire Selector</title>
<script>

var playlists = [];
var all = [

<?php 
// Install with: sudo apt-get install php-getid3
// or use  getid3/getID3-1.9.12/getid3/
require_once('getid3/getID3-1.9.12/getid3/getid3.php'); 

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

$id = -1;
foreach($files as $filename) {
  $ThisFileInfo = $getID3->analyze($filename); 
  $id = $id + 1;

  $filetime = filemtime($filename);
  $file_mb  = round((filesize($filename) / 1048576), 2);
  $title = str_replace(".mp3", "", $filename ); 
  $title = str_replace("_", " ", $title );  
  $title=str_replace("-", " ", $title );  
  print   '{id:'.$id.
          ',url:"'.rawurlencode($filename).'"'.
          ',title:"'.$title.'"'.
          ',playtime:"'. $ThisFileInfo['playtime_string'].'"'.
          ',size: "'.$file_mb.'Mb"},' . "\n";
}

?>
];

function init() {
  var selector = document.getElementById('selector');
  var tableHtml = "<table id='songlist' class='sortable'>\n";
  for (var i = 0; i < all.length; i++) {
    tableHtml =  tableHtml + songLine(all[i]);
  }
  tableHtml += "</table>\n";
  selector.innerHTML = tableHtml;
}


function songLine(song) { 
  return "<tr class='song'>\n" +
"  <td class='songname'>\n" +
"    <a onclick=\"choose('" + song.url + "')\"\n" +
"       title='Playing time " + song.playtime + "'\n" + 
"    >\n"  +
"    <img src='playbutton.png' alt='" + song.title + "'>\n" + 
     song.title +
"    </a>\n" +
"  </td>\n" + 
"  <td class='download'>\n" +
"    <a href='" + song.url + "' title='Download " + song.size + " mp3'>\n" + 
"      <img src='downloadButton.png' alt='Download raw mp3'>\n" +
"    </a>\n" +
"  </td>\n" +
"</tr>\n" ;
}

</script>
<script type="text/javascript" src="tools.js"></script>
<link href="song_styles.css" rel="stylesheet" type="text/css" />
</head>
<body onload="init()">

<a href="https://github.com/timp/virtualcampfire"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png"></a>

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
<div id='selector'>
  Javascript required.
</div>
<p>
This page was originally put together by <a href="http://leomurray.co.uk">Leo Murray</a> and Jack Freedman. 
</p>
<p>
<a href="http://oolong.co.uk">Fergus</a> took over the development of it in September 2009.
</p>
<p>
<a href="http://tim.pizey.uk/">Tim</a> updated the site in July 2014, November 2017.
</p>
</div>
</body>
</html>
