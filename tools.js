function debug(str) { 
    // alert(str);
  }
  var currentTimeVar = 0;
  function choose(url) { 
    window.currentAudioElement = document.getElementById('player');
    if (typeof window.currentAudioElement === 'undefined') { 
      alert('your browser does not like audio.');
    } else {
      debug('paused:' + window.currentAudioElement.paused 
         +'\nsrc:' + window.currentAudioElement.src
         +'\ntime:' + window.currentAudioElement.currentTime
      );
      if (window.currentAudioElement.paused) { 
        if(window.currentAudioElement.src.endsWith(url)) {
          window.currentAudioElement.currentTime = currentTimeVar;      
          debug('window.currentAudioElement.currentTime:' + window.currentAudioElement.currentTime);
        } else {
           debug('Setting url from :' + window.currentAudioElement.src + ' to:' + url);
           window.currentAudioElement.src = url;
        }
        window.currentAudioElement.play();
      } else { 
        debug('Not Paused **\n' + 'paused:' + window.currentAudioElement.paused 
           +'\nsrc:' + window.currentAudioElement.src
           +'\ntime:' + window.currentAudioElement.currentTime
           );
  
        if(window.currentAudioElement.src.endsWith(url)) {
          currentTimeVar = window.currentAudioElement.currentTime;
          debug('window.currentAudioElement.currentTime:' + window.currentAudioElement.currentTime);
          window.currentAudioElement.pause();
        } else {
           debug('Setting url from :' + window.currentAudioElement.src + ' to:' + url);
           window.currentAudioElement.src = url;
           window.currentAudioElement.play();
        }
  
      }
  
    }
  
    var lUrl = lyricsUrl(url);
    var urlExists = false;
    var request = new XMLHttpRequest();  
    // Open a synchronous request so that urlExists is set
    request.open('GET', lUrl, false);
    request.onreadystatechange = function(){
      if (request.readyState === 4){
        if (request.status !== 404) {
          urlExists = true;
        }
      }
    };
    request.send();
    if (urlExists) {         
     window.open(lUrl, 'lyrics');
    }
  }
  
  function lyricsUrl(url) { 
    var plain = new RegExp("^mp3/([^\(]+)\.mp3$");
    var m = plain.exec(decodeURI(url));
    if (m != null) { 
     return "lyrics/" + m[1] + ".html";
    } else { 
     var withBrackets = new RegExp(/^([^\(]+?)_\(([^\)]+)\)/);
     var wb = withBrackets.exec(decodeURI(url));
     if (wb != null) { 
       return wb[1] + ".html";
     } else { 
       alert(url);
       return "foo.txt";
     }
    }
  
  } 
  