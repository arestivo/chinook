<?php
  declare(strict_types = 1);

  require_once('database/connection.db.php');
  require_once('database/artist.class.php');

  require_once('templates/common.tpl.php');
  require_once('templates/artist.tpl.php');

  $db = getDatabaseConnection();

  $artists = Artist::getArtists($db, 8);

  drawHeader();
  drawArtists($artists);
  drawFooter();
?>