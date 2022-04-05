<?php
  declare(strict_types = 1);

  require_once('database/connection.db.php');
  require_once('database/artist.class.php');
  require_once('database/album.class.php');
  require_once('database/track.class.php');

  require_once('templates/common.tpl.php');
  require_once('templates/album.tpl.php');

  $db = getDatabaseConnection();

  $album = Album::getAlbum($db, intval($_GET['id']));
  $artist = Artist::getArtist($db, $album->artist);
  $tracks = Track::getAlbumTracks($db, intval($_GET['id']));

  drawHeader();
  drawAlbum($album, $artist, $tracks);
  drawFooter();
?>