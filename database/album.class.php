<?php
  declare(strict_types = 1);

  class Album {
    public int $id;
    public string $title;
    public int $tracks;
    public int $length;
    public int $artist;

    public function __construct(int $id, string $title, int $tracks, int $length, int $artist)
    {
      $this->id = $id;
      $this->title = $title;
      $this->tracks = $tracks;
      $this->length = $length;
      $this->artist = $artist;
    }

    static function getArtistAlbums(PDO $db, int $id) : array {
      $stmt = $db->prepare('
        SELECT AlbumId, Title, COUNT(*) AS tracks, SUM(Milliseconds) AS length, ArtistId
        FROM Album JOIN Track USING (AlbumId) 
        WHERE ArtistId = ?
        GROUP BY AlbumId
      ');
      $stmt->execute(array($id));
  
      $albums = array();
  
      while ($album = $stmt->fetch()) {
        $albums[] = new Album(
          $album['AlbumId'], 
          $album['Title'],
          $album['tracks'],
          intval(round($album['length'] / 1000 / 60)),
          $album['ArtistId']
        );
      }
  
      return $albums;
    }

    static function getAlbum(PDO $db, int $id) : Album {
      $stmt = $db->prepare('
        SELECT AlbumId, Title, COUNT(*) AS tracks, SUM(Milliseconds) AS length, ArtistId 
        FROM Album JOIN Track USING (AlbumId) 
        WHERE AlbumId = ?
        GROUP BY AlbumId
      ');
      $stmt->execute(array($id));
  
      $album = $stmt->fetch();
  
      return new Album(
        $album['AlbumId'], 
        $album['Title'], 
        $album['tracks'],
        intval(round($album['length'] / 1000 / 60)),
        $album['ArtistId']
      );
    }

    function save(PDO $db) {
      $stmt = $db->prepare('
        UPDATE ALBUM SET Title = ?
        WHERE AlbumId = ?
      ');

      $stmt->execute(array($this->title, $this->id));
    }
  
  }
?>