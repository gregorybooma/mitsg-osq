mit-quiz
========

Greg is adding multiplayer to this quiz game for MIT!

It is made up of a LAMP app and a Node.js app

## Setup LAMP app

### Create Database

If you are using MAMP and mysql is not in your path, you can run this command:

    sudo ln -s /Applications/MAMP/Library/bin/mysql /usr/local/bin/mysql

Create a database and dump `osm_multichoice.sql` into it.

    echo "create database <dbname>;" | mysql -hlocalhost -uroot -p
    mysql -hlocalhost -uroot -p <dbname> < osm_multichoice.sql

Then make sure the database name / credentials are correct in `sp.php`.

Near the start of the file you choose which DB setup function to call:

    connectToDB_Local();

This can be any of `connectToDB_Local`, `connectToDB_Scripts`, or `connectToDB_SG`. Each function has its own host, username, password, and database name.

This function name must also be the same in `questionsJson.php`.

### Configure

Check over the options in `config.php`

Hosts set to `localhost` are only suitable for local testing.

### Run

I have been developing with [MAMP](http://www.mamp.info/). You just need to set MAMP's Apache Document Root to the `lamp-app` folder. Then navigate to `http://localhost:8888/` (or whatever port you have MAMP configured to use).

## Setup Node.js app

### Install dependencies

In `node-app`, create `node_modules` directory if needed, then:

    npm install

### Configure

Check over the options in `config.js`

Hosts set to `localhost` are only suitable for local testing.

### Run

In `node-app` run:

    node app

The server is running while this command is running. You can use a utility like [forever](https://github.com/nodejitsu/forever) to manage node applications more robustly.