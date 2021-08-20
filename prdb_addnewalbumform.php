<!-- 
prdb_addnewalbumform.php

Page bringing up form for the adding of an album to the Prog Rock 
Database. The form does validation checking, requiring that the 
arist, album, and release year be entered, and that the release 
year be no earlier than 1965. 

George Chadderdon, 8/20/2021
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Prog Rock Database Add Form</title> 
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />    
    <style type="text/css">
        body {background: #99CCFF;}
    </style>    
</head>

<body>
    <h1>New Album Data for Prog Rock Database</h1>
    
    <p>
        Enter data for a prog rock album to add to the database.  
        Artist, Album, and Release Year are required.  A URL 
        linking to album information, e.g. a link to a Wikipedia 
        entry, is desirable but optional.
    </p>
    
    <p />
    
<?php 
    require("prdb_funcs.php");
    
    // If we've not entered data yet, bring up the form.
    if ($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        prdb_show_alb_form();
    }
    
    // Otherwise (data has been entered)
    else
    {
        // If no artist was entered, prompt the user to enter one.
        if (empty($_POST['artist']))
        {
            echo "You need to enter an artist. <p>";
            prdb_show_alb_form($_POST['artist'],$_POST['album'],$_POST['rel_yr'],$_POST['alb_info_url']);
        }
        // Else, if no album was entered, prompt the user to enter one.     
        elseif (empty($_POST['album']))
        {
            echo "You need to enter an album name. <p>";
            prdb_show_alb_form($_POST['artist'],$_POST['album'],$_POST['rel_yr'],$_POST['alb_info_url']);
        }
        // Else, if no release year was entered, prompt the user to enter one.      
        elseif (empty($_POST['rel_yr']))
        {
            echo "You need to enter the release year of the album. <p>";
            prdb_show_alb_form($_POST['artist'],$_POST['album'],$_POST['rel_yr'],$_POST['alb_info_url']);
        }
        // Else, if the release data is too early, tell the user.       
        elseif ($_POST['rel_yr'] < 1965)
        {
            echo "Prog Rock didn't really exist until the mid-60's. 
                Please enter another release year.<p>";
            prdb_show_alb_form($_POST['artist'],$_POST['album'],$_POST['rel_yr'],$_POST['alb_info_url']);
        }   
        // Else...                  
        else
        {
            // Open the database.
            $conn = prdb_open_db();
            
            // Read out the whole database.
            $the_artist = $_POST['artist'];
            $the_album = $_POST['album'];
            $the_rel_yr = $_POST['rel_yr'];
            $the_url = $_POST['alb_info_url'];
            $result = prdb_submit_sql_query($conn, "SELECT * FROM ProgRockAlbums 
                                                    WHERE Artist='$the_artist'
                                                    AND Album='$the_album'");
            
            // If we have a match, tell the user.
            if (mysqli_num_rows($result) > 0)
            {
                echo "The album you suggested is already in the database!";
            }
            else
            {
                // Try to insert the new record.
                $sql = "INSERT INTO ProgRockAlbums (Artist,Album,ReleaseDate,AlbumInfoURL) 
                        VALUES ('$the_artist','$the_album','$the_rel_yr','$the_url')";
                $result = prdb_submit_sql_query($conn, $sql);
                
                // Crash out if we have an error.
                if (!$result)
                {
                    die('SQL ERROR: ' . mysqli_error($conn));
                }
                else
                {
                    echo "Your suggestion has been added!<p>";
                    
                    // Read out the whole database.
                    $alb_data = prdb_submit_sql_query($conn, "SELECT * FROM ProgRockAlbums");
                    
                    // Show the database in a table.
                    prdb_full_disp_album_data($alb_data);                   
                }
            }           
            
            // Close the database.
            prdb_close_db($conn);                        
        }
    }
?>
    
    <p>Last Updated: 8/20/2021</p>

</body>

</html>