<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/customer.class.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/customer.tpl.php');

  $db = getDatabaseConnection();

  $customer = Customer::getCustomer($db, $session->getId());

  drawHeader($session);
  drawProfileForm($customer);
  drawFooter();
?>