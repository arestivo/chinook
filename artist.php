<?php
  declare(strict_types = 1);

  session_start();

  require_once('database/connection.db.php');

  require_once('database/artist.class.php');
  require_once('database/album.class.php');

  require_once('templates/common.tpl.php');
  require_once('templates/artist.tpl.php');

  $db = getDatabaseConnection();

  $artist = Artist::getArtist($db, intval($_GET['id']));
  $albums = Album::getArtistAlbums($db, intval($_GET['id']));

  drawHeader();
  drawArtist($artist, $albums);
  drawFooter();
?>