<DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  </head>
  <body>
    <header>
    <div class="navbar-start">
      <a  href='?' class="navbar-item">
        Home
      </a>

      <a href='?controller=example&action=home' class="navbar-item">
        Example
      </a>

      <a href='?controller=posts&action=index' class="navbar-item">
        Posts
      </a>

      <a href='?controller=pages&action=otherPage' class="navbar-item">
        OtherPage
      </a>

      
      
      <?php 
      session_start();
      if(isset($_SESSION['user'])){
        echo'<div class="navbar-end">
        <div class="navbar-item">
        <div class="navbar-item">Logged in as &nbsp;'.$_SESSION['last_name'].'&nbsp;'.$_SESSION['first_name'].'&nbsp;'.'<b>'.$_SESSION['user'].'</b></div>
          <div class="buttons">
            <a href="?controller=user&action=logout" class="button is-light">
              Log out
            </a>
          </div>
        </div>
      </div>';
      }else{
        echo '<div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a href="?controller=pages&action=register" class="button is-primary">
              <strong>Register</strong>
            </a>
            <a href="?controller=pages&action=login" class="button is-light">
              Log in
            </a>
          </div>
        </div>
      </div>';
      }
      ?>
    </div>
    </header>

    <?php require_once('routes.php'); ?>

    <footer>
      Copyright
    </footer>
  <body>
<html>