# LTW Example

Based on a simplified version of the [Chinook Database](https://github.com/lerocha/chinook-database):

![](docs/database.svg)

You can see previous versions of the example by changing branches.

# Step 1: Create the Database

To create the database, we need to run the following command:

```bash
sqlite3 database.db < database.sql
```

# Step 2: Draw Mockups

Draw some initial mockups. Don't lose too much time with these:

![](docs/mockups.svg)

# Step 3: HTML in PHP files

* [index.php](index.php)
* [artist.php](artist.php)
* [album.php](album.php)

# Step 4: Create template files

Create a [templates](templates) folder that will contain several template files.

Each template file will have functions that will be able to draw parts of the HTML:

* [common.tpl.php](templates/common.tpl.php) drawHeader, drawFooter, drawLoginForm.
* [artist.tpl.php](templates/artist.tpl.php) drawArtists, drawArtist.
* [album.tpl.php](templates/album.tpl.php) drawAlbum.

# Step 5: Style folder

Create a [css](css) folder that will contain all files related to style of the web page.

# Step 6: Documents folder

Create a [docs](docs) folder that will contain all files related to the documentation.

# Step 7: Connect to the database

Create a [database](database) folder that will contain all database pertinent files:

* [database.sql](database/database.sql) the SQL file used to create the database.
* [database.db](database/database.db) the actual SQLite database file.
* [connection.php](database/connection.db.php) function to connect to the database.
* [artist.db.php](database/artist.db.php) queries related to artists.
* [album.db.php](database/album.db.php) queries related to albums.