<?php
  class Session {
    public function __construct() {
      session_start();

      if (!isset($_SESSION['messages']))
        $_SESSION['messages'] = array();
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id']);    
    }

    public function logout() {
      session_destroy();
    }

    public function getId() : ?int {
      return isset($_SESSION['id']) ? $_SESSION['id'] : null;    
    }

    public function getName() : ?string {
      return isset($_SESSION['name']) ? $_SESSION['name'] : null;
    }

    public function setId(int $id) {
      $_SESSION['id'] = $id;
    }

    public function setName(string $name) {
      $_SESSION['name'] = $name;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
      return $_SESSION['messages'];
    }

    public function clearMessages() {
      $_SESSION['messages'] = array();
    }
  }
?>