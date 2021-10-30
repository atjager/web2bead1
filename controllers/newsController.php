<?php
  class NewsController {
    public function home() {
      
      require_once('views/news/home.php');
    }

    public function error() {
      require_once('views/news/error.php');
    }
  }
?>