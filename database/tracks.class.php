<?php
  declare(strict_types = 1);

  class Track {
    public int $id;
    public string $name;
    public int $length;

    public function __construct(int $id, string $name, int $length) {
      $this->id = $id;
      $this->name = $name;
      $this->length = $length;
    }

    public function time() {
      $minutes = floor($this->length / 60);
      $seconds = $this->length % 60;
      return $minutes . ':' . ($seconds < 10 ? '0' : '') . $seconds;
    }

    static function getAlbumTracks(PDO $db, int $id) : array {
      $stmt = $db->prepare('SELECT TrackId, Name, Milliseconds FROM Track WHERE AlbumId = ?');
      $stmt->execute(array($id));
  
      $tracks = [];

      while ($track = $stmt->fetch()) {
        $tracks[] = new Track(
          $track['TrackId'], 
          $track['Name'],
          intval($track['Milliseconds'] / 1000)
        );
      }

      return $tracks;
    }
  }
?>