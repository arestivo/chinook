<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/artist.class.php')
?>

<?php function drawArtists(array $artists) { ?>
  <header>
    <h2>Artists</h2>
    <input id="searchartist" type="text" placeholder="search">
  </header>
  <section id="artists">
    <?php foreach($artists as $artist) { ?> 
      <article>
        <img src="https://picsum.photos/200?<?=$artist->id?>">
        <a href="../pages/artist.php?id=<?=$artist->id?>"><?=$artist->name?></a>
      </article>
    <?php } ?>
  </section>
<?php } ?>

<?php function drawArtist(Artist $artist, array $albums) { ?>
  <h2><?=$artist->name?></h2>
  <section id="albums">
    <?php foreach ($albums as $album) { ?>
    <article>
      <img src="https://picsum.photos/200?<?=$album->id?>">
      <a href="../pages/album.php?id=<?=$album->id?>"><?=$album->title?></a>
      <p class="info"><?=$album->tracks?> tracks / <?=$album->length?> min</p>
    </article>
    <?php } ?>
  </section>
<?php } ?>