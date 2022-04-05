<?php
  declare(strict_types = 1);

  require_once('templates/common.tpl.php');
  require_once('templates/artist.tpl.php');

  $artists = array(
    array('id' => 1, 'name' => 'Artist Name 1'),
    array('id' => 2, 'name' => 'Artist Name 2')
  );

  drawHeader();
  drawArtists($artists);
  drawFooter();
?>