virtualcampfire
===============

Copied from http://virtualcampfire.co.uk before it disappeared. 

Current Site [State diagram](https://dreampuf.github.io/GraphvizOnline/?engine=dot#digraph%20VC%20%7B%20%0D%0A%20%20%20%20graph%20%5B%20fontname%3DArial%2C%20fontcolor%3Dblue%2C%20fontsize%3D18%20%5D%3B%0D%0A%0D%0A%20%20%20%20labelloc%3D%22t%22%3B%20%0D%0A%20%20%20%20label%3D%22VC%20Player%20States%22%3B%20%0D%0A%20%20%20%20node%20%5B%20fontname%3DArial%2C%20fontcolor%3Dblue%2C%20fontsize%3D12%20%5D%3B%0D%0A%0D%0Aedge%5Bfontname%3DArial%2C%20fontcolor%3Dblue%2C%20fontsize%3D10%2C%20arrowhead%3Doarrow%5D%3B%0D%0A%0D%0A%0D%0Aunselected%20%5Blabel%3D%22Unselected%22%5D%3B%0D%0Aselected%20%5Bcolor%3Dblue%20label%3D%22Selected%22%5D%0D%0Aselected_highlighted%20%5B%20color%3Dorange%20label%3D%22Selected%20Highlighted%22%5D%3B%0D%0Aplayer_loaded%20%5Bcolor%3Dblue%20label%3D%22Player%20loaded%22%5D%0D%0Aplayer_paused%20%5Bcolor%3Dblue%20label%3D%22Player%20paused%22%5D%0D%0Aplayer_playing%20%5Bcolor%3Dblue%20label%3D%22Player%20playing%22%5D%0D%0A%0D%0A%0D%0Aunselected%20-%3E%20selected%20%5Blabel%3D%22Playlist%20Load%22%5D%0D%0Aunselected%20-%3E%20selected%20%5Blabel%3D%22Checkbox%20click%22%20color%3Dgreen%5D%0D%0Aunselected%20-%3E%20selected%20%5Blabel%3D%22Select%20all%22%5D%0D%0Aselected%20-%3E%20unselected%20%5Blabel%3D%22Select%20all%22%5D%0D%0Aselected%20-%3E%20selected_highlighted%20%5Blabel%3D%22Load%20song%22%5D%0D%0Aselected%20-%3E%20selected_highlighted%20%5Blabel%3D%22Song%20end%22%5D%0D%0Aselected%20-%3E%20selected_highlighted%20%5Blabel%3D%22Checkbox%20click%22%20color%3Dgreen%5D%0D%0Aselected_highlighted%20-%3E%20player_loaded%20%5Blabel%3D%22Load%20song%22%5D%0D%0Aselected_highlighted%20-%3E%20player_loaded%20%5Blabel%3D%22Song%20end%22%5D%0D%0Aselected_highlighted%20-%3E%20player_loaded%20%5Blabel%3D%22Checkbox%20click%22%20color%3Dgreen%5D%0D%0Aplayer_loaded%20-%3E%20player_paused%20%5Blabel%3D%22Load%20song%22%5D%0D%0Aplayer_loaded%20-%3E%20player_playing%20%5Blabel%3D%22Song%20end%22%5D%0D%0Aplayer_loaded%20-%3E%20player_playing%20%5Blabel%3D%22Checkbox%20click%22%20color%3Dgreen%5D%0D%0Aplayer_paused%20-%3E%20player_playing%20%5Blabel%3D%22Click%20play%22%5D%0D%0Aplayer_playing%20-%3E%20player_paused%20%5Blabel%3D%22Click%20pause%22%5D%0D%0Aplayer_playing%20-%3E%20selected%20%5Blabel%3D%22Song%20end%22%5D%0D%0A%0D%0A%0D%0A%7D)


# Notes
- The site is hosted on github pages.
- SVG icons came from https://uxwing.com/

# Local development
To generate a list page run:
```
python jinja_site.py index.txt
```
Then open index.html file in a browser.

To generate a song page run:
```
python jinja_site.py Worried_Man.html
```
Then open Worried_Man.html file in a browser.

To generate all song pages run:
```
python jinja_site.py lyrics/
```

# Updating the site
Any change pushed to the branch gh-pages will be reflected on the site.
This is done by a Github action that runs the script `site_jinja.py` 
and commits the changes to the gh-pages branch.


# Lyric format 
The lyrics are html files with a strict format, stored in the `lyrics` directory.
The expected html tags are: 
- title
- h1
- pre
- i is used to indicate chorus

# Naming convention

The naming convention is 
```
mp3/<Song Title>_(<Song Version>).mp3
```
This is parsed to get the lyric file name. 
```
lyrics/<Song Title>.html
```
All versions of a song have only one lyrics file. 
This maybe a weakness.


# Song Data
Apart from the song file name and some meta data in the mp3 files themselves we have a Google sheet 
This can be downloaded using this url
https://docs.google.com/spreadsheets/d/1Beh2H4Hxyz5OTgBWB4afx0h_gpxcHu785-k6Gbtc0lI/gviz/tq?tqx=out:csv&sheet=Songs
and saved as songs.csv


# Song  Ingestion Process

1. Ideally you know when and where recorded
2. Download from email/whatsapp using the naming convention (regardless of mp3/mp4)
3. If mp4 convert to mp3 at https://www.freeconvert.com/mp3-to-mp4/
4. Copy and existing lyric to lyrics/<Song Title>.html
5. Update lyrics/<Song Title>.html with the lyrics from a PDF of the songbook or from the web
6. git add mp3/<Song Title>.mp3 lyrics/<Song Title>.html
7. python validate.py
8. Copy output to the right place in songs.csv
9. python make_songbooks_from_songs.py
10. git commit -m "Added <Song Title>"
11. git pull origin gh-pages
12. git push origin gh-pages
13. tag incoming email with fsc/vc24

# To Do
- Create song book content files for each song book
- ~~Add lyrics for every song~~
- ~~Regenerate lyrics files giving all recordings of that song~~
- Add MP3 tags to all MP3 files
- Export to bandcamp
- Export to funkwhale
- Export to Spotify
