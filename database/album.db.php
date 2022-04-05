<?php
  declare(strict_types = 1);

  function getAlbum(PDO $db, int $id) {
    $stmt = $db->prepare('SELECT AlbumId, Title, ArtistId FROM Album WHERE AlbumId = ?');
    $stmt->execute(array($id));

    $album = $stmt->fetch();

    return array(
      'id' => $album['AlbumId'], 
      'title' => $album['Title'], 
      'artist' => $album['ArtistId'], 
      'tracks' => getAlbumTracks($db, $id)
    );
  }

  function getAlbumTracks() {
    return array(
      array('id' => 1, 'title' => 'Track Name 1', 'length' => '3:22'),
      array('id' => 2, 'title' => 'Track Name 2', 'length' => '5:07'),
      array('id' => 3, 'title' => 'Track Name 3', 'length' => '4:41'),
      array('id' => 4, 'title' => 'Track Name 4', 'length' => '3:01')
    );  
  }

?>