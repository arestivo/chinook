<?php
  declare(strict_types = 1);

  require_once('templates/common.tpl.php');
  require_once('templates/group.tpl.php');

  $groups = array(
    array('id' => 1, 'name' => 'Group Name 1'),
    array('id' => 2, 'name' => 'Group Name 2')
  );

  drawHeader();
  drawGroups($groups);
  drawFooter();
?>