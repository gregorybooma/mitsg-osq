mit-quiz
========

Greg is adding multiplayer to this quiz game for MIT!

It is made up of a LAMP app and a Node.js app

## Setup LAMP app

### Create Database

Create a database and dump `osm_multichoice.sql` into it.

    echo "create database <dbname>;" | ./mysql -hlocalhost -uroot -p
    mysql -hlocalhost -uroot -p < osm_multichoice.sql

Then make sure the database name / credentials are correct in `sp.php`.

Near the start of the file you choose which DB setup function to call:

    connectToDB_Local();

This can be any of `connectToDB_Local`, `connectToDB_Scripts`, or `connectToDB_SG`. Each function has its own host, username, password, and database name.

### Configure

Check over the options in `config.php`

### Run

I have been developing with [MAMP](http://www.mamp.info/). You just need to set MAMP's Apache Document Root to the `lamp-app` folder. Then navigate to `http://localhost:8888/` (or whatever port you have MAMP configured to use).

## Setup Node.js app

### Install dependencies

In `node-app`, create node_modules directory if needed, then:

    npm install

### Configure

Check over the options in `config.js`

### Run

In `node-app` run:

    node app