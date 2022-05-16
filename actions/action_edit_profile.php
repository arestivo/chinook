<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/customer.class.php');

  $db = getDatabaseConnection();

  $customer = Customer::getCustomer($db, $session->getId());

  if ($customer) {
    $customer->firstName = $_POST['first_name'];
    $customer->lastName = $_POST['last_name'];
    
    $customer->save($db);

    $session->setName($customer->name());
  }

  header('Location: ../pages/profile.php');
?>