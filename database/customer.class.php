<?php
  declare(strict_types = 1);

  class Customer {
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $address;
    public string $city;
    public string $state;
    public string $country;
    public string $postalcode;
    public string $phone;
    public string $email;

    public function __construct(int $id, string $firstName, string $lastName, string $address, string $city, string $state, string $country, string $postalcode, string $phone, string $email)
    {
      $this->id = $id;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->address = $address;
      $this->city = $city;
      $this->state = $state;
      $this->country = $country;
      $this->postalcode = $postalcode;
      $this->phone = $phone;
      $this->email = $email;
    }

    function name() {
      return $this->firstName . ' ' . $this->lastName;
    }

    function save($db) {
      $stmt = $db->prepare('
        UPDATE Customer SET FirstName = ?, LastName = ?
        WHERE CustomerId = ?
      ');

      $stmt->execute(array($this->firstName, $this->lastName, $this->id));
    }
    
    static function getCustomerWithPassword(PDO $db, string $email, string $password) : ?Customer {
      $stmt = $db->prepare('
        SELECT CustomerId, FirstName, LastName, Address, City, State, Country, PostalCode, Phone, Email
        FROM Customer 
        WHERE lower(email) = ? AND password = ?
      ');

      $stmt->execute(array(strtolower($email), sha1($password)));
  
      if ($customer = $stmt->fetch()) {
        return new Customer(
          $customer['CustomerId'],
          $customer['FirstName'],
          $customer['LastName'],
          $customer['Address'],
          $customer['City'],
          $customer['State'],
          $customer['Country'],
          $customer['PostalCode'],
          $customer['Phone'],
          $customer['Email']
        );
      } else return null;
    }

    static function getCustomer(PDO $db, int $id) : Customer {
      $stmt = $db->prepare('
        SELECT CustomerId, FirstName, LastName, Address, City, State, Country, PostalCode, Phone, Email
        FROM Customer 
        WHERE CustomerId = ?
      ');

      $stmt->execute(array($id));
      $customer = $stmt->fetch();
      
      return new Customer(
        $customer['CustomerId'],
        $customer['FirstName'],
        $customer['LastName'],
        $customer['Address'],
        $customer['City'],
        $customer['State'],
        $customer['Country'],
        $customer['PostalCode'],
        $customer['Phone'],
        $customer['Email']
      );
    }

  }
?>