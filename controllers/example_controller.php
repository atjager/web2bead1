<?php
  class ExampleController {
    public function home() {
      
      require_once('views/example/home.php');
    }

    public function error() {
      require_once('views/example/error.php');
    }
  }
?>