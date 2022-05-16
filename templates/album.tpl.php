<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/album.class.php');
  require_once(__DIR__ . '/../database/artist.class.php');
  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawAlbum(Album $album, Artist $artist, array $tracks, Session $session) { ?>
  <h2><?=$album->title?>
    <?php if($session->isLoggedIn()) {?>
      <a href="../pages/edit_album.php?id=<?=$album->id?>"><i class="fa-solid fa-pen action"></i></a>
    <?php } ?>
  </h2>
  <h3><a href="../pages/artist.php?id=<?=$artist->id?>"><?=$artist->name?></a></h3>      
  <table id="tracks">
    <tr><th scope="col">#</th><th scope="col">Title</th><th scope="col">Duration</th></tr>
    <?php foreach ($tracks as $id => $track) { ?>
      <tr><td><?=$id + 1?></td><td><?=$track->name?></td><td><?=$track->time()?></td></tr>
    <?php } ?>
  </table>
<?php } ?>

<?php function drawEditAlbum(Album $album) { ?>
  <form action="../actions/action_edit_album.php" method="post">
    <input type="hidden" name="id" value="<?=$album->id?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?=$album->title?>">
    <button type="submit">Save</button>
  </form>
<?php } ?>