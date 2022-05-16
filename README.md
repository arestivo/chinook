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

# Step 8: Use classes

Transform all data access functions into classes:

* [artist.class.php](database/artist.class.php) represents an artist.
* [album.class.php](database/album.class.php) represents a album from an artis.
* [track.class.php](database/track.class.php) represent a track in a album.

Each class has one or more functions to get data from the database.

# Step 9: Log In / Log out Actions

* Start a session on every page using *session_start()*.
* Create a class to get customer data: [database/customer.class.php](database/customer.class.php).
* Create the [action_login.php](action_login.php) page that:
  * Receives a username and password, verifies if they exist in the database.
  * If they do, saves the customer data to the session.
  * Redirects the user back to the previous page.
* Show a logout form if the user is logged in.
* Create the [action_login.php](action_login.php) page that destroys the session.

# Step 10: Edit Profile

* Add a new [profile.php](profile.php) page that shows a form to edit the profile of the current user.
* Make sure it does not show if no user is logged in.
* Add a link from the logout form to the new page.
* Add a new [action_edit_profile.php](action_edit_profile.php) action page that receives the first and last name and saves them to the profile of the current user.
* Make sure nothing happens if no user is logged in.
* Add a function to save customer data.
* Create a template to edit a profile.

# Step 11: Responsive

* Add responsive viewport to HTML head.
* Set maximum width of body.
* Add a media query for smaller screens.

# Step 12: Ajax Search

* Added an [api_artists.php](api_artists.php) page that returns a list of artists with a name starting with a specific string in JSON format.
* Added a function to get artists starting with a specific string from the database.
* Added a search input box to search artists.
* Added some CSS to format the search input box.
* Added a new JavaScript file and included it from the header template.
* Added an event listener to the search input that fires every time the input changes and:
  * Gets the 'api_artists.php' page using Ajax (with fetch), sending the text in the input.
  * Uses the returned results to update the list of artists.

# Step 13: Messages

* Added folders for [pages](https://github.com/arestivo/chinook/tree/master/pages), [actions](https://github.com/arestivo/chinook/tree/master/actions), and [api](https://github.com/arestivo/chinook/tree/master/api).
* Fixed all imports.
* Added a [Session](https://github.com/arestivo/chinook/blob/master/utils/session.php) class responsible for all things session.
* Replaced all direct calls to session_start, session_destroy and $_SESSION to calls to this class.
* Added a way to store messages in the session.
* Show messages on all pages (HTML and CSS).
* Added some success and error messages.