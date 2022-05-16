<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/artist.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/artist.tpl.php');

  $db = getDatabaseConnection();

  $artists = Artist::getArtists($db, 8);

  drawHeader($session);
  drawArtists($artists);
  drawFooter();
?>