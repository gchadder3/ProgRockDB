<!-- 
prdb_funcs.php

PHP functions used by the Prog Rock Database Project. 

George Chadderdon, 8/19/2021
-->

<?php 
	// Open the Prog Rock database, and return the connection.
	function prdb_open_db()
	{
		// Try to connect with the MYSQL database.
		$con = mysqli_connect("localhost",              // host name
		                      "root",                   // user name
                              "asdfjU85!b08bxeltlP",    // password
		                      "prog_rock_db");          // database (Prog Rock)
                              
		// Crash out with an error message if we fail.
		if (!$con)
		{
			die('Could not connect: ' . mysqli_error($con));
		}
		
		return $con;		
	}
	
	// Submit query to the Prog Rock database, and return the result.
	function prdb_submit_sql_query($con, $sql)
	{
		// Query the entire table.
		$result = mysqli_query($con, $sql);
		
		// Crash out if we have an error.
		if (!$result)
		{
			die('SQL ERROR: ' . mysqli_error($con));
		}
		
		return $result;
	}
	
	// Close the Prog Rock database.
	function prdb_close_db($con)
	{
		// Close the database.
		mysqli_close($con);
	}
	
	// Display the entirety of the album data.
	function prdb_full_disp_album_data($alb_data)
	{
?>
		<table border="1">
			<tr>
				<th>Album_ID</th>
				<th>Artist</th>
				<th>Album</th>
				<th>Release Year</th>
				<th>Album Info</th>
			</tr>

<?php
			// For each row (i.e. album) of the table...
			while($row = mysqli_fetch_array($alb_data))
			{
?>
				<tr>
				<td align="center">
<?php
				echo $row['Album_ID'];
?>
				</td>
				<td>
<?php			
				echo $row['Artist'];
?>			
				</td>
				<td>
<?php			
				echo $row['Album'];
?>			
				</td>
				<td align="center">
<?php			
				echo $row['ReleaseDate'];
?>			
				</td>
				<td align="center"><a href=
<?php			
				echo "\"" . $row['AlbumInfoURL'] . "\">";
?>			
				link</a></td>
				</tr>
<?php			
			}
?>
		</table>	
<?php	
	}
    
	// Show the form for entering album data.
	function prdb_show_alb_form($artist="",$album="",$rel_yr="",$alb_info_url="")
	{
?>	
	    <form action="prdb_addnewalbumform.php" method="post">
	    	<p>
				Artist: <input type="text" name="artist" value="<?php
					echo $artist;
					?>"/> <br />
				Album: <input type="text" name="album" value="<?php
					echo $album;
					?>"/> <br />
				Release Year: <input type="text" name="rel_yr" value="<?php
					echo $rel_yr;
					?>"/> <br />
				Album Info URL: <input type="text" name="alb_info_url" value="<?php
					echo $alb_info_url;
					?>"/> <br />
				<input type="submit" value="Submit Album" />
			</p>
		</form>
<?php
	}
?>