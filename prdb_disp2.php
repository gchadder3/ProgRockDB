<!-- 
prdb_disp2.php

Page displaying the entirety of the albums table for Prog Rock Database 
Project.  The order of presentation is in alphabetical order of Artist, 
then release year of the album.

George Chadderdon, 9/7/2021
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Prog Rock Database Project</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />     
    <style type="text/css">
        body {background: #99CCFF;}
    </style>    
</head>

<body>

    <h1>Prog Rock Database</h1>
    
    <h2>Prog Rock Albums</h2>
    
<?php
    require("prdb_funcs.php");
    
    // Open the database.
    $conn = prdb_open_db();
    
    // Set up and submit a query.
//  $sql = "SELECT * FROM ProgRockAlbums";
//  $sql = "DELETE FROM ProgRockAlbums WHERE Album_ID=13";
//     $sql = "INSERT INTO ProgRockAlbums (Artist,Album,ReleaseDate,AlbumInfoURL) 
//         VALUES ('Jethro Tull','Aqualung','1971',
//      'http://en.wikipedia.org/wiki/Aqualung_(Jethro_Tull_album)')";
//    $result = prdb_submit_sql_query($conn, $sql);

    // Read out the whole database.
    $alb_data = prdb_submit_sql_query($conn, "SELECT * FROM progrockalbums 
                                             ORDER BY Artist, ReleaseDate");
                                             
    // Show the database in a table.
    prdb_full_disp_album_data($alb_data);
    
    // Close the database.
    prdb_close_db($conn);
?>

   <p>Last Updated: 9/7/2021</p>

</body>

</html>