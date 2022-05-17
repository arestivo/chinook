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

[What's New](https://github.com/arestivo/chinook/compare/step3...step4)

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

[What's New](https://github.com/arestivo/chinook/compare/step4...step7)

Create a [database](database) folder that will contain all database pertinent files:

* [database.sql](database/database.sql) the SQL file used to create the database.
* [database.db](database/database.db) the actual SQLite database file.
* [connection.php](database/connection.db.php) function to connect to the database.
* [artist.db.php](database/artist.db.php) queries related to artists.
* [album.db.php](database/album.db.php) queries related to albums.

# Step 8: Use classes

[What's New](https://github.com/arestivo/chinook/compare/step7...step8)

Transform all data access functions into classes:

* [artist.class.php](database/artist.class.php) represents an artist.
* [album.class.php](database/album.class.php) represents a album from an artis.
* [track.class.php](database/track.class.php) represent a track in a album.

Each class has one or more functions to get data from the database.

# Step 9: Log In / Log out Actions

[What's New](https://github.com/arestivo/chinook/compare/step8...step9)

* Start a session on every page using *session_start()*.
* Create a class to get customer data: [database/customer.class.php](database/customer.class.php).
* Create the [action_login.php](action_login.php) page that:
  * Receives a username and password, verifies if they exist in the database.
  * If they do, saves the customer data to the session.
  * Redirects the user back to the previous page.
* Show a logout form if the user is logged in.
* Create the [action_login.php](action_login.php) page that destroys the session.

# Step 10: Edit Profile

[What's New](https://github.com/arestivo/chinook/compare/step9...step10)

* Add a new [profile.php](profile.php) page that shows a form to edit the profile of the current user.
* Make sure it does not show if no user is logged in.
* Add a link from the logout form to the new page.
* Add a new [action_edit_profile.php](action_edit_profile.php) action page that receives the first and last name and saves them to the profile of the current user.
* Make sure nothing happens if no user is logged in.
* Add a function to save customer data.
* Create a template to edit a profile.

# Step 11: Responsive

[What's New](https://github.com/arestivo/chinook/compare/step10...step11)

* Add responsive viewport to HTML head.
* Set maximum width of body.
* Add a media query for smaller screens.

# Step 12: Ajax Search

[What's New](https://github.com/arestivo/chinook/compare/step11...step12)

* Added an [api_artists.php](api_artists.php) page that returns a list of artists with a name starting with a specific string in JSON format.
* Added a function to get artists starting with a specific string from the database.
* Added a search input box to search artists.
* Added some CSS to format the search input box.
* Added a new JavaScript file and included it from the header template.
* Added an event listener to the search input that fires every time the input changes and:
  * Gets the 'api_artists.php' page using Ajax (with fetch), sending the text in the input.
  * Uses the returned results to update the list of artists.

# Step 13: Messages

[What's New](https://github.com/arestivo/chinook/compare/step12...step13)

First some organization:

* Added folder for [pages](pages):
  * [index.php](pages/index.php): main page; list and search artists.
  * [artist.php](pages/artist.php): view an artist and its albums.
  * [album.php](pages/album.php): view an album and its tracks.
  * [edit_album.php](pages/edit_album.php): form to edit an album title.
  * [profile.php](pages/profile.php): form to edit the current user's profile.
* Added folder for [actions](actions):
  * [action_edit_album.php](actions/action_edit_album.php): edit album title.
  * [action_edit_profile.php](actions/action_edit_profile.php): edit current user's profile.
  * [action_edit_login.php](actions/action_login.php): verify e-mail and password and login user.
  * [action_edit_logout.php](actions/action_logout.php): logout current user.
* Added folder for [api](api):
  * [api_artists.php](api/api_artists.php): returns all artists starting with a string in JSON format.
* Changed all imports to accommodate the new folders using \_\_DIR\_\_ when needed.

Adding messages:

* Added a [Session](utils/session.php) class responsible for all things session-related, and replaced all direct calls to session_start, session_destroy and $_SESSION to calls to this class.
* Added a way to store messages in the session.
* Show all session-stored messages on all pages (HTML and CSS).
* Added some success and error messages.