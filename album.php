<?php
  declare(strict_types = 1);

  require_once('database/connection.db.php');
  require_once('database/artist.db.php');
  require_once('database/album.db.php');

  require_once('templates/common.tpl.php');
  require_once('templates/album.tpl.php');

  $db = getDatabaseConnection();
  $album = getAlbum($db, intval($_GET['id']));
  $artist = getArtist($db, $album['artist']);

  drawHeader();
  drawAlbum($album['title'], $artist['id'], $artist['name'], $album['tracks']);
  drawFooter();
?>