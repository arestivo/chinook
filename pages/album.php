<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/artist.class.php');
  require_once(__DIR__ . '/../database/album.class.php');
  require_once(__DIR__ . '/../database/track.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/album.tpl.php');

  $db = getDatabaseConnection();

  $album = Album::getAlbum($db, intval($_GET['id']));
  $artist = Artist::getArtist($db, $album->artist);
  $tracks = Track::getAlbumTracks($db, intval($_GET['id']));

  drawHeader($session);
  drawAlbum($album, $artist, $tracks, $session);
  drawFooter();
?>