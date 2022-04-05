<?php
  declare(strict_types = 1);

  require_once('templates/common.tpl.php');
  require_once('templates/album.tpl.php');

  $tracks = array(
    array('id' => 1, 'title' => 'Track Name 1', 'length' => '3:22'),
    array('id' => 2, 'title' => 'Track Name 2', 'length' => '5:07'),
    array('id' => 3, 'title' => 'Track Name 3', 'length' => '4:41'),
    array('id' => 4, 'title' => 'Track Name 4', 'length' => '3:01')
  );

  drawHeader();
  drawAlbum(1, 'Album Name', 1, 'Artist Name', $tracks);
  drawFooter();
?>