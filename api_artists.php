<?php
  declare(strict_types = 1);

  session_start();

  require_once('database/connection.db.php');
  require_once('database/artist.class.php');

  $db = getDatabaseConnection();

  $artists = Artist::searchArtists($db, $_GET['search'], 8);

  echo json_encode($artists);
?>