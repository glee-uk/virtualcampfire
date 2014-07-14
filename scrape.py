from BeautifulSoup import BeautifulSoup
import urllib2
 
url  = "http://www.virtualcampfire.co.uk"
page = urllib2.urlopen(url)
soup = BeautifulSoup(page.read())
 
print "#!/bin/bash"

for anchor in soup.findAll('a'):
  href = anchor.get('href', '/')
  if ".mp3" in href:
    k = href.rfind("/")
    filename = href[k+1:]
    href = href.replace("./", "")
    href = href.replace(" ", "%20")
    href = href.replace("(", "%28")
    href = href.replace(")", "%29")
    href = href.replace("'", "%2C")
    print("#{}".format(filename))
    print("if [ ! -f \"{}\" ]".format(filename))
    print(" then")
    print("  wget {}/{}".format(url, href))
    print("fi")
