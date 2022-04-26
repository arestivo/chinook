<?php
  declare(strict_types = 1);

  class Artist {
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    { 
      $this->id = $id;
      $this->name = $name;
    }

    static function getArtists(PDO $db, int $count) : array {
      $stmt = $db->prepare('SELECT ArtistId, Name FROM Artist LIMIT ?');
      $stmt->execute(array($count));
  
      $artists = array();
      while ($artist = $stmt->fetch()) {
        $artists[] = new Artist(
          $artist['ArtistId'],
          $artist['Name']
        );
      }
  
      return $artists;
    }

    static function searchArtists(PDO $db, string $search, int $count) : array {
      $stmt = $db->prepare('SELECT ArtistId, Name FROM Artist WHERE Name LIKE ? LIMIT ?');
      $stmt->execute(array($search . '%', $count));
  
      $artists = array();
      while ($artist = $stmt->fetch()) {
        $artists[] = new Artist(
          $artist['ArtistId'],
          $artist['Name']
        );
      }
  
      return $artists;
    }


    static function getArtist(PDO $db, int $id) : Artist {
      $stmt = $db->prepare('SELECT ArtistId, Name FROM Artist WHERE ArtistId = ?');
      $stmt->execute(array($id));
  
      $artist = $stmt->fetch();
  
      return new Artist(
        $artist['ArtistId'], 
        $artist['Name']
      );
    }  
  }
?>