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

  function getAlbumTracks(PDO $db, int $id) {
    $stmt = $db->prepare('SELECT TrackId, Name, Milliseconds FROM Track WHERE AlbumId = ?');
    $stmt->execute(array($id));

    $tracks = [];

    while ($track = $stmt->fetch()) {
      $tracks[] = array(
        'id' => $track['TrackId'],
        'name' => $track['Name'],
        'length' => intval(round($track['Milliseconds'] / 1000))
      );
    }

    return $tracks;
  }

?>