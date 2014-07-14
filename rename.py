import os

for filename in os.listdir("."):
   old_name = filename
   new_name = filename
   new_name = new_name.replace('-', ' ')
   new_name = new_name.replace('_', ' ')
   new_name = new_name.title()
   new_name = new_name.replace(' ', '_')

   if not new_name == old_name:
     old_name = old_name.replace(' ', '\ ')
     old_name = old_name.replace('(', '\(')
     old_name = old_name.replace(')', '\)')
     new_name = new_name.replace('(', '\(')
     new_name = new_name.replace(')', '\)')
     new_name = new_name.replace('.Mp3', '.mp3')
     old_name = old_name.replace('.Mp3', '.mp3')
     if '.mp3' in old_name:
       print("git mv {} {}".format(old_name, new_name))
