mit-quiz
========

Greg is adding multiplayer to this quiz game for MIT!

## Setup

### Create Database

Create a database and dump `osm_multichoice.sql` into it.

> echo "create database <dbname>;" | ./mysql -hlocalhost -uroot -p
> mysql -hlocalhost -uroot -p < osm_multichoice.sql

Then make sure the database name / credentials are correct in `sp.php`.

Near the start of the file you choose which DB setup function to call:

> connectToDB_Local();

This can be any of `connectToDB_Local`, `connectToDB_Scripts`, or `connectToDB_SG`. Each function has its own host, username, password, and database name.

### Run

I have been developing with [MAMP](http://www.mamp.info/). You just need to set MAMP's Apache Document Root to the project folder. Then navigate to `http://localhost:8888/` (unless you have MAMP configured to use a different port).