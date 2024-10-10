# Use the songs.csv file to generate the songbook_2017.txt file



import csv
import os

rows = {}
with open('songs.csv', newline='') as csvfile:
    with open("Songbook_2017.txt", 'w') as output:
        reader = csv.DictReader(csvfile)
        for row in reader:
            if row['2017 Songbook'] == "Y" and row['VC Choice'] == "Y":
                output.write(row['FileName'] + "\n")
                print(row['FileName'])

