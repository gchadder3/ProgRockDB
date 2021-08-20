-- prog_rock_db.sql -- script for creating the start of the Prog Rock DB

-- From MySQL Command Line Client:
-- source C:/Apache24/htdocs/ProgRockDB/prog_rock_db.sql;

CREATE DATABASE prog_rock_db;
USE prog_rock_db;

CREATE TABLE progrockalbums (
  Album_ID     int(11) NOT NULL,
  Artist       varchar(50) NOT NULL,
  Album        varchar(50) NOT NULL,
  ReleaseDate  year(4) NOT NULL,
  AlbumInfoURL varchar(80) DEFAULT NULL
);

INSERT INTO progrockalbums (Album_ID, Artist, Album, ReleaseDate, AlbumInfoURL) VALUES
(1, 'Genesis', 'Nursery Cryme', 1971, 'http://en.wikipedia.org/wiki/Nursery_Cryme'),
(2, 'Genesis', 'Foxtrot', 1972, 'http://en.wikipedia.org/wiki/Foxtrot_(album)'),
(3, 'Van Der Graaf Generator', 'Pawn Hearts', 1971, 'http://en.wikipedia.org/wiki/Pawn_Hearts'),
(4, 'Van Der Graaf Generator', 'Godbluff', 1975, 'http://en.wikipedia.org/wiki/Godbluff'),
(5, 'Yes', 'Close to the Edge', 1972, 'http://en.wikipedia.org/wiki/Close_to_the_Edge'),
(6, 'Yes', 'Fragile', 1971, 'http://en.wikipedia.org/wiki/Fragile_(Yes_album)'),
(7, 'Emerson, Lake, and Palmer', 'Brain Salad Surgery', 1973, 'http://en.wikipedia.org/wiki/Brain_Salad_Surgery'),
(8, 'Emerson, Lake, and Palmer', 'Trilogy', 1972, 'http://en.wikipedia.org/wiki/Trilogy_(Emerson,_Lake_%26_Palmer_album)'),
(9, 'King Crimson', 'In the Court of the Crimson King', 1969, 'http://en.wikipedia.org/wiki/In_the_Court_of_the_Crimson_King'),
(10, 'King Crimson', 'In the Wake of Poseidon', 1970, 'http://en.wikipedia.org/wiki/In_the_Wake_of_Poseidon'),
(11, 'Jethro Tull', 'Aqualung', 1971, 'http://en.wikipedia.org/wiki/Aqualung_(Jethro_Tull_album)'),
(12, 'Jethro Tull', 'Benefit', 1970, 'http://en.wikipedia.org/wiki/Benefit_(album)'),
(13, 'The Moody Blues', 'Days of Future Passed', 1967, 'http://en.wikipedia.org/wiki/Days_of_Future_Passed'),
(14, 'The Moody Blues', 'In Search of the Lost Chord', 1968, 'http://en.wikipedia.org/wiki/In_Search_of_the_Lost_Chord'),
(15, 'Van Der Graaf Generator', 'The Least We Can Do is Wave to Each Other', 1970, 'http://en.wikipedia.org/wiki/The_Least_We_Can_Do_Is_Wave_to_Each_Other'),
(16, 'Van der Graaf Generator', 'The Aerosol Grey Machine', 1969, 'http://en.wikipedia.org/wiki/The_Aerosol_Grey_Machine'),
(17, 'Jethro Tull', 'Stand Up', 1969, 'https://en.wikipedia.org/wiki/Stand_Up_%28Jethro_Tull_album%29'),
(18, 'Emerson, Lake, and Palmer', 'Tarkus', 1971, 'https://en.wikipedia.org/wiki/Tarkus');

ALTER TABLE progrockalbums
  ADD PRIMARY KEY (Album_ID);

ALTER TABLE progrockalbums
  MODIFY Album_ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

