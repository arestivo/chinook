<?php 
  declare(strict_types = 1); 

  require_once('database/album.class.php');
  require_once('database/artist.class.php');
?>

<?php function drawAlbum(Album $album, Artist $artist, array $tracks) { ?>
  <h2><?=$album->title?></h2>
  <h3><a href="artist.php?id=<?=$artist->id?>"><?=$artist->name?></a></h2>      
  <table id="tracks">
    <tr><th scope="col">#</th><th scope="col">Title</th><th scope="col">Duration</th></tr>
    <?php foreach ($tracks as $track) { ?>
      <tr><td><?=$track->id?></td><td><?=$track->name?></td><td><?=$track->time()?></td></tr>
    <?php } ?>
  <table>
<?php } ?>