<?php
  declare(strict_types = 1);

  require_once('database/connection.db.php');
  require_once('database/artist.db.php');

  require_once('templates/common.tpl.php');
  require_once('templates/artist.tpl.php');

  $db = getDatabaseConnection();

  $artist = getArtist($db, intval($_GET['id']));

  drawHeader();
  drawArtist($artist['name'], $artist['albums']);
  drawFooter();
?>