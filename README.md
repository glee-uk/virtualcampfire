virtualcampfire
===============


A copy of http://virtualcampfire.co.uk. 


# Notes
- The site is hosted on github pages.
- SVG icons came from https://uxwing.com/


# Local development
Checkout, run:
```
python jinja_site.py index.txt
```
Then open index.html file in a browser.

# Updating the site
Any change pushed to the branch gh-pages will be reflected on the site.
This is done by a Github action that runs the script `site_jinja.py` and commits the changes to the gh-pages branch.


# Lyric format 
The lyrics are html files with a strict format, stored in the `lyrics` directory.

# Naming convention

The naming convention is 
```
mp3/<Song Title>_(<Song Version>).mp3
```
This is parsed to get the lyric file name. 
```
lyrics/<Song Title>.html
```
All versions of a song have only one lyrics file. This maybe  weakness.

# Song Data
Apart from the song file name and some meta data in the mp3 files themselves we have a Google sheet 
This can be downloaded using this url
https://docs.google.com/spreadsheets/d/1Beh2H4Hxyz5OTgBWB4afx0h_gpxcHu785-k6Gbtc0lI/gviz/tq?tqx=out:csv&sheet=Songs
and saved as songs.csv




# To Do
- Create song book content files for each song book
- Add lyrics for every song
