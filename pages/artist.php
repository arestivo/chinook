<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../database/artist.class.php');
  require_once(__DIR__ . '/../database/album.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/artist.tpl.php');

  $db = getDatabaseConnection();

  $artist = Artist::getArtist($db, intval($_GET['id']));
  $albums = Album::getArtistAlbums($db, intval($_GET['id']));

  drawHeader($session);
  drawArtist($artist, $albums);
  drawFooter();
?>