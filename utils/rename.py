import os

for filename in os.listdir("."):
   old_name = filename
   new_name = filename
   new_name = new_name.replace('-', ' ')
   new_name = new_name.replace('_', ' ')
   old_name = old_name.replace('_', ' ')
   new_name = new_name.title()
   old_name = old_name.replace("'","\\'")
   new_name = new_name.replace("'","\\'")
   new_name = new_name.replace("'T", "'t")
   new_name = new_name.replace("'S", "'s")
   old_name = old_name.replace('(', '\(')
   new_name = new_name.replace('(', '\(')
   old_name = old_name.replace(')', '\)')
   new_name = new_name.replace(')', '\)')
   new_name = new_name.replace('.Mp3', '.mp3')

#   print("#  {} {}".format(old_name, new_name))
   if not (new_name == old_name):
     new_name = new_name.replace(' ', '_')
     old_name = old_name.replace(' ', '_')
     if '.mp3' in old_name:
       print("mv {} {}".format(old_name, new_name))
