# ProgRockDB Repository

This is a demo project which I began around 2010 in PHP Version 4 as a part of preparation 
for some freelance work for generating a PHP and MySQL based website for a client.  In this 
project, there is a MySQL database with a single table for prog rock albums, a portal page 
(`index.html`), a PHP page for showing the database contents in `Album_ID` order (`prdb_disp1.php`), 
another PHP page for showing the contents in a more natural data ordering (`prdb_disp2.php`), and 
a PHP form page for entering new albums in the database (`prdb_addnewalbumform.php`).

It has been reworked here (in 2021) to be installable either with Docker or an a local system 
that has a PHP and Apache server set up.

## Installation Using Docker

To install using Docker (without a need to have PHP, Apache, or MySQL installed on your 
machine)

* Clone the repo: `git clone https://github.com/gchadder3/ProgRockDB.git` .
* `cd ProgRockDB`
* `docker-compose up -d` to build the `progrockdb` image (if it's not already built) 
and bring it up as a container as well as installing MySQL in another container and 
networking the two containers together.  This step may take a while to finish if 
MySQL is being installed the first time, so you may want to check the MySQL logs using 
`docker logs -f progrockdb_mysql_1` to make sure the installation is complete.
* After the above step is complete, you can go to `localhost:5000` in your browser and the 
site should come up.  However, when you try to look at the database, you will get an error 
indicating the `progrockalbums` table is missing.  So we need to install the initial table 
data from `prog_rock_db.sql`.
* `docker cp prog_rock_db.sql progrockdb_mysql_1:prog_rock_db.sql` to copy the file to the Docker 
MySQL container that is running.
* `docker exec -i progrockdb_mysql_1 mysql -uroot -psecret < prog_rock_db.sql` to tell the MySQL 
container database to install the missing data.
* Everything should be ready at `localhost:5000`.
* Use `docker-compose down` when you are finished with the app to clean up the containers.
* You can just do `docker-compose up -d` in the future to bring the app up.

## Installation on Local Machine with PHP/Apache Server and MySQL

Directions to install without Docker on a local machine

* You'll need to have Apache, PHP, and MySQL properly installed on your local machine and 
be able to add new databases to MySQL.
* Move into the directory (`C:\Apache24\htdocs`, for example, on my machine) which is 
visible to your browser when you are running your web server, and clone the repo: 
`git clone https://github.com/gchadder3/ProgRockDB.git` .
* Install the initial database by sourcing `prog_rock_db.sql` into your MySQL server.  
(For me, this consists of logging into MySQL via the MySQL Command Line Client in Windows 
and running `source C:/Apache24/htdocs/ProgRockDB/prog_rock_db.sql` in the shell.  If you 
are on a Linux install, you can probably do 
`mysql -uroot -p[your root password] < prog_rock_db.sql` from the command-line in the 
repo directory without entering the MySQL shell.)  This 
will create a new database called `prog_rock_db` with a table `progrockalbums` 
containing the initial album data.
* Edit the database connection parameters on Lines 14-17 of `prdb_funcs.php` to match 
where you put the database in MySQL.  (For a simplest solution, replace the `getenv()` 
calls with the strings with your DB access info.  Otherwise, you need to set up 
environment variables.  See `startserver.bat` for an example of how to do that in 
Windows.)  Now you should be ready to use the database.
* Make sure your (e.g. Apache) web server is up and running.  (For example on my setup, 
I navigate to `C:\Apache24\bin` in a command shell and run `httpd`.)
* Navigate in your browser to the portal site at `localhost/ProgRockDB/`.
* The portal page should appear, and you should be able to use the database, viewing it
and adding new albums.