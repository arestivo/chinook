<?php
  declare(strict_types = 1);

  require_once('templates/common.tpl.php');
  require_once('templates/artist.tpl.php');

  $albums = array(
    array('id' => 1, 'name' => 'Album Name 1', 'tracks' => 8, 'length' => 74),
    array('id' => 2, 'name' => 'Album Name 2', 'tracks' => 12, 'length' => 92),
    array('id' => 3, 'name' => 'Album Name 3', 'tracks' => 7, 'length' => 63),
    array('id' => 4, 'name' => 'Album Name 4', 'tracks' => 6, 'length' => 52)
  );

  drawHeader();
  drawArtist('Artist Name', $albums);
  drawFooter();
?>