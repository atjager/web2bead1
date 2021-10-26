<?php
  class PagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }

    public function otherPage(){
      require_once('views/pages/otherPage.php');

    }
    public function login(){
      require_once('views/pages/login.php');
    }

    public function register(){
      require_once('views/pages/register.php');
    }
  }
?>