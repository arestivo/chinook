<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/album.class.php');

  if (trim($_POST['title']) === '') {
    $session->addMessage('error', 'Album title cannot be empty');
    die(header('Location: ' . $_SERVER['HTTP_REFERER']));
  }

  $db = getDatabaseConnection();

  $album = Album::getAlbum($db, intval($_POST['id']));

  if ($album) {
    $album->title = $_POST['title'];
    $album->save($db);
    $session->addMessage('success', 'Album title updated');
    header('Location: ../pages/album.php?id=' . $_POST['id']);
  } else {
    $session->addMessage('error', 'Album does not exist');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

?>