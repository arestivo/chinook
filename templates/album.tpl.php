<?php declare(strict_types = 1); ?>

<?php function drawAlbum(int $id, string $albumName, int $groupId, string $groupName, array $tracks) { ?>
  <h2><?=$albumName?></h2>
  <h3><a href="group.php?id=<?=$groupId?>"><?=$groupName?></a></h2>      
  <table id="tracks">
    <tr><th scope="col">#</th><th scope="col">Title</th><th scope="col">Duration</th></tr>
    <?php foreach ($tracks as $track) { ?>
      <tr><td><?=$track['id']?></td><td><?=$track['title']?></td><td><?=$track['length']?></td></tr>
    <?php } ?>
  <table>
<?php } ?>