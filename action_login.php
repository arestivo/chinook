<?php
  declare(strict_types = 1);

  session_start();

  require_once('database/connection.db.php');
  require_once('database/customer.class.php');

  $db = getDatabaseConnection();

  $customer = Customer::getCustomerWithPassword($db, $_POST['email'], $_POST['password']);

  if ($customer) {
    $_SESSION['id'] = $customer->id;
    $_SESSION['name'] = $customer->name();
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>