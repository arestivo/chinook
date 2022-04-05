<?php
  declare(strict_types = 1);

  session_start();

  if (!isset($_SESSION['id'])) die(header('Location: /'));

  require_once('database/connection.db.php');
  require_once('database/customer.class.php');

  $db = getDatabaseConnection();

  $customer = Customer::getCustomer($db, $_SESSION['id']);

  if ($customer) {
    $customer->firstName = $_POST['first_name'];
    $customer->lastName = $_POST['last_name'];
    
    $customer->save($db);
  }

  header('Location: profile.php');
?>