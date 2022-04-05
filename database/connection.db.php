<?php
  declare(strict_types = 1);

  function getDatabaseConnection() : PDO {
    $db = new PDO('sqlite:database/database.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
  }
?>