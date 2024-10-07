virtualcampfire
===============


A copy of http://virtualcampfire.co.uk. 


# Notes
- The site is hosted on github pages.
- SVG icons came from https://uxwing.com/


# Local development
Checkout, run:
```
python site_jinja.py index.txt
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

# To Do
- Create song book content files for each song book
- Add lyrics for every song
