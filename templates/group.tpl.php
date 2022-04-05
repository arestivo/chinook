<?php declare(strict_types = 1); ?>

<?php function drawGroups(array $groups) { ?>
  <h2>Groups</h2>
  <section id="groups">
    <?php foreach($groups as $group) { ?> 
      <article>
        <img src="https://picsum.photos/200?<?=$group['id']?>">
        <a href="group.php?id=1"><?=$group['name']?></a>
      </article>
    <?php } ?>
  <section>
<?php } ?>

<?php function drawGroup(string $groupName, array $albums) { ?>
  <h2><?=$groupName?></h2>
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