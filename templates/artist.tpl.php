<?php declare(strict_types = 1); ?>

<?php function drawArtists(array $artists) { ?>
  <h2>Artists</h2>
  <section id="artists">
    <?php foreach($artists as $artist) { ?> 
      <article>
        <img src="https://picsum.photos/200?<?=$artist['id']?>">
        <a href="artist.php?id=1"><?=$artist['name']?></a>
      </article>
    <?php } ?>
  <section>
<?php } ?>

<?php function drawArtist(string $artistName, array $albums) { ?>
  <h2><?=$artistName?></h2>
  <section id="albums">
    <?php foreach ($albums as $album) { ?>
    <article>
      <img src="https://picsum.photos/200?<?=$album['id']?>">
      <a href="album.php?id=1"><?=$album['name']?></a>
      <p class="info"><?=$album['tracks']?> tracks / <?=$album['length']?> min</p>
    </article>
    <?php } ?>
  <section>
<?php } ?>