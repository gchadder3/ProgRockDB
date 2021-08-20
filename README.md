# ProgRockDB Repository

This is a demo project which I began around 2010 in PHP Version 4 as a part of preparation 
for some freelance work for generating a PHP and MySQL based website for a client.  In this 
project, there is a MySQL database with a single table for prog rock albums, a portal page 
(`index.html`), a PHP page for showing the database contents in `Album_ID` order (`prdb_disp1.php`), 
another PHP page for showing the contents in a more natural data ordering (`prdb_disp2.php`), and 
a PHP form page for entering new albums in the database (`prdb_addnewalbumform.php`).

## Installation on Local Apache Server

Directions to install (assuming you have an Apache server set up on a local machine):

* You'll need to have Apache, PHP, and MySQL properly installed on your local machine and 
be able to add new databases to MySQL.
* Move into the directory (`htdocs` for example) visible to your browser, and clone the repo: 
`git clone https://github.com/gchadder3/ProgRockDB.git` .
* Install the initial database by sourcing `prog_rock_db.sql` into your MySQL server.  This 
will create a new database called `prog_rock_db`.
* Edit the database connection parameters on Lines 14-16 of `prdb_funcs.php` to match 
where you put the database in MySQL.  Now you should be ready to use the database.
* Navigate in your browser to the portal site at `localhost/ProgRockDB/`.
* The portal page should appear, and you should be able to use the database, viewing it
and adding new albums.