<?php
  declare(strict_types = 1);

  function getArtists(PDO $db, int $count) {
    $stmt = $db->prepare('SELECT ArtistId, Name FROM Artist LIMIT ?');
    $stmt->execute(array($count));

    $artists = array();
    while ($artist = $stmt->fetch()) {
      $artists[] = array(
        'id' => $artist['ArtistId'],
        'name' => $artist['Name']
      );
    }

    return $artists;
  }

  function getArtist(PDO $db, int $id) : array {
    $stmt = $db->prepare('SELECT ArtistId, Name FROM Artist WHERE ArtistId = ?');
    $stmt->execute(array($id));

    $artist = $stmt->fetch();

    return array(
      'id' => $artist['ArtistId'], 
      'name' => $artist['Name'], 
      'albums' => getArtistAlbums($db, $id)
    );
  }

  function getArtistAlbums(PDO $db, int $id) : array {
    $stmt = $db->prepare('
      SELECT AlbumId, Title, COUNT(*) AS tracks, SUM(Milliseconds) AS length 
      FROM Album JOIN Track USING (AlbumId) 
      WHERE ArtistId = ?
      GROUP BY AlbumId
    ');
    $stmt->execute(array($id));

    $albums = array();

    while ($album = $stmt->fetch()) {
      $albums[] = array(
        'id' => $album['AlbumId'], 
        'title' => $album['Title'],
        'tracks' => $album['tracks'],
        'length' => round($album['length'] / 1000 / 60)
      );
    }

    return $albums;
  }

?>